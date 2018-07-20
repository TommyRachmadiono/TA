<?php
session_start();
include 'config/connectdb.php';

$act = $_POST["act"];

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
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

                $sql = "INSERT INTO user (nama, username, password, role, kelas_id, ortu_id, foto)
		VALUES ('$nama', '$username', '$password', '$role', $kelas, $ortu_id, '$file_name')";
                if (mysqli_query($conn, $sql)) {
                    echo '<script type="text/javascript">alert("Berhasil Tambah User Baru"); </script>';
                    echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
        break;

    case 'edit_user':
        $url = mysqli_real_escape_string($conn, $_POST["url"]);
        $user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);
        $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $kelas = mysqli_real_escape_string($conn, $_POST["select-kelas"]);
        $ortu_id = mysqli_real_escape_string($conn, $_POST["select-ortu"]);

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
                            unlink('images/fotoprofil/' . $foto);
                        }
                    }
                    $sql = "UPDATE user SET nama = '$nama', password = '$password', kelas_id = $kelas, ortu_id = $ortu_id, foto = '$file_name' WHERE id = '$user_id'";
                    if (mysqli_query($conn, $sql)) {
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
                echo '<script type="text/javascript">alert("Berhasil edit user"); </script>';
                // echo $nama; 
                // echo $password;
                // echo $kelas;
                // echo $ortu_id;
                // echo $user_id;
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
            if (unlink($dir . '/' . $file)) {
                echo '<script type="text/javascript">alert("Berhasil menghapus user"); </script>';
                echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        break;

    case 'update_relasi':
        $url = mysqli_real_escape_string($conn, $_POST["url"]);
        $user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);

        $sql = "DELETE FROM relasi_user_matpel WHERE user_id = '$user_id'";
        if (mysqli_query($conn, $sql)) {
            foreach ($_POST['matpel'] as $matpel_id) {
                $sql2 = "INSERT INTO relasi_user_matpel (user_id, matpel_id)
		VALUES ('$user_id', '$matpel_id')";
                if (mysqli_query($conn, $sql2)) {
                    echo '<script type="text/javascript">alert("matpel id ' . $matpel_id . '"); </script>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
            echo '<script type="text/javascript">alert("Berhasil edit relasi"); </script>';
            echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        break;
}
?>