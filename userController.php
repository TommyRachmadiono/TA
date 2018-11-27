<?php
session_start();
include 'config/connectdb.php';

$act = $_POST["act"];

if ($_SESSION['login'] == true) {

    switch ($act) {
        case 'add_user':
        $url = mysqli_real_escape_string($conn, $_POST["url"]);
        $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $role = mysqli_real_escape_string($conn, $_POST["role"]);
        $kelas = mysqli_real_escape_string($conn, $_POST["kelas"]);
        $ortu_id = mysqli_real_escape_string($conn, $_POST["ortu"]);
        $tglupload = date('YmdHis');
        $file_name = basename($tglupload . $_FILES["file"]["name"]);

        $queryUsername = "SELECT * FROM user WHERE username = '$username'";
        $hasilQuery = $conn->query($queryUsername);
        if ($hasilQuery->num_rows > 0) {
            echo '<script type="text/javascript">alert("Username sudah digunakan, silahkan gunakan username lain."); </script>';
            echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
        }

        if ($_FILES["file"]["size"] != 0) {
            if(!is_dir("images/fotoprofil"))
                mkdir("images/fotoprofil");
            $target_dir = "images/fotoprofil/";
            $target_file = $target_dir . $tglupload . $_FILES['file']['name'];
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $uploadOk = 1;

                //BATASI FILE CUMAN 5MB
            if ($_FILES["file"]["size"] > 5485760) {
                echo '<script type="text/javascript">alert("Your file too big, max 5mb"); </script>';
                $uploadOk = 0;
            }
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo '<script type="text/javascript">alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed."); </script>';
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                echo '<script type="text/javascript">alert("Fail to insert new user"); </script>';
                echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
                    // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

                    $sql = "INSERT INTO user (nama, username, password, role, kelas_id, ortu_id, foto)
                    VALUES ('$nama', '$username', '$password', '$role', $kelas, $ortu_id, '$file_name')";
                    if (mysqli_query($conn, $sql)) {
                        if($role === 'murid') {

                            $query = "SELECT * FROM user ORDER BY id desc LIMIT 1";
                            $hasil = $conn->query($query);
                            if ($hasil->num_rows > 0) {
                                while ($r = $hasil->fetch_assoc()) {
                                    $user_id = $r['id'];
                                }
                            }

                            $sql2 = "SELECT * FROM kelas WHERE id = '$kelas'";
                            $result = $conn->query($sql2);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $nama_kelas = $row['nama_kelas'];
                                }
                            }
                            $explodeKelas = explode(" ", $nama_kelas, 3);
                            $jenjang = $explodeKelas[0];
                            $jurusan = $explodeKelas[1];
                            $namaKelas = $jenjang . ' ' . $jurusan;

                            $sql3 = "SELECT * FROM matpel WHERE jenjang_id = '$jenjang' AND jurusan = '$jurusan'";
                            $h2 = $conn->query($sql3);
                            if ($h2->num_rows > 0) {
                                while ($r = $h2->fetch_assoc()) {
                                    $idpelajaran = $r['id'];

                                    $sql4 = "INSERT INTO relasi_user_matpel (user_id, matpel_id)
                                    VALUES ('$user_id', '$idpelajaran')";
                                    if (mysqli_query($conn, $sql4)) {
                                        echo '<script type="text/javascript">alert("Berhasil Tambah User Baru"); </script>';
                                        echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
                                    } else {
                                        echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
                                    }

                                }
                            } else {
                                echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                            }
                        }
                        echo '<script type="text/javascript">alert("Berhasil Tambah User Baru"); </script>';
                        echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            }
        } else {
            $sql = "INSERT INTO user (nama, username, password, role, kelas_id, ortu_id)
            VALUES ('$nama', '$username', '$password', '$role', $kelas, $ortu_id)";
            if (mysqli_query($conn, $sql)) {
                if($role === 'murid') {

                    $query = "SELECT * FROM user ORDER BY id desc LIMIT 1";
                    $hasil = $conn->query($query);
                    if ($hasil->num_rows > 0) {
                        while ($r = $hasil->fetch_assoc()) {
                            $user_id = $r['id'];
                        }
                    }

                    $sql2 = "SELECT * FROM kelas WHERE id = '$kelas'";
                    $result = $conn->query($sql2);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $nama_kelas = $row['nama_kelas'];
                        }
                    }
                    $explodeKelas = explode(" ", $nama_kelas, 3);
                    $jenjang = $explodeKelas[0];
                    $jurusan = $explodeKelas[1];
                    $namaKelas = $jenjang . ' ' . $jurusan;

                    $sql3 = "SELECT * FROM matpel WHERE jenjang_id = '$jenjang' AND jurusan = '$jurusan'";
                    $h2 = $conn->query($sql3);
                    if ($h2->num_rows > 0) {
                        while ($r = $h2->fetch_assoc()) {
                            $idpelajaran = $r['id'];

                            $sql4 = "INSERT INTO relasi_user_matpel (user_id, matpel_id)
                            VALUES ('$user_id', '$idpelajaran')";
                            if (mysqli_query($conn, $sql4)) {
                                echo '<script type="text/javascript">alert("Berhasil Tambah User Baru"); </script>';
                                echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
                            } else {
                                echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
                            }

                        }
                    } else {
                        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
                    }
                }
                echo '<script type="text/javascript">alert("Berhasil Tambah User Baru"); </script>';
                echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        break;

        case 'edit_user':
        $url = mysqli_real_escape_string($conn, $_POST["url"]);
        $user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);
        $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $kelas = mysqli_real_escape_string($conn, $_POST["select-kelas"]);
        $role = mysqli_real_escape_string($conn, $_POST["role"]);
        $ortu_id = mysqli_real_escape_string($conn, $_POST["select-ortu"]);

        if($role === 'murid') {
            $query2 = "DELETE FROM relasi_user_matpel WHERE user_id = '$user_id'";
            mysqli_query($conn, $query2);
        }
        
        $q2 = "SELECT * FROM kelas WHERE id = '$kelas'";
        $hasil2 = $conn->query($q2);
        if ($hasil2->num_rows > 0) {
            while ($r2 = $hasil2->fetch_assoc()) {
                $nama_kelas = $r2['nama_kelas'];
            }
        }

        if ($_FILES["file"]["size"] != 0) {
            $tglupload = date('YmdHis');
            $file_name = basename($tglupload . $_FILES["file"]["name"]);
            $target_dir = "images/fotoprofil/";
            $target_file = $target_dir . $tglupload . $_FILES['file']['name'];
            $uploadOk = 1;

                //BATASI FILE CUMAN 5MB
            if ($_FILES["file"]["size"] > 5485760) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
            } else {

                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    $query = "select * from user where id = '$user_id'";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $foto = $row['foto'];
                            if (isset($foto))
                                unlink('images/fotoprofil/' . $foto);
                        }
                    }
                    $sql = "UPDATE user SET nama = '$nama', password = '$password', kelas_id = $kelas, ortu_id = $ortu_id, foto = '$file_name' WHERE id = '$user_id'";
                    if (mysqli_query($conn, $sql)) {
                        if($role === 'murid') {
                            $explodeKelas = explode(" ", $nama_kelas, 3);
                            $jenjang = $explodeKelas[0];
                            $jurusan = $explodeKelas[1];
                            $namaKelas = $jenjang . ' ' . $jurusan;

                            $sql2 = "SELECT * FROM matpel WHERE jenjang_id = '$jenjang' AND jurusan = '$jurusan'";
                            $h2 = $conn->query($sql2);
                            if ($h2->num_rows > 0) {
                                while ($r = $h2->fetch_assoc()) {
                                    $idpelajaran = $r['id'];

                                    $sql4 = "INSERT INTO relasi_user_matpel (user_id, matpel_id)
                                    VALUES ('$user_id', '$idpelajaran')";
                                    if (mysqli_query($conn, $sql4)) {
                                        // echo '<script type="text/javascript">alert("Berhasil edit user"); </script>';
                                        // echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
                                    } else {
                                        echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
                                    }

                                }
                            } else {
                                echo '<script type="text/javascript">alert("Belum ada mata pelajaran pada kelas '.$jenjang.' jurusan '.$jurusan.'"); </script>';
                            }
                        }
                        echo '<script type="text/javascript">alert("Berhasil edit user"); </script>';
                        echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                } else {
                    echo '<script type="text/javascript">alert("Sorry there was an error uploading your file")</script>';
                }
            }
        } else {
            $sql = "UPDATE user SET nama = '$nama', password = '$password', kelas_id = $kelas, ortu_id = $ortu_id WHERE id = '$user_id'";
            if (mysqli_query($conn, $sql)) {
                if($role === 'murid') {
                    $explodeKelas = explode(" ", $nama_kelas, 3);
                    $jenjang = $explodeKelas[0];
                    $jurusan = $explodeKelas[1];
                    $namaKelas = $jenjang . ' ' . $jurusan;

                    $sql2 = "SELECT * FROM matpel WHERE jenjang_id = '$jenjang' AND jurusan = '$jurusan'";
                    $h2 = $conn->query($sql2);
                    if ($h2->num_rows > 0) {
                        while ($r = $h2->fetch_assoc()) {
                            $idpelajaran = $r['id'];

                            $sql4 = "INSERT INTO relasi_user_matpel (user_id, matpel_id)
                            VALUES ('$user_id', '$idpelajaran')";
                            if (mysqli_query($conn, $sql4)) {
                                // echo '<script type="text/javascript">alert("Berhasil edit user"); </script>';
                                // echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
                            } else {
                                echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);
                            }

                        }
                    } else {
                        // echo '<script type="text/javascript">alert("Berhasil edit user"); </script>';
                        echo '<script type="text/javascript">alert("Belum ada mata pelajaran pada kelas '.$jenjang.' jurusan '.$jurusan.'"); </script>';
                        // echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
                    }
                }
                echo '<script type="text/javascript">alert("Berhasil edit user"); </script>';
                echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        break;

        case 'delete_user':
        $url = mysqli_real_escape_string($conn, $_POST["url"]);
        $dir = "images/fotoprofil";
        $user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);

        $sql2 = "SELECT * FROM user WHERE id = '$user_id'";
        $result = $conn->query($sql2);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $file = $row['foto'];
            }
        }

        $sql = "DELETE FROM user WHERE id = '$user_id'";
        if (mysqli_query($conn, $sql)) {
            if (isset($file)) {
                if (file_exists($dir . '/' . $file)) {
                    unlink($dir . '/' . $file);
                    echo '<script type="text/javascript">alert("Berhasil menghapus user"); </script>';
                    echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
                }
            }
            echo '<script type="text/javascript">alert("Berhasil menghapus user"); </script>';
            echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        break;

        case 'update_relasi':
        $url = mysqli_real_escape_string($conn, $_POST["url"]);
        $user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);

        $sql = "DELETE FROM relasi_user_matpel WHERE user_id = '$user_id'";
        if (mysqli_query($conn, $sql)) {
            if (isset($_POST['matpel'])) {
                foreach ($_POST['matpel'] as $matpel_id) {
                    $sql2 = "INSERT INTO relasi_user_matpel (user_id, matpel_id)
                    VALUES ('$user_id', '$matpel_id')";
                    if (mysqli_query($conn, $sql2)) {
                            // echo '<script type="text/javascript">alert("matpel id ' . $matpel_id . '"); </script>';
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            }
            echo '<script type="text/javascript">alert("Berhasil edit relasi"); </script>';
            echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        break;
    }
} else {
    echo '<script type="text/javascript">alert("Silahkan Login Terlebih Dahulu"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
?>