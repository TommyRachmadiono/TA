<?php
session_start();

include 'config/connectdb.php';
$_SESSION['menuHeader'] = 'home';
include_once 'layout/header.php';
$_SESSION['count'] = 0;
?>

<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <?php
    if ($_SESSION["login"] == true) {
        $user_id = $_COOKIE['user_id'];
        ?>
        <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
        <div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold c-bordered c-bordered-both" style="margin-bottom: 0; background-color: lightblue;">
            <div class="container" style="margin-bottom: 0;">
                <div class="c-page-title c-pull-left" style=" margin-bottom:0;">
                    <img style="border-width: 3px; border-style: solid; border-color: black; height: 180px; margin-left: 15%; width: 190px; border-radius: 50%;" src="images/fotoprofil/<?php echo $_COOKIE['foto_profil'] ?>">
                </div>
                <div>
                    <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular" style="width: 74%; margin-top: 0; margin-bottom: 0;">
                        <li style="width: 100%; margin-bottom: 0;">
                            <div class="posting">
                                <form method="POST" action="postingController.php" enctype="multipart/form-data">
                                    <input type="hidden" name="act" value="posting_feeds">
                                    <textarea required="" class="form-control" name="textarea" autofocus="autofocus" rows="3" style="font-size: 20px; resize: none;" placeholder="What's on your mind?"></textarea>
                                    <input type="submit" value="POST" class="btn btn-primary btn-lg" style="float: right; margin-top: 2%; margin-bottom: 0;">

                                    <button id="btnfile" type="button" class="btn btn-primary btn-lg" style="float: right; margin-top: 2%; margin-bottom: 0; margin-left: 2%; margin-right: 2%;">
                                        <span class="glyphicon glyphicon-paperclip"></span>
                                    </button>

                                    <input type="file" id="file" name="file" class="btn btn-primary btn-lg" style="float: right; margin-top: 2%; margin-bottom: 0; margin-left: 2%; margin-right: 2%; display: none;">
                                    <p class="file-name" style="float: right; margin-top: 2%;">Please select a file <br> max 5mb</p>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    <?php } ?>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
    <div class="container">
        <!-- SIDEBAR MENU -->
        <?php include_once 'layout/sidebar_menu.php'; ?>

        <!-- BEGIN: PAGE CONTENT -->
        <div class="c-layout-sidebar-content " id="postlist">
            <?php
            $sql = "SELECT p.file, p.idpostingan, p.isi, p.tgldiposting, u.nama, u.foto, u.id, u.role FROM postingan p INNER JOIN user u on p.user_id = u.id WHERE ISNULL(p.grup_id) order by p.idpostingan desc LIMIT 5";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $idpostingan = $row['idpostingan'];
                    $lastID = $idpostingan;

                    $_SESSION['count'] ++;
                    ?>
                    <!-- BEGIN: MODAL DELETE STATUS -->
                    <div class="modal fade" id="modalDeleteStatus<?php echo $row['idpostingan'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content c-square">
                                <div class="modal-body">
                                    <h3 class="c-font-24 c-font-sbold">Are you sure want to delete this status ?</h3>
                                    <div class="form-group">
                                        <button  data-dismiss="modal" class="btn btn-danger">Cancel</button>
                                        <form method="POST" action="postingController.php" style="display: inline-block;">
                                            <input type="hidden" name="act" value="delete_status">
                                            <input type="hidden" name="idpostingan" value="<?php echo $row['idpostingan']; ?>">
                                            <button class="btn btn-info" > Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: MODAL DELETE STATUS -->

                    <div class="panel panel-warning">
                        <div class="panel-heading" >
                            <img style="display: inline; border-radius: 50%; height: 40px;" src="images/fotoprofil/<?php echo $row['foto'] ?>">
                            <h3 class="panel-title" style="display: inline;"><?php echo $row['nama'] ?>
                                <a class="anchorjs-link" href="#panel-title">
                                    <span class="anchorjs-icon"></span>
                                </a>
                            </h3>
                            <?php if ($_SESSION["login"] == true) {
                                if ($row['id'] == $_COOKIE['user_id'] || $_COOKIE['role'] == 'admin') {
                                    ?>
                                    <a href="#" style="float: right;" data-toggle="modal" data-target="#modalDeleteStatus<?php echo $row['idpostingan']; ?>"><i class="fa fa-close"></i></a>
            <?php }
        } ?>
                        </div>
                        <div class="panel-body" style="word-wrap: break-word;"> 
                            <p> <?php echo nl2br($row['isi']) ?> </p> 
                            <div>
                                <?php
                                if (!empty($row['file'])) {
                                    $file = $row['file'];
                                    $info = pathinfo($file);
                                    $ext = $info['extension'];
                                    if ($ext == "jpg" || $ext == "png" || $ext == "jpeg") {
                                        ?>
                                        <img src="postingan/<?php echo $row["file"]; ?>" style="width: 65%; height: 250px; display: block; margin: auto;">
                                            <?php } else { ?>
                                        <div class="fa fa-hover">
                                            <a href="postingan/<?php echo $file ?>" download> <i class="fa fa-file-o"></i>
                                        <?php echo $file ?>
                                            </a>
                                        </div>
            <?php }
        }
        ?>
                            </div>

                            <hr style="margin: 0; padding-top: 10px;">
        <?php if ($_SESSION["login"] == true) { ?>
                                <!-- ICON LIKE DAN KOMEN DISINI -->
                                <div class="row" style="width: 100%; padding: 0; margin: 0;">
                                    <div class="col-md-6" style="margin: 0; padding: 0;">
                                        <div class="fa-hover col-md-6 filter-icon" style="text-align: center; width: 100%;">
                                            <?php
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
        <?php } ?>
                            <hr style="margin-top: 10px; margin-bottom: 0; height: 3px;">

                            <!-- TOTAL LIKE MASUKIN DISINI -->
                            <div style="background-color: #f7f7f7;">
                                <i class="fa fa-thumbs-up" style="margin-left: 3%;"></i> <span id="show_like<?php echo $idpostingan ?>" style="padding-top: 2%; display: inline;">
                                    <?php
                                    $query2 = mysqli_query($conn, "SELECT * FROM `like` WHERE post_id = $idpostingan");
                                    echo mysqli_num_rows($query2);
                                    ?> 
                                </span><div id="loadkomen<?php echo $idpostingan; ?>" style="display: inline; margin-left: 35%;" onclick="$('#isikomen<?php echo $idpostingan; ?>').slideToggle();";>Show / Hide Komentar</div>
                                <hr style="margin: 0; height: 5px;">
                            </div>

                            <section id="comment">
                                <!-- ISI DARI KOMEN MASUK DISINI -->
                                <div style="background-color: #f7f7f7; padding-left: 2%; padding-top: 2%; padding-right: 2%; padding-bottom: 0.5%;">
                                    <div id="isikomen<?php echo $idpostingan; ?>">
                                        <?php
                                        $sql2 = "SELECT u.id,u.nama, k.isi,k.idkomentar, u.foto FROM komentar k inner join postingan p on k.postingan_idpostingan = p.idpostingan inner join user u on k.user_id = u.id WHERE k.postingan_idpostingan = $idpostingan ORDER BY k.idkomentar asc";
                                        $result2 = $conn->query($sql2);

                                        if ($result2->num_rows > 0) {
                                            // output data of each row
                                            while ($row2 = $result2->fetch_assoc()) {
                                                ?> 
                                                <img style="display: inline; border-radius: 50%; height: 40px;" src="images/fotoprofil/<?php echo $row2['foto'] ?>">
                                                <h3 style="display: inline;"><?php echo $row2['nama'] ?></h3> 
                                                <?php if ($_SESSION["login"] == true && $row2['id'] == $user_id) { ?>
                                                    <a href="#" style="float: right;" data-toggle="modal" data-target="#modalDeleteKomen<?php echo $row2['idkomentar']; ?>"><i class="fa fa-close"></i></a>
                                                    <a href="#" style="float: right; margin-right: 2%;" data-toggle="modal" data-target="#modalEditKomen<?php echo $row2['idkomentar']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                <?php } ?>
                                                <p style="margin-top: 1.5%; margin-bottom: 2%;"><?php echo nl2br($row2['isi']); ?></p>

                                                <!-- BEGIN: MODAL DELETE COMMENT -->
                                                <div class="modal fade" id="modalDeleteKomen<?php echo $row2['idkomentar'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content c-square">
                                                            <div class="modal-body">
                                                                <h3 class="c-font-24 c-font-sbold">Are you sure want to delete this comment ?</h3>
                                                                <div class="form-group">
                                                                    <button  data-dismiss="modal" class="btn btn-danger">Cancel</button>
                                                                    <form method="POST" action="postingController.php" style="display: inline-block;">
                                                                        <input type="hidden" name="act" value="delete_komentar">
                                                                        <input type="hidden" name="idkomentar" value="<?php echo $row2['idkomentar']; ?>">
                                                                        <button class="btn btn-info" > Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END: MODAL DELETE COMMENT -->

                                                <!-- BEGIN: MODAL EDIT COMMENT -->
                                                <div class="modal fade" id="modalEditKomen<?php echo $row2['idkomentar'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content c-square">
                                                            <div class="modal-body">
                                                                <h3 class="c-font-24 c-font-sbold">Edit This Comment</h3>
                                                                <div class="form-group">
                                                                    <?php
                                                                    $idkomen = $row2['idkomentar'];
                                                                    $sql = "SELECT isi FROM komentar WHERE idkomentar = '$idkomen'";
                                                                    $result3 = $conn->query($sql);
                                                                    if ($result3->num_rows > 0) {
                                                                        while ($row = $result3->fetch_assoc()) {
                                                                            ?>

                                                                            <form method="POST" action="postingController.php">
                                                                                <textarea rows="3" name="komentar" value="<?php echo $row['isi'] ?>" class="form-control c-square c-theme active" style="resize: none; width: 80%;" required><?php echo $row['isi'] ?></textarea>
                                                                                <br>
                                                                                <input type="hidden" name="act" value="edit_komentar">
                                                                                <input type="hidden" name="idkomentar" value="<?php echo $row2['idkomentar']; ?>">
                                                                                <button  data-dismiss="modal" class="btn btn-danger" onclick="self.close();">Cancel</button>
                                                                                <button class="btn btn-info" >Update</button>
                                                                            </form>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END: MODAL EDIT COMMENT -->
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>

        <?php if ($_SESSION["login"] == true) { ?>
                                        <!-- INPUT TYPE KOMEN DAN BUTTON KOMEN DISINI -->
                                        <form method="POST" enctype="multipart/form-data" class="form-inline" action="postingController.php">
                                            <div class="row">
                                                <div class="form-group input-group-lg" style="margin-bottom: 2%; margin-top: 2%; width: 100%;">

                                                    <input type="hidden" name="idpostingan" value="<?php echo $idpostingan ?>">
                                                    <input type="hidden" name="act" value="comment_feeds">
                                                    <input type="text" placeholder="Write a comment" class="form-control" id="komen<?php echo $_SESSION['count'] ?>" name="comment" style="width: 96%; margin-right: 2%; margin-left: 2%;">
                                                </div>
                                            </div>
                                        </form>
        <?php } ?>
                                </div>
                            </section>
                        </div>
                    </div>
                <?php } ?>
                <div id="postterakhir" lastID = <?php echo $lastID; ?> act="dataindex" style="display: none;""><h>LOADING . . .(last id = <?php echo $lastID; ?>)</h></div>
            <?php } else {
                ?>
                <div id="postterakhir" lastID="0" groupID="" act=""><h>BELOM ADA KONTEN</h></div>
<?php }
?>
        </div>

        <div class="row">
            <div class="col-md-3"> </div>
            <div class="col-md-9">
                <button id="btnshowmore" style="width: 100%; margin-bottom: 4%; height: 50px; margin-top: 0;" class="btn btn-danger">SHOW MORE</button>
            </div>

        </div>
        <!-- END: PAGE CONTENT -->

        <!-- MODAL CREATE GROUP -->
        <div class="modal fade c-content-login-form" id="create-group" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content c-square">
                    <div class="modal-header c-no-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3 class="c-font-24 c-font-sbold">Create New Discussion Group</h3>
                        <form action="groupController.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="create-group" class="">Your Group Name</label>
                                <input type="text" class="form-control input-lg c-square" id="topic_discussion" placeholder="Group Name" name="topic_discussion" required=""> 
                                <input type="hidden" name="act" value="create_group">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;" name="create-group" id="create-group">Create</button><br><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END: PAGE CONTAINER -->

    <!-- FOOTER -->
    <?php
    include_once 'layout/footer.php';
    ?>


