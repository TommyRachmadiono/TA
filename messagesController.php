<?php
session_start();
include 'config/connectdb.php';

$act = $_POST["act"];

if ($_SESSION['login'] == false) {
    echo '<script type="text/javascript">alert("Silahkan Login Terlebih Dahulu"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}

switch ($act) {
    case 'add_conversation':
    $time = date("Y-m-d H:i:s");
    $id_pengirim = $_COOKIE['user_id'];
    $id_penerima = mysqli_real_escape_string($conn, $_POST["penerima"]);
    $reply = mysqli_real_escape_string($conn, $_POST["reply"]);

    $sql2 = "SELECT * FROM conversation c INNER JOIN user u on c.id_pengirim = u.id INNER JOIN user us on c.id_penerima = us.id WHERE c.id_pengirim = '$id_pengirim' AND c.id_penerima = '$id_penerima' OR c.id_pengirim = '$id_penerima' AND c.id_penerima = '$id_pengirim'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            echo '<script type="text/javascript">alert("Gagal membuat percakapan baru. Kamu sudah mempunyai percakapan dengan user tersebut."); </script>';
            echo '<script type="text/javascript"> window.location = "inbox.php" </script>';
        }
    } else {
        $sql = "INSERT INTO conversation (id_pengirim, id_penerima, time)
        VALUES ('$id_pengirim', '$id_penerima', '$time')";
        if (mysqli_query($conn, $sql)) {
            $sql4 = "SELECT c_id from conversation order by c_id DESC limit 1";
            $result3 = $conn->query($sql4);
            if ($result3->num_rows > 0) {
                while ($row3 = $result3->fetch_assoc()) {
                    $c_id = $row3['c_id'];
                }
            }
            $sql3 = "INSERT INTO conversation_reply (reply, fk_id_pengirim, time, fk_c_id, seen)
            VALUES ('$reply', '$id_pengirim', '$time', '$c_id', 0)";
            if (mysqli_query($conn, $sql3)) {
                $sql5 = "INSERT INTO notification (c_id, n_number, id_penerima)
                VALUES ('$c_id', 1, '$id_penerima')";
                if (mysqli_query($conn, $sql5)) {
                    echo '<script type="text/javascript">alert("Berhasil membuat percakapan baru"); </script>';
                    echo '<script type="text/javascript"> window.location = "inbox.php" </script>';
                }
            }
        }
    }
    break;

    case 'delete_conversation':
    $c_id = mysqli_real_escape_string($conn, $_POST["idconversation"]);
    $sql = "DELETE FROM conversation WHERE c_id = '$c_id'";
    if (mysqli_query($conn, $sql)) {
        echo '<script type="text/javascript">alert("Berhasil Menghapus Percakapan"); </script>';
        echo '<script type="text/javascript"> window.location = "inbox.php" </script>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    break;

    case 'add_reply':
    $id_pengirim = $_COOKIE['user_id'];
    $id_penerima = mysqli_real_escape_string($conn, $_POST["id_lawan"]);
    $time = date("Y-m-d H:i:s");
    $c_id = mysqli_real_escape_string($conn, $_POST["c_id"]);
    $reply = mysqli_real_escape_string($conn, $_POST["reply"]);

    $sql = "INSERT INTO conversation_reply (reply, fk_id_pengirim, time, fk_c_id, seen)
    VALUES ('$reply', '$id_pengirim', '$time', '$c_id', 0)";
    if (mysqli_query($conn, $sql)) {
        $sql2 = "SELECT * FROM notification WHERE c_id = '$c_id' AND id_penerima = '$id_penerima'";
        $result = $conn->query($sql2);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $notif = $row['n_number'] + 1;
                $sql3 = "UPDATE notification SET n_number='$notif' WHERE c_id = '$c_id' AND id_penerima = '$id_penerima'";
                if (mysqli_query($conn, $sql3)) {
                    echo '<script type="text/javascript">alert("Berhasil Membalas Pesan"); </script>';
                    echo '<script type="text/javascript"> window.location = "messages.php?conversation_id=' . $c_id . '" </script>';
                }
            }
        } else {
            $sql = "INSERT INTO notification (c_id, n_number, id_penerima)
            VALUES ('$c_id', 1, '$id_penerima')";
            if (mysqli_query($conn, $sql)) {
                echo '<script type="text/javascript">alert("Berhasil Membalas Pesan"); </script>';
                echo '<script type="text/javascript"> window.location = "messages.php?conversation_id=' . $c_id . '" </script>';
            }
        }
    }
    break;
}

?>