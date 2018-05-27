<?php
session_start();
include 'config/connectdb.php';

$act = $_POST["act"];

switch ($act) {
    case 'posting_feeds':
    $isi = mysqli_real_escape_string($conn, $_POST["textarea"]);
    $tgldiposting = date('Y/m/d');
    $tglupload = date('YmdHis');
    $user_id = $_COOKIE['user_id'];
    $file_name = basename($tglupload . $_FILES["file"]["name"]);

    if ($_FILES["file"]["size"] != 0) {


        $target_dir = "postingan/";
        $target_file = $target_dir . $tglupload . $_FILES['file']['name'];
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
    $user_id = $_COOKIE['user_id'];

    $sql = "INSERT INTO komentar (isi, user_id, postingan_idpostingan)
    VALUES ('$comment', '$user_id', '$idpostingan')";

    if (mysqli_query($conn, $sql)) {
        echo '<script type="text/javascript">alert("Berhasil menambahkan komentar"); </script>';
        echo '<script type="text/javascript"> window.location = "index.php" </script>';
        $conn->close();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
    $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
    $idpostingan = mysqli_real_escape_string($conn, $_POST["idpostingan"]);
    $user_id = $_COOKIE['user_id'];
    $group_id = mysqli_real_escape_string($conn, $_POST["group_id"]);

    $sql = "INSERT INTO komentar (isi, user_id, postingan_idpostingan)
    VALUES ('$comment', '$user_id', '$idpostingan')";

    if (mysqli_query($conn, $sql)) {
        echo '<script type="text/javascript">alert("Berhasil menambahkan komentar"); </script>';
        echo '<script type="text/javascript"> window.location = "group_page.php?id=' . $group_id . '" </script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    break;
    case 'like':
    if (isset($_POST['like'])) {

        $id = $_POST['id'];
        $query = mysqli_query($conn, "select * from `like` where post_id='$id' and user_id='" . $_COOKIE['user_id'] . "'") or die(mysqli_error());

        if (mysqli_num_rows($query) > 0) {
            mysqli_query($conn, "delete from `like` where user_id='" . $_COOKIE['user_id'] . "' and post_id='$id'");
        } else {
            mysqli_query($conn, "insert into `like` (user_id,post_id) values ('" . $_COOKIE['user_id'] . "', '$id')");
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

    case 'delete_komentar':
    $idkomentar = mysqli_real_escape_string($conn, $_POST["idkomentar"]);
    $sql = "DELETE FROM komentar WHERE idkomentar = '$idkomentar'"; 
    if(mysqli_query($conn,$sql)) {
        echo '<script type="text/javascript">alert("Berhasil Menghapus Komentar"); </script>';
        echo '<script type="text/javascript"> window.location = "index.php" </script>';
    }
    break;

    case 'edit_komentar':
    $idkomentar = mysqli_real_escape_string($conn, $_POST["idkomentar"]);
    $isikomen = mysqli_real_escape_string($conn, $_POST["komentar"]);

    $sql = "UPDATE komentar SET isi='$isikomen' WHERE idkomentar='$idkomentar'";
    if (mysqli_query($conn, $sql)) {
        echo '<script type="text/javascript">alert("Berhasil Mengubah Komentar"); </script>';
        echo '<script type="text/javascript"> window.location = "index.php" </script>';
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    break;

    case 'delete_status':
    $idpostingan = mysqli_real_escape_string($conn, $_POST["idpostingan"]);
    $sql = "DELETE FROM komentar WHERE postingan_idpostingan = '$idpostingan'"; 
    if(mysqli_query($conn,$sql)) {
        $sql2 = "DELETE FROM `like` WHERE post_id = '$idpostingan'";
        if(mysqli_query($conn,$sql2)) {
            $sql3 = "DELETE FROM postingan WHERE idpostingan = '$idpostingan'"; 
            if(mysqli_query($conn,$sql3)) {
                echo '<script type="text/javascript">alert("Berhasil Menghapus Status"); </script>';
                echo '<script type="text/javascript"> window.location = "index.php" </script>';
            } else {
                echo "Error : " . mysqli_error($conn);
            }
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        echo "Error : " . mysqli_error($conn);
    }
    break;
}
?>