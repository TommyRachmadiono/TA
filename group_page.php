<!-- <script type='text/javascript'>alert('coba');</script> -->

<?php
session_start();
include 'config/connectdb.php';
include_once 'layout/header.php';
$_SESSION['menuHeader'] = '';

if ($_SESSION["login"] == false) {
    echo '<script type="text/javascript">alert("Silahkan login terlebih dahulu"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}

$_SESSION['menuHeader'] = 'group_page';
$_SESSION['count'] = 0;

$lastId;
$user_id = $_SESSION['user_id'];
if (isset($_GET["id"])) {
    $group_id = $_GET["id"];
    ?>

    <div class="c-layout-page">
        <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
        <div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both">
            <div class="container">
                <div class="c-page-title c-pull-left">
                    <img style="width: 100%; height: 150px; margin-left: 15%; border-radius: 50%;" src="images/<?php echo $_SESSION['foto_profil'] ?>">
                </div>
                <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>/</li>
                    <?php
                    $sql = "SELECT * FROM `grup` WHERE id = '$group_id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <li class="c-state_active">Group <?php echo $row['topik_grup'] ?></li>
                            <?php
                        }
                    } else {
                        echo '<script type="text/javascript">alert("Jangan otak atik idnya lewat url cok"); </script>';
                        echo '<script type="text/javascript"> window.location = "index.php" </script>';
                    }
                    ?>

                </ul>
            </div>
        </div>
        <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
        <div class="container">

            <!-- SIDEBAR MENU -->
            <?php include_once 'layout/sidebar_menu.php'; ?>

            <!-- BEGIN CONTENT -->
            <div class="c-layout-sidebar-content " id="postlist">
                <div style="margin-bottom: 12%;">
                    <form method="POST" action="postingController.php" enctype="multipart-formdata">
                        <input type="hidden" name="act" value="posting_group">
                        <input type="hidden" name="group_id" value="<?php echo $group_id ?>">
                        <textarea class="form-control" name="textarea" autofocus="autofocus" rows="3" style="font-size: 20px; resize: none;" placeholder="What's on your mind?"></textarea>
                        <input type="submit" value="POST" class="btn btn-primary btn-lg" style="float: right; margin-top: 2%; margin-bottom: 0;">
                    </form>
                </div>
                <?php
                $sql = "SELECT p.idpostingan, p.isi, p.tgldiposting, u.nama, u.foto FROM postingan p INNER JOIN user u on p.user_id = u.id WHERE p.grup_id = $group_id order by p.idpostingan desc LIMIT 5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $idpostingan = $row['idpostingan'];
                        $lastID = $idpostingan;

                        $_SESSION['count'] ++;
                        ?>
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <img style="display: inline; border-radius: 50%; height: 40px;" src="images/<?php echo $row['foto'] ?>">
                                <h3 class="panel-title" style="display: inline;"><?php echo $row['nama'] ?>
                                    <a class="anchorjs-link" href="#panel-title">
                                        <span class="anchorjs-icon"></span>
                                    </a>
                                </h3>
                            </div>
                            <div class="panel-body" style="word-wrap: break-word;"> 
                                <p> <?php echo nl2br($row['isi']) ?> </p> 
                                <hr style="margin: 0; padding-top: 10px;">

                                <!-- ICON LIKE DAN KOMEN DISINI -->
                                <div class="row" style="width: 100%; margin: 0; padding: 0;">
                                    <div class="col-md-6" style="margin: 0; padding: 0;">
                                        <div class="fa-hover col-md-6 filter-icon" style="text-align: center; width: 100%;">
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $query1 = mysqli_query($conn, "SELECT * FROM `like` WHERE post_id = $idpostingan AND user_id = $user_id");
                                            if (mysqli_num_rows($query1) > 0) {
                                                ?>
                                                <button value="<?php echo $idpostingan ?>" class="unlike btn btn-default" style="width: 100%;"> 
                                                    <i class="fa fa-thumbs-o-down"></i>Unlike
                                                </button>
                                            <?php } else { ?>
                                                <button value="<?php echo $idpostingan ?>" class="like btn btn-default" style="width: 100%;"> 
                                                    <i class="fa fa-thumbs-o-up"></i>Like
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6" style="margin: 0; padding: 0;">
                                        <div class="fa-hover col-md-6 filter-icon" style="text-align: center; width: 100%;" onclick="document.getElementById('komen<?php echo $_SESSION['count'] ?>').focus(); return false;">
                                            <button class="btn btn-default" style="width: 100%;">         
                                                <i class="fa fa-comment-o"></i>Comment
                                            </button></div>
                                    </div>
                                </div>
                                <hr style="margin-top: 10px; margin-bottom: 0; height: 3px;">


                                <!-- TOTAL LIKE MASUKIN DISINI -->
                                <div style="background-color: #f7f7f7;">
                                    <i class="fa fa-thumbs-up" style="margin-left: 3%;"></i> <span id="show_like<?php echo $idpostingan ?>" style="padding-top: 2%; display: inline;">
                                        <?php
                                        $query2 = mysqli_query($conn, "SELECT * FROM `like` WHERE post_id = $idpostingan");
                                        echo mysqli_num_rows($query2);
                                        ?>
                                    </span><div id="loadkomen<?php echo $idpostingan; ?>" style="display: inline; margin-left: 35%;" onclick="$('#isikomen<?php echo $idpostingan; ?>').slideToggle();";>LOAD KOMEN</div>
                                    <hr style="margin: 0;">
                                </div>

                                <section id="comment">
                                    <!-- ISI DARI KOMEN MASUK DISINI -->
                                    <div style="background-color: #f7f7f7; padding-left: 2%; padding-top: 2%; padding-right: 2%;">
                                        <div id="isikomen<?php echo $idpostingan; ?>">
                                            <?php
                                            $sql2 = "SELECT u.nama, k.isi FROM komentar k inner join postingan p on k.postingan_idpostingan = p.idpostingan inner join user u on k.user_id = u.id WHERE k.postingan_idpostingan = $idpostingan";
                                            $result2 = $conn->query($sql2);

                                            if ($result2->num_rows > 0) {
                                                // output data of each row
                                                while ($row2 = $result2->fetch_assoc()) {
                                                    ?> 
                                                    <img style="display: inline; border-radius: 50%; height: 40px;" src="images/<?php echo $_SESSION['foto_profil'] ?>">
                                                    <h3 style="display: inline;"><?php echo $row2['nama'] ?></h3>

                                                    <p style="margin-top: 1.5%;margin-bottom: 2%;"><?php echo nl2br($row2['isi']) ?></p>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <!-- INPUT TYPE KOMEN DAN BUTTON KOMEN DISINI -->
                                        <form method="POST" enctype="multipart/form-data" class="form-inline" action="postingController.php">
                                            <div class="row">
                                                <div class="form-group input-group-lg" style="margin-bottom: 2%; margin-top: 2%; width: 100%;">
                                                    <input type="hidden" name="idpostingan" value="<?php echo $idpostingan ?>">
                                                    <input type="hidden" name="act" value="comment_feeds_group">
                                                    <input type="hidden" name="group_id" value="<?php echo $group_id ?>">
                                                    <input type="text" placeholder="Write a comment" class="form-control" id="komen<?php echo $_SESSION['count'] ?>" name="comment" style="width: 96%; margin-right: 2%; margin-left: 2%;">

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div id="postterakhir" lastID = <?php echo $lastID; ?> groupID=<?php echo $group_id; ?> act="datapage" style="display: none;""><h>LOADING . . .(last id = <?php echo $lastID; ?>)</h></div>

                    <?php } else {
                    ?>
                    <div id="postterakhir" lastID="0" groupID="" act=""><h>BELOM ADA KONTEN</h></div>
                <?php } ?>
            </div>

            <div class="row">
                <div class="col-md-3"> </div>
                <div class="col-md-9">
                    <button id="btnshowmore" style="width: 100%; margin-bottom: 4%; height: 50px; margin-top: 0;" class="btn btn-danger">SHOW MORE</button>
                </div>
            </div>

            <!-- END CONTENT -->
        </div>
        <?php include_once 'layout/modal_group.php' ?>
    </div>
    <?php
} else {
    echo '<script type="text/javascript">alert("Mau ngapain hayo?"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
?>
<!-- FOOTER -->
<?php
include_once 'layout/footer.php';
?>