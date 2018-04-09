<?php
session_start();
include 'config/connectdb.php';

if (!empty($_POST["id"])) {

//Get last ID
    $lastID = $_POST['id'];
    $group_id = $_POST['groupID'];
    $act = $_POST['act'];
//Limit on data display
    $showLimit = 5;
    $sisadata;

    switch ($act) {
        case 'datapage':
            //Get all rows except already displayed
            $querytotalkontenbelumterload = "SELECT COUNT(*) as num_rows FROM postingan WHERE idpostingan < $lastID AND grup_id = $group_id ORDER BY idpostingan DESC";
            $hasil = mysqli_query($conn, $querytotalkontenbelumterload) or die(mysqli_error());
            if (mysqli_num_rows($hasil) > 0) {
                while ($row = mysqli_fetch_assoc($hasil)) {
                    $sisadata = $row['num_rows'];
                }
            }

            $queryloadposting = "SELECT * FROM postingan p INNER JOIN user u on p.user_id=u.id WHERE idpostingan < $lastID AND p.grup_id = $group_id ORDER BY idpostingan DESC LIMIT $showLimit";
//Get rows by limit except already displayed
            $hasil = mysqli_query($conn, $queryloadposting) or die(mysqli_error());
            if (mysqli_num_rows($hasil) > 0) {
                while ($row = mysqli_fetch_assoc($hasil)) {
                    $postID = $row["idpostingan"];

                    $_SESSION['count'] ++
                    ?>

                    <div class="panel panel-warning">
                        <div class="panel-heading" >
                            <img style="display: inline; border-radius: 50%; height: 40px;" src="img/<?php echo $row['foto'] ?>">
                            <h3 class="panel-title" style="display: inline;"><?php echo $row['nama'] ?>
                                <a class="anchorjs-link" href="#panel-title">
                                    <span class="anchorjs-icon"></span>
                                </a>
                            </h3>

                        </div>
                        <div class="panel-body"> <p> <?php echo nl2br($row['isi']) ?> </p> 
                            <div>
                                <?php if(!empty($row['file'])) { ?>
                                <img src="postingan/<?php echo $row["file"]; ?>" style="width: 65%; height: 250px; display: block; margin: auto;">
                                <?php } ?>
                            </div>
                            <hr style="margin: 0; padding-top: 10px;">

                            <?php if ($_SESSION["login"] == true) { ?>
                                <!-- ICON LIKE DAN KOMEN DISINI -->
                                <div class="row" style="width: 100%; padding: 0; margin: 0;">
                                    <div class="col-md-6" style="margin: 0; padding: 0;">
                                        <div class="fa-hover col-md-6 filter-icon" style="text-align: center; width: 100%;">
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $query1 = mysqli_query($conn, "SELECT * FROM `like` WHERE post_id = $postID AND user_id = $user_id");
                                            if (mysqli_num_rows($query1) > 0) {
                                                ?>
                                                <button value="<?php echo $postID ?>" class="unlike btn btn-default" style="width: 100%;"> 
                                                    <i class="fa fa-thumbs-o-down"></i>Unlike
                                                </button>
                                            <?php } else { ?>
                                                <button value="<?php echo $postID ?>" class="like btn btn-default" style="width: 100%;"> 
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
                                <i class="fa fa-thumbs-up" style="margin-left: 3%;"></i> <span id="show_like<?php echo $postID ?>" style="padding-top: 2%; display: inline;">
                                    <?php
                                    $query2 = mysqli_query($conn, "SELECT * FROM `like` WHERE post_id = $postID");
                                    echo mysqli_num_rows($query2);
                                    ?>
                                </span><div id="loadkomen<?php echo $idpostingan; ?>" style="display: inline; margin-left: 35%;" onclick="$('#isikomen<?php echo $idpostingan; ?>').slideToggle();";>LOAD KOMEN</div>
                                <hr style="margin: 0;">
                            </div>

                            <section id="comment">
                                <!-- ISI DARI KOMEN MASUK DISINI -->
                                <div style="background-color: #f7f7f7; padding-left: 2%; padding-top: 2%; padding-right: 2%;">
                                    <?php
                                    $sql2 = "SELECT u.nama, k.isi, u.foto FROM komentar k inner join postingan p on k.postingan_idpostingan = p.idpostingan inner join user u on k.user_id = u.id WHERE k.postingan_idpostingan = $postID";
                                    $result2 = $conn->query($sql2);

                                    if ($result2->num_rows > 0) {
                                        // output data of each row
                                        while ($row2 = $result2->fetch_assoc()) {
                                            ?> 
                                            <div id="isikomen<?php echo $postID; ?>" class="row" style="">

                                                <div class="col-md-4" style="margin-top: 2%;">
                                                    <img style="display: inline; border-radius: 50%; height: 40px;" src="img/<?php echo $row2['foto'] ?>">
                                                    <h3 style="display: inline;"><?php echo $row2['nama'] ?></h3>
                                                </div>
                                                <div class="col-md-8" style="margin-top: 2%;">
                                                    <p style="margin-top: 1.5%; "><?php echo nl2br($row2['isi']); ?></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <?php if ($_SESSION["login"] == true) { ?>
                                        <!-- INPUT TYPE KOMEN DAN BUTTON KOMEN DISINI -->
                                        <form method="POST" enctype="multipart/form-data" class="form-inline" action="postingController.php">
                                            <div class="row">
                                                <div class="form-group input-group-lg" style="margin-bottom: 2%; margin-top: 2%; width: 100%;">

                                                    <input type="hidden" name="idpostingan" value="<?php echo $postID ?>">
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

                    <?php
                }
                if ($sisadata > $showLimit) {
                    ?>
                    <div id="postterakhir" lastID="<?php echo $postID; ?>" groupID="<?php echo $group_id; ?>" act="datapage" style="display: none;"><h>LOADING . . .(last id = <?php echo $lastID; ?>)</h></div>
                <?php } else { ?>
                    <div id="postterakhir" lastID="0" groupID="" act=""><h>abis bis bis</h></div>
                    <?php
                }
            } else {
                ?>
                <div id="postterakhir" lastID="0" groupID="" act=""><h>abis bis bis</h></div>
                <?php
            }
            break;

        case 'dataindex':
            //Get all rows except already displayed
            $querytotalkontenbelumterload = "SELECT COUNT(*) as num_rows FROM postingan WHERE idpostingan < $lastID AND ISNULL(grup_id) ORDER BY idpostingan DESC";
            $hasil2 = mysqli_query($conn, $querytotalkontenbelumterload) or die(mysqli_error());
            if (mysqli_num_rows($hasil2) > 0) {
                while ($row = mysqli_fetch_assoc($hasil2)) {
                    $sisadata = $row['num_rows'];
                }
            } else {
                echo '<h2>BELUM ADA KONTEN</h2';
            }

            $queryloadposting = "SELECT * FROM postingan p INNER JOIN user u on p.user_id=u.id WHERE idpostingan < $lastID AND ISNULL(p.grup_id) ORDER BY idpostingan DESC LIMIT $showLimit";
//Get rows by limit except already displayed
            $hasil2 = mysqli_query($conn, $queryloadposting) or die(mysqli_error());
            if (mysqli_num_rows($hasil2) > 0) {
                while ($row = mysqli_fetch_assoc($hasil2)) {
                    $postID = $row["idpostingan"];

                    $_SESSION['count'] ++
                    ?>

                    <div class="panel panel-warning">
                        <div class="panel-heading" >
                            <img style="display: inline; border-radius: 50%; height: 40px;" src="img/<?php echo $row['foto'] ?>">
                            <h3 class="panel-title" style="display: inline;"><?php echo $row['nama'] ?>
                                <a class="anchorjs-link" href="#panel-title">
                                    <span class="anchorjs-icon"></span>
                                </a>
                            </h3>

                        </div>
                        <div class="panel-body"> <p> <?php echo nl2br($row['isi']) ?> </p> 
                            <div>
                                <?php if(!empty($row['file'])) { ?>
                                <img src="postingan/<?php echo $row["file"]; ?>" style="width: 65%; height: 250px; display: block; margin: auto;">
                                <?php } ?>
                            </div>
                            <hr style="margin: 0; padding-top: 10px;">

                            <?php if ($_SESSION["login"] == true) { ?>
                                <!-- ICON LIKE DAN KOMEN DISINI -->
                                <div class="row" style="width: 100%; padding: 0; margin: 0;">
                                    <div class="col-md-6" style="margin: 0; padding: 0;">
                                        <div class="fa-hover col-md-6 filter-icon" style="text-align: center; width: 100%;">
                                            <?php
                                            $user_id = $_SESSION['user_id'];
                                            $query1 = mysqli_query($conn, "SELECT * FROM `like` WHERE post_id = $postID AND user_id = $user_id");
                                            if (mysqli_num_rows($query1) > 0) {
                                                ?>
                                                <button value="<?php echo $postID ?>" class="unlike btn btn-default" style="width: 100%;"> 
                                                    <i class="fa fa-thumbs-o-down"></i>Unlike
                                                </button>
                                            <?php } else { ?>
                                                <button value="<?php echo $postID ?>" class="like btn btn-default" style="width: 100%;"> 
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
                                <i class="fa fa-thumbs-up" style="margin-left: 3%;"></i> <span id="show_like<?php echo $postID ?>" style="padding-top: 2%; display: inline;">
                                    <?php
                                    $query2 = mysqli_query($conn, "SELECT * FROM `like` WHERE post_id = $postID");
                                    echo mysqli_num_rows($query2);
                                    ?>
                                </span><div id="loadkomen<?php echo $postID; ?>" style="display: inline; margin-left: 35%;" onclick="$('#isikomen<?php echo $postID; ?>').slideToggle();";>LOAD KOMEN</div>
                                <hr style="margin: 0;">
                            </div>

                            <section id="comment">
                                <!-- ISI DARI KOMEN MASUK DISINI -->
                                <div style="background-color: #f7f7f7; padding-left: 2%; padding-top: 2%; padding-right: 2%;">
                                    <?php
                                    $sql2 = "SELECT u.nama, k.isi, u.foto FROM komentar k inner join postingan p on k.postingan_idpostingan = p.idpostingan inner join user u on k.user_id = u.id WHERE k.postingan_idpostingan = $postID";
                                    $result2 = $conn->query($sql2);

                                    if ($result2->num_rows > 0) {
                                        // output data of each row
                                        while ($row2 = $result2->fetch_assoc()) {
                                            ?> 
                                            <div id="isikomen<?php echo $postID; ?>" class="row" style="">

                                                <div class="col-md-4" style="margin-top: 2%;">
                                                    <img style="display: inline; border-radius: 50%; height: 40px;" src="img/<?php echo $row2['foto'] ?>">
                                                    <h3 style="display: inline;"><?php echo $row2['nama'] ?></h3>
                                                </div>
                                                <div class="col-md-8" style="margin-top: 2%;">
                                                    <p style="margin-top: 1.5%; "><?php echo nl2br($row2['isi']); ?></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <?php if ($_SESSION["login"] == true) { ?>
                                        <!-- INPUT TYPE KOMEN DAN BUTTON KOMEN DISINI -->
                                        <form method="POST" enctype="multipart/form-data" class="form-inline" action="postingController.php">
                                            <div class="row">
                                                <div class="form-group input-group-lg" style="margin-bottom: 2%; margin-top: 2%; width: 100%;">

                                                    <input type="hidden" name="idpostingan" value="<?php echo $postID ?>">
                                                    <input type="hidden" name="act" value="comment_feeds">
                                                    <input type="text" placeholder="Write a comment" class="form-control" id="komen<?php echo $_SESSION['count'] ?>" name="comment" style="width: 96%; margin-right: 2%; margin-left: 2%;">
                                                    <button type="submit" class="btn btn-default" style="float: right; margin-right: 2%; margin-top: 1%;">Comment</button>

                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                </div>
                            </section>
                        </div>
                    </div>

                    <?php
                }
                if ($sisadata > $showLimit) {
                    ?>
                    <div id="postterakhir" lastID="<?php echo $postID; ?>" act="dataindex" style="display: none;"><h>LOADING . . .(last id = <?php echo $lastID; ?>)</h></div>
                <?php } else { ?>
                    <div id="postterakhir" lastID="0" act=""><h>abis bis bis</h></div>
                    <?php
                }
            } else {
                ?>
                <div id="postterakhir" lastID="0" act=""><h>abis bis bis</h></div>
                <?php
            }
            break;
    }
}
?>
