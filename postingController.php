<?php
session_start();
include 'config/connectdb.php';

$act = $_POST["act"];

if ($_SESSION['login'] == true) {

    switch ($act) {
        case 'posting_feeds':
            $isi = mysqli_real_escape_string($conn, $_POST["textarea"]);
            $tgldiposting = date('Y/m/d');
            $tglupload = date('YmdHis');
            $user_id = $_COOKIE['user_id'];
            $file_name = basename($tglupload . $_FILES["file"]["name"]);

            if ($_FILES["file"]["size"] != 0) {
                if(!is_dir("postingan"))
                    mkdir("postingan");
                $target_dir = "postingan/";
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
                        $sql = "INSERT INTO postingan (isi, tgldiposting, user_id,file)
                    VALUES ('$isi', '$tgldiposting', '$user_id','$file_name')";
                        if (mysqli_query($conn, $sql)) {
                            echo '<script type="text/javascript">alert("Berhasil posting status"); </script>';
                            echo '<script type="text/javascript"> window.location = "index.php" </script>';
                            $conn->close();
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    } else {
                        echo '<script type="text/javascript">alert("Sorry there was an error uploading your file")</script>';
                    }
                }
            } else {
                $sql = "INSERT INTO postingan (isi, tgldiposting, user_id)
            VALUES ('$isi', '$tgldiposting', '$user_id')";
                if (mysqli_query($conn, $sql)) {
                    echo '<script type="text/javascript">alert("Berhasil posting status"); </script>';
                    echo '<script type="text/javascript"> window.location = "index.php" </script>';
                    $conn->close();
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
            break;

        case 'comment_feeds':
            $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
            $idpostingan = mysqli_real_escape_string($conn, $_POST["idpostingan"]);
            $time = date("Y-m-d H:i:s");
            $user_id = $_COOKIE['user_id'];
            $tglupload = date('YmdHis');
            $file_name = basename($tglupload . $_FILES["file"]["name"]);

            $s2 = "SELECT * FROM user where id = '$user_id'";
            $r2 = $conn->query($s2);
            if ($r2->num_rows > 0) {
                while ($row = $r2->fetch_assoc()) {
                    $nama = $row['nama'];
                }
            }

            $nama_notif = $nama . " mengomentari postingan anda";
            $s = "SELECT * FROM postingan where idpostingan = '$idpostingan'";
            $r = $conn->query($s);
            if ($r->num_rows > 0) {
                while ($row = $r->fetch_assoc()) {
                    $id_penerima = $row['user_id'];
                }
            }

            if ($_FILES["file"]["size"] != 0) {
                if(!is_dir("komentar"))
                    mkdir("komentar");
                $target_dir = "komentar/";
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
                        $sql = "INSERT INTO komentar (isi, user_id, postingan_idpostingan, file)
                    VALUES ('$comment', '$user_id', '$idpostingan', '$file_name')";
                        if (mysqli_query($conn, $sql)) {

                            $s3 = "SELECT * FROM komentar where user_id = '$user_id' ORDER BY idkomentar desc LIMIT 1";
                            $r3 = $conn->query($s3);
                            if ($r3->num_rows > 0) {
                                while ($row = $r3->fetch_assoc()) {
                                    $idkomentar = $row['idkomentar'];
                                }
                            }

                            if ($user_id != $id_penerima) {
                                $query = "INSERT INTO notif_socmed (nama_notif, idpostingan, id_penerima, time, seen, idkomentar) VALUES ('$nama_notif', '$idpostingan', '$id_penerima', '$time', '0', '$idkomentar')";
                                if (mysqli_query($conn, $query)) {

                                    echo '<script type="text/javascript"> window.location = "index.php" </script>';
                                } else
                                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                            }
                            echo '<script type="text/javascript">alert("Berhasil menambahkan komentar"); </script>';
                            echo '<script type="text/javascript"> window.location = "index.php" </script>';
                        }
                    } else {
                        echo '<script type="text/javascript">alert("Sorry there was an error uploading your file")</script>';
                    }
                }
            } else {
                $sql = "INSERT INTO komentar (isi, user_id, postingan_idpostingan)
            VALUES ('$comment', '$user_id', '$idpostingan')";
                if (mysqli_query($conn, $sql)) {

                    $s3 = "SELECT * FROM komentar where user_id = '$user_id' ORDER BY idkomentar desc LIMIT 1";
                    $r3 = $conn->query($s3);
                    if ($r3->num_rows > 0) {
                        while ($row = $r3->fetch_assoc()) {
                            $idkomentar = $row['idkomentar'];
                        }
                    }

                    if ($user_id != $id_penerima) {
                        $query = "INSERT INTO notif_socmed (nama_notif, idpostingan, id_penerima, time, seen, idkomentar) VALUES ('$nama_notif', '$idpostingan', '$id_penerima', '$time', '0', '$idkomentar')";
                        if (mysqli_query($conn, $query)) {

                            echo '<script type="text/javascript"> window.location = "index.php" </script>';
                        } else
                            echo "Error: " . $query . "<br>" . mysqli_error($conn);
                    }
                    echo '<script type="text/javascript">alert("Berhasil menambahkan komentar"); </script>';
                    echo '<script type="text/javascript"> window.location = "index.php" </script>';
                }
            }
            break;

        case 'posting_group':
            $isi = mysqli_real_escape_string($conn, $_POST["textarea"]);
            $group_id = mysqli_real_escape_string($conn, $_POST["group_id"]);
            $tgldiposting = date('Y/m/d');
            $tglupload = date('YmdHis');
            $user_id = $_COOKIE['user_id'];
            $file_name = basename($tglupload . $_FILES["file"]["name"]);

            if ($_FILES["file"]["size"] != 0) {
                if(!is_dir("postingan"))
                    mkdir("postingan");
                $target_dir = "postingan/";
                $target_file = $target_dir . $tglupload . basename($_FILES["file"]["name"]);
                $uploadOk = 1;

                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    echo $file_name;
                    $uploadOk = 0;
                }
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
                        $sql = "INSERT INTO postingan (isi, tgldiposting, user_id, grup_id, file)
                    VALUES ('$isi', '$tgldiposting', '$user_id', '$group_id', '$file_name')";
                        if (mysqli_query($conn, $sql)) {
                            echo '<script type="text/javascript">alert("Berhasil posting status"); </script>';
                            echo '<script type="text/javascript"> window.location = "group_page.php?id=' . $group_id . '" </script>';
                            $conn->close();
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    } else {
                        echo '<script type="text/javascript">alert("Sorry there was an error uploading your file")</script>';
                    }
                }
            } else {
                $sql = "INSERT INTO postingan (isi, tgldiposting, user_id, grup_id)
            VALUES ('$isi', '$tgldiposting', '$user_id', '$group_id')";

                if (mysqli_query($conn, $sql)) {
                    echo '<script type="text/javascript">alert("Berhasil posting status"); </script>';
                    echo '<script type="text/javascript"> window.location = "group_page.php?id=' . $group_id . '" </script>';
                    $conn->close();
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
            break;

        case 'comment_feeds_group':
            $group_id = mysqli_real_escape_string($conn, $_POST["group_id"]);
            $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
            $idpostingan = mysqli_real_escape_string($conn, $_POST["idpostingan"]);
            $time = date("Y-m-d H:i:s");
            $user_id = $_COOKIE['user_id'];
            $tglupload = date('YmdHis');
            $file_name = basename($tglupload . $_FILES["file"]["name"]);

            $s2 = "SELECT * FROM user where id = '$user_id'";
            $r2 = $conn->query($s2);
            if ($r2->num_rows > 0) {
                while ($row = $r2->fetch_assoc()) {
                    $nama = $row['nama'];
                }
            }

            $nama_notif = $nama . " mengomentari postingan anda";
            $s = "SELECT * FROM postingan where idpostingan = '$idpostingan'";
            $r = $conn->query($s);
            if ($r->num_rows > 0) {
                while ($row = $r->fetch_assoc()) {
                    $id_penerima = $row['user_id'];
                }
            }

            if ($_FILES["file"]["size"] != 0) {
                if(!is_dir("komentar"))
                    mkdir("komentar");
                $target_dir = "komentar/";
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
                        $sql = "INSERT INTO komentar (isi, user_id, postingan_idpostingan, file)
                    VALUES ('$comment', '$user_id', '$idpostingan', '$file_name')";
                        if (mysqli_query($conn, $sql)) {

                            $s3 = "SELECT * FROM komentar where user_id = '$user_id' ORDER BY idkomentar desc LIMIT 1";
                            $r3 = $conn->query($s3);
                            if ($r3->num_rows > 0) {
                                while ($row = $r3->fetch_assoc()) {
                                    $idkomentar = $row['idkomentar'];
                                }
                            }

                            if ($user_id != $id_penerima) {
                                $query = "INSERT INTO notif_socmed (nama_notif, idpostingan, id_penerima, time, seen, idkomentar) VALUES ('$nama_notif', '$idpostingan', '$id_penerima', '$time', '0', '$idkomentar')";
                                if (mysqli_query($conn, $query)) {
                                    echo '<script type="text/javascript"> window.location = "group_page.php?id=' . $group_id . '" </script>';
                                } else
                                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                            }
                            echo '<script type="text/javascript">alert("Berhasil menambahkan komentar"); </script>';
                            echo '<script type="text/javascript"> window.location = "group_page.php?id=' . $group_id . '" </script>';
                        }
                    } else {
                        echo '<script type="text/javascript">alert("Sorry there was an error uploading your file")</script>';
                    }
                }
            } else {
                $sql = "INSERT INTO komentar (isi, user_id, postingan_idpostingan)
            VALUES ('$comment', '$user_id', '$idpostingan')";
                if (mysqli_query($conn, $sql)) {

                    $s3 = "SELECT * FROM komentar where user_id = '$user_id' ORDER BY idkomentar desc LIMIT 1";
                    $r3 = $conn->query($s3);
                    if ($r3->num_rows > 0) {
                        while ($row = $r3->fetch_assoc()) {
                            $idkomentar = $row['idkomentar'];
                        }
                    }

                    if ($user_id != $id_penerima) {
                        $query = "INSERT INTO notif_socmed (nama_notif, idpostingan, id_penerima, time, seen, idkomentar) VALUES ('$nama_notif', '$idpostingan', '$id_penerima', '$time', '0', '$idkomentar')";
                        if (mysqli_query($conn, $query)) {

                            echo '<script type="text/javascript"> window.location = "group_page.php?id=' . $group_id . '" </script>';
                        } else
                            echo "Error: " . $query . "<br>" . mysqli_error($conn);
                    }
                    echo '<script type="text/javascript">alert("Berhasil menambahkan komentar"); </script>';
                    echo '<script type="text/javascript"> window.location = "group_page.php?id=' . $group_id . '" </script>';
                }
            }
            break;

        case 'like':
            if (isset($_POST['like'])) {

                $id = $_POST['id'];
                $time = date("Y-m-d H:i:s");
                $user_id = $_COOKIE['user_id'];

                $s2 = "SELECT * FROM user where id = '$user_id'";
                $r2 = $conn->query($s2);
                if ($r2->num_rows > 0) {
                    while ($row = $r2->fetch_assoc()) {
                        $nama = $row['nama'];
                    }
                }

                $query = mysqli_query($conn, "select * from `like` where post_id='$id' and user_id='" . $_COOKIE['user_id'] . "'") or die(mysqli_error());

                if (mysqli_num_rows($query) > 0) {
                    //DELETE LIKE + HAPUS NOTIF
                    mysqli_query($conn, "delete from `like` where user_id='" . $_COOKIE['user_id'] . "' and post_id='$id'");
                    mysqli_query($conn, "DELETE FROM notif_socmed WHERE idpostingan = '$id' AND nama_notif like '%$nama menyukai%'");
                } else {
                    //INSERT LIKE + NOTIF
                    mysqli_query($conn, "insert into `like` (user_id,post_id) values ('" . $_COOKIE['user_id'] . "', '$id')");

                    $nama_notif = $nama . " menyukai postingan anda";
                    $s = "SELECT * FROM postingan where idpostingan = '$id'";
                    $r = $conn->query($s);
                    if ($r->num_rows > 0) {
                        while ($row = $r->fetch_assoc()) {
                            $id_penerima = $row['user_id'];
                        }
                    }

                    if ($user_id != $id_penerima) {
                        $query = mysqli_query($conn, "INSERT INTO notif_socmed (nama_notif, idpostingan, id_penerima, time, seen) VALUES ('$nama_notif', '$id', '$id_penerima', '$time', '0')");
                    }
                }
            }
            break;

        case 'show_like':
            if (isset($_POST['showlike'])) {
                $id = $_POST['id'];
                $query2 = mysqli_query($conn, "select * from `like` where post_id='$id'");
                echo mysqli_num_rows($query2);
            }
            break;

        case 'show_notif_socmed':
            $id = $_POST['id'];
            $query = mysqli_query($conn, "SELECT COUNT(id_penerima) as notifikasi FROM `notif_socmed` WHERE id_penerima = '$id' AND seen = 0");
            echo mysqli_query($query);
            break;

        case 'delete_komentar':
            $group_id = mysqli_real_escape_string($conn, $_POST["group_id"]);
            $idkomentar = mysqli_real_escape_string($conn, $_POST["idkomentar"]);
            $dir = "komentar";

            $sql4 = "SELECT * FROM komentar WHERE idkomentar = '$idkomentar'";
            $result = $conn->query($sql4);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $file = $row['file'];
                }
            }

            $sql = "DELETE FROM komentar WHERE idkomentar = '$idkomentar'";
            if (mysqli_query($conn, $sql)) {
                if ($file != "")
                    unlink($dir . '/' . $file);
                if ($group_id != "NULL") {
                    echo '<script type="text/javascript">alert("Berhasil Menghapus Komentar"); </script>';
                    echo '<script type="text/javascript"> window.location = "group_page.php?id=' . $group_id . '" </script>';
                } else {
                    echo '<script type="text/javascript">alert("Berhasil Menghapus Komentar"); </script>';
                    echo '<script type="text/javascript"> window.location = "index.php" </script>';
                }
            }
            break;

        case 'edit_komentar':
            $idkomentar = mysqli_real_escape_string($conn, $_POST["idkomentar"]);
            $isikomen = mysqli_real_escape_string($conn, $_POST["komentar"]);
            $group_id = mysqli_real_escape_string($conn, $_POST["group_id"]);

            $sql = "UPDATE komentar SET isi='$isikomen' WHERE idkomentar='$idkomentar'";
            if (mysqli_query($conn, $sql)) {
                if ($group_id != "NULL") {
                    echo '<script type="text/javascript">alert("Berhasil Mengubah Komentar"); </script>';
                    echo '<script type="text/javascript"> window.location = "group_page.php?id=' . $group_id . '" </script>';
                } else {
                    echo '<script type="text/javascript">alert("Berhasil Mengubah Komentar"); </script>';
                    echo '<script type="text/javascript"> window.location = "index.php" </script>';
                }
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
            break;

        case 'delete_status':
            $group_id = mysqli_real_escape_string($conn, $_POST["group_id"]);
            $idpostingan = mysqli_real_escape_string($conn, $_POST["idpostingan"]);
            $dir = "postingan";
            $dir2 = "komentar";

            $sql4 = "SELECT * FROM postingan WHERE idpostingan = '$idpostingan'";
            $result = $conn->query($sql4);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $file = $row['file'];
                }
            }

            $sql5 = "SELECT file FROM komentar WHERE postingan_idpostingan = '$idpostingan'";
            $result2 = $conn->query($sql5);
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    $file2 = $row2['file'];
                    if ($file2 != "")
                        unlink($dir2 . '/' . $file2);
                }
            }


            $sql3 = "DELETE FROM postingan WHERE idpostingan = '$idpostingan'";
            if (mysqli_query($conn, $sql3)) {
                if (isset($file))
                    unlink($dir . '/' . $file);
                if ($group_id != "NULL") {
                    echo '<script type="text/javascript">alert("Berhasil Menghapus Status"); </script>';
                    echo '<script type="text/javascript"> window.location = "group_page.php?id=' . $group_id . '" </script>';
                } else {
                    echo '<script type="text/javascript">alert("Berhasil Menghapus Status"); </script>';
                    echo '<script type="text/javascript"> window.location = "index.php" </script>';
                }
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }

            break;

        case 'report':
            if (isset($_POST['report'])) {
                $id = $_POST['id'];
                $user_id = $_COOKIE['user_id'];

                $query = mysqli_query($conn, "SELECT * FROM report WHERE postingan_id='$id' AND user_id = '$user_id'") or die(mysqli_error());
                if (mysqli_num_rows($query) > 0) {
                    mysqli_query($conn, "DELETE FROM report WHERE user_id = '$user_id' AND post_id='$id'");
                } else {
                    mysqli_query($conn, "INSERT INTO report (user_id,postingan_id) VALUES ('$user_id', '$id')");
                }
            }
            break;

        case 'edit_status':
            $idpostingan = mysqli_real_escape_string($conn, $_POST["idpostingan"]);
            $isi = mysqli_real_escape_string($conn, $_POST["isi"]);
            $group_id = mysqli_real_escape_string($conn, $_POST["group_id"]);

            $sql = "UPDATE postingan SET isi='$isi' WHERE idpostingan='$idpostingan'";
            if (mysqli_query($conn, $sql)) {
                if ($group_id != "NULL") {
                    echo '<script type="text/javascript">alert("Berhasil Mengubah Status"); </script>';
                    echo '<script type="text/javascript"> window.location = "group_page.php?id=' . $group_id . '" </script>';
                } else {
                    echo '<script type="text/javascript">alert("Berhasil Mengubah Status"); </script>';
                    echo '<script type="text/javascript"> window.location = "index.php" </script>';
                }
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
            break;

        case 'edit_status_detail':
            $idpostingan = mysqli_real_escape_string($conn, $_POST["idpostingan"]);
            $isi = mysqli_real_escape_string($conn, $_POST["isi"]);

            $sql = "UPDATE postingan SET isi='$isi' WHERE idpostingan='$idpostingan'";
            if (mysqli_query($conn, $sql)) {
                echo '<script type="text/javascript">alert("Berhasil Mengubah Status"); </script>';
                echo '<script type="text/javascript"> window.location = "postingan.php?id=' . $idpostingan . '" </script>';
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
            break;

        case 'delete_komentar_detail':
            $idkomentar = mysqli_real_escape_string($conn, $_POST["idkomentar"]);
            $idpostingan = mysqli_real_escape_string($conn, $_POST["idpostingan"]);
            $dir = "komentar";

            $sql4 = "SELECT * FROM komentar WHERE idkomentar = '$idkomentar'";
            $result = $conn->query($sql4);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $file = $row['file'];
                }
            }

            $sql = "DELETE FROM komentar WHERE idkomentar = '$idkomentar'";
            if (mysqli_query($conn, $sql)) {
                if ($file != "")
                    unlink($dir . '/' . $file);
                echo '<script type="text/javascript">alert("Berhasil Menghapus Komentar"); </script>';
                echo '<script type="text/javascript"> window.location = "postingan.php?id=' . $idpostingan . '" </script>';
            }
            break;

        case 'edit_komentar_detail':
            $idkomentar = mysqli_real_escape_string($conn, $_POST["idkomentar"]);
            $isikomen = mysqli_real_escape_string($conn, $_POST["komentar"]);
            $idpostingan = mysqli_real_escape_string($conn, $_POST["idpostingan"]);

            $sql = "UPDATE komentar SET isi='$isikomen' WHERE idkomentar='$idkomentar'";
            if (mysqli_query($conn, $sql)) {
                echo '<script type="text/javascript">alert("Berhasil Mengubah Komentar"); </script>';
                echo '<script type="text/javascript"> window.location = "postingan.php?id=' . $idpostingan . '" </script>';
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
            break;

        case 'komentar_detail':
            $group_id = mysqli_real_escape_string($conn, $_POST["group_id"]);
            $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
            $idpostingan = mysqli_real_escape_string($conn, $_POST["idpostingan"]);
            $time = date("Y-m-d H:i:s");
            $user_id = $_COOKIE['user_id'];
            $tglupload = date('YmdHis');
            $file_name = basename($tglupload . $_FILES["file"]["name"]);

            $s2 = "SELECT * FROM user where id = '$user_id'";
            $r2 = $conn->query($s2);
            if ($r2->num_rows > 0) {
                while ($row = $r2->fetch_assoc()) {
                    $nama = $row['nama'];
                }
            }

            $nama_notif = $nama . " mengomentari postingan anda";
            $s = "SELECT * FROM postingan where idpostingan = '$idpostingan'";
            $r = $conn->query($s);
            if ($r->num_rows > 0) {
                while ($row = $r->fetch_assoc()) {
                    $id_penerima = $row['user_id'];
                }
            }

            if ($_FILES["file"]["size"] != 0) {
                if(!is_dir("komentar"))
                    mkdir("komentar");
                $target_dir = "komentar/";
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
                        $sql = "INSERT INTO komentar (isi, user_id, postingan_idpostingan, file)
                VALUES ('$comment', '$user_id', '$idpostingan', '$file_name')";
                        if (mysqli_query($conn, $sql)) {

                            $s3 = "SELECT * FROM komentar where user_id = '$user_id' ORDER BY idkomentar desc LIMIT 1";
                            $r3 = $conn->query($s3);
                            if ($r3->num_rows > 0) {
                                while ($row = $r3->fetch_assoc()) {
                                    $idkomentar = $row['idkomentar'];
                                }
                            }

                            if ($user_id != $id_penerima) {
                                $query = "INSERT INTO notif_socmed (nama_notif, idpostingan, id_penerima, time, seen, idkomentar) VALUES ('$nama_notif', '$idpostingan', '$id_penerima', '$time', '0', '$idkomentar')";
                                if (mysqli_query($conn, $query)) {

                                    echo '<script type="text/javascript"> window.location = "postingan.php?id=' . $idpostingan . '" </script>';
                                } else
                                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                            }
                            echo '<script type="text/javascript">alert("Berhasil menambahkan komentar"); </script>';
                            echo '<script type="text/javascript"> window.location = "postingan.php?id=' . $idpostingan . '" </script>';
                        }
                    } else {
                        echo '<script type="text/javascript">alert("Sorry there was an error uploading your file")</script>';
                    }
                }
            } else {
                $sql = "INSERT INTO komentar (isi, user_id, postingan_idpostingan)
        VALUES ('$comment', '$user_id', '$idpostingan')";
                if (mysqli_query($conn, $sql)) {

                    $s3 = "SELECT * FROM komentar where user_id = '$user_id' ORDER BY idkomentar desc LIMIT 1";
                    $r3 = $conn->query($s3);
                    if ($r3->num_rows > 0) {
                        while ($row = $r3->fetch_assoc()) {
                            $idkomentar = $row['idkomentar'];
                        }
                    }

                    if ($user_id != $id_penerima) {
                        $query = "INSERT INTO notif_socmed (nama_notif, idpostingan, id_penerima, time, seen, idkomentar) VALUES ('$nama_notif', '$idpostingan', '$id_penerima', '$time', '0', '$idkomentar')";
                        if (mysqli_query($conn, $query)) {

                            echo '<script type="text/javascript"> window.location = "postingan.php?id=' . $idpostingan . '" </script>';
                        } else
                            echo "Error: " . $query . "<br>" . mysqli_error($conn);
                    }
                    echo '<script type="text/javascript">alert("Berhasil menambahkan komentar"); </script>';
                    echo '<script type="text/javascript"> window.location = "postingan.php?id=' . $idpostingan . '" </script>';
                }
            }
            break;
    }
} else {
    echo '<script type="text/javascript">alert("Silahkan Login Terlebih Dahulu"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
?>