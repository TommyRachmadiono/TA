<?php
session_start();
$_SESSION['menuHeader'] = 'home';
include 'config/connectdb.php';
include_once 'layout/header.php';

if ($_SESSION["login"] == false) {
    echo '<script type="text/javascript">alert("Silahkan login terlebih dahulu"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}

$id_lawan = '';
$user_id = $_COOKIE['user_id'];
if (isset($_GET['conversation_id'])) {
    $c_id = $_GET['conversation_id'];

    $sql = "SELECT * from conversation WHERE c_id = '$c_id' AND (id_pengirim = '$user_id' or id_penerima = '$user_id')";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        echo '<script type="text/javascript">alert("Kamu tidak ada dalam percakapan ini"); </script>';
        echo '<script type="text/javascript"> window.location = "inbox.php" </script>';
    }
} else {
    echo '<script type="text/javascript">alert("Jangan maenan URL"); </script>';
    echo '<script type="text/javascript"> window.location = "inbox.php" </script>';
}

$query = "UPDATE conversation_reply SET seen = 1 WHERE fk_c_id = '$c_id' AND fk_id_pengirim != '$user_id'";
if (mysqli_query($conn, $query)) {
    $query2 = "UPDATE `notification` SET `n_number`=0 WHERE id_penerima = '$user_id' AND c_id = '$c_id'";
    if (mysqli_query($conn, $query2)) {
        //do nothing
    }
}
?>
<div class="c-layout-page">
    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
    <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold">
        <div class="container">
            <?php
            $sql2 = "SELECT  c.*, u.foto as foto_pengirim, us.foto as foto_penerima, us.nama as nama_penerima, u.nama as nama_pengirim FROM conversation c INNER JOIN user u on c.id_pengirim = u.id INNER JOIN user us on c.id_penerima = us.id WHERE c_id = '$c_id' AND (id_pengirim = '$user_id' or id_penerima = '$user_id')";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    if ($user_id == $row2['id_penerima']) {
                        $id_lawan = $row2['id_pengirim'];
                        ?>
                        <div class="c-page-title c-pull-left">
                            <img src="images/fotoprofil/<?php echo $row2['foto_pengirim']; ?>" style="display: inline; border-radius: 50%; height: 100px;">
                            &nbsp;<h4 style="display: inline;"><?php echo $row2['nama_pengirim']; ?></h4>
                            <span class="help-block">this is conversation between you and <b><?php echo $row2['nama_pengirim'] ?></b></span>
                        </div>
                        <?php
                    } else {
                        $id_lawan = $row2['id_penerima'];
                        ?>
                        <div class="c-page-title c-pull-left">
                            <img src="images/fotoprofil/<?php echo $row2['foto_penerima']; ?>" style="display: inline; border-radius: 50%; height: 100px;">
                            &nbsp;<h4 style="display: inline;"><?php echo $row2['nama_penerima']; ?></h4>
                            <span class="help-block">this is conversation between you and <b><?php echo $row2['nama_penerima'] ?></b></span>
                        </div>
                        <?php
                    }
                }
            }
            ?>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>/</li>
                <li>
                    <a href="inbox.php">Inbox</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
    
    <div style="margin-left: 10%;margin-right: 10%; margin-top: 2%;">
        <?php
        $sql = "SELECT * FROM conversation_reply cr INNER JOIN user u on cr.fk_id_pengirim = u.id WHERE fk_c_id = '$c_id' ORDER BY time asc";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div style="margin-bottom: 2%;">
                    <img src="images/fotoprofil/<?php echo $row['foto'] ?>" style="display: inline; border-radius: 50%; height: 70px; width: 80px;">
                    <h2 style="display: inline;"><b><?php echo $row['nama'] ?></b></h2>
                    <h3 class="panel-title" style="float: right; margin-right: 2%;"><span class="glyphicon glyphicon-time"></span> <?php echo $row['time'] ?>
                    </h3>
                    <h3 style=""><?php echo $row['reply'] ?></h3>
                    <hr style="height:1px;border:none;color:#333;background-color:#333;">
                </div>
                <?php
            }
        }
        ?>

        <form method="POST" action="messagesController.php">
            <textarea required="" class="form-control" name="reply" rows="2" style="font-size: 17px; resize: none;" placeholder="Write a reply. . ."></textarea>
            <input type="hidden" name="id_lawan" value="<?php echo $id_lawan; ?>">
            <input type="hidden" name="c_id" value="<?php echo $c_id ?>">
            <input type="hidden" name="act" value="add_reply">
            <button type="submit" class="btn btn-info" style="float: right; margin-top: 2%; margin-bottom: 3%;">Send Message</button>
        </form>
    </div>
</div>

<?php
include_once 'layout/footer.php';
?>