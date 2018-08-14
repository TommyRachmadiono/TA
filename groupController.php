<?php
session_start();
include 'config/connectdb.php';

$act = $_POST["act"];

if ($_SESSION['login'] == true) {

    switch ($act) {
        case 'create_group':
            $topic_discussion = $_POST["topic_discussion"];
            $user_id = $_SESSION['user_id'];
            $tgl_dibuat = date("Y/m/d");
            $group_id = '';

            $sql = "INSERT INTO grup (topik_grup, user_id, tgl_dibuat)
        VALUES ('$topic_discussion', '$user_id', '$tgl_dibuat')";
            if ($conn->query($sql) === TRUE) {
                $query = "SELECT * FROM `grup` order by id DESC LIMIT 1";
                $result = $conn->query($query);
                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $group_id = $row['id'];
                    }
                }
                $sql2 = "INSERT INTO `anggota` (`grup_id`, `user_id`, `tgl_join`) VALUES ('$group_id', '$user_id', '$tgl_dibuat');";
                $conn->query($sql2);

                echo '<script type="text/javascript">alert("Created New Group Successfully"); </script>';
                echo '<script type="text/javascript"> window.location = "index.php" </script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            break;

        case 'delete_group':
            $grup_id = $_POST['grup_id'];
            $dir = "postingan";
            $dir2 = "komentar";

            $sql2 = "SELECT * FROM postingan WHERE grup_id = '$grup_id'";
            $result = $conn->query($sql2);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $idpostingan = $row['idpostingan'];
                    $file = $row['file'];
                    if (isset($file))
                        unlink($dir . '/' . $file);
                }

                $sql3 = "SELECT * FROM komentar WHERE postingan_idpostingan = '$idpostingan'";
                $result2 = $conn->query($sql3);
                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        $file2 = $row2['file'];
                        if (isset($file2))
                            unlink($dir2 . '/' . $file2);
                    }
                }
            }


            $sql = "DELETE FROM grup WHERE id = '$grup_id'";
            if ($conn->query($sql) === TRUE) {
                echo '<script type="text/javascript">alert("Berhasil membubarkan grup"); </script>';
                echo '<script type="text/javascript"> window.location = "index.php" </script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            break;

        case 'exit_group':
            $grup_id = $_POST['grup_id'];
            $user_id = $_COOKIE['user_id'];
            $sql = "DELETE FROM anggota WHERE user_id = '$user_id' AND grup_id = '$grup_id'";
            if ($conn->query($sql) === TRUE) {
                echo '<script type="text/javascript">alert("Berhasil keluar dari grup"); </script>';
                echo '<script type="text/javascript"> window.location = "index.php" </script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            break;

        case 'invite_member':
            $member_id = $_POST['member_id'];
            $group_id = $_POST['group_id'];
            $tgl_join = date("Y/m/d");

            $sql = "INSERT INTO anggota (grup_id, user_id, tgl_join) 
        VALUES ('$group_id', '$member_id', '$tgl_join')";
            if ($conn->query($sql) === TRUE) {
                echo '<script type="text/javascript">alert("User ' . $member_id . ' has been invited to group"); </script>';
                echo '<script type="text/javascript"> window.location = "group_page.php?id=' . $group_id . '" </script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            break;

        case 'kick_member':
            $member_id = $_POST['member_id'];
            $group_id = $_POST['group_id'];

            $sql = "DELETE FROM anggota WHERE grup_id = '$group_id' AND user_id = '$member_id'";
            if ($conn->query($sql) === TRUE) {
                echo '<script type="text/javascript">alert("Berhasil mengeluarkan user ' . $member_id . ' dari grup"); </script>';
                echo '<script type="text/javascript"> window.location = "group_page.php?id=' . $group_id . '" </script>';
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