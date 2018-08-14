<?php
session_start();
include 'config/connectdb.php';

$act = $_POST["act"];

if ($_SESSION['login'] == true) {

    switch ($act) {
        case 'ignore_report':
            $postingan_id = $_POST['postingan_id'];
            $sql = "DELETE FROM report WHERE postingan_id = '$postingan_id'";
            if ($conn->query($sql) === TRUE) {
                echo '<script type="text/javascript">alert("Mengabaikan Report"); </script>';
                echo '<script type="text/javascript"> window.location = "report.php" </script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            break;

        case 'delete_postingan':
            $postingan_id = $_POST['postingan_id'];
            $dir = "postingan";

            $sql4 = "SELECT * FROM postingan WHERE idpostingan = '$postingan_id'";
            $result = $conn->query($sql4);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $file = $row['file'];
                }
            }

            if ($file != "") {
                unlink($dir . '/' . $file);
            }

            $sql = "DELETE FROM postingan WHERE idpostingan = '$postingan_id'";
            if ($conn->query($sql) === TRUE) {
                echo '<script type="text/javascript">alert("Berhasil menghapus postingan"); </script>';
                echo '<script type="text/javascript"> window.location = "report.php" </script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            break;
    }
} else {
    echo '<script type="text/javascript">alert("Silahkan Login Terlebih Dahulu"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
?>