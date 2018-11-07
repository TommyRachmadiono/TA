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
    if ($_SESSION["login"] == true) {
    $user_id = $_COOKIE['user_id'];
    }

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

                    <!-- BEGIN: MODAL EDIT STATUS -->
                    <div class="modal fade" id="modalEditStatus<?php echo $row['idpostingan'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content c-square">
                                <div class="modal-body">
                                    <h3 class="c-font-24 c-font-sbold">Ubah postingan</h3>
                                    <div class="form-group">
                                        <?php
                                        $idpostingan = $row['idpostingan'];
                                        $sql = "SELECT isi FROM postingan WHERE idpostingan = '$idpostingan'";
                                        $hasil = $conn->query($sql);
                                        if ($hasil->num_rows > 0) {
                                            while ($a = $hasil->fetch_assoc()) {
                                                ?>
                                                <form method="POST" action="postingController.php">
                                                    <textarea rows="3" name="isi" value="<?php echo $row['isi'] ?>" class="form-control c-square c-theme active" style="resize: none; width: 80%;" required><?php echo $row['isi'] ?></textarea>
                                                    <br>
                                                    <input type="hidden" name="act" value="edit_status">
                                                    <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
                                                    <input type="hidden" name="idpostingan" value="<?php echo $row['idpostingan']; ?>">
                                                    <button  data-dismiss="modal" class="btn btn-danger" onclick="self.close();">Batal</button>
                                                    <button class="btn btn-info" >Perbarui</button>
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
                    <!-- END: MODAL EDIT STATUS -->

                    <!-- BEGIN: MODAL DELETE STATUS -->
                    <div class="modal fade" id="modalDeleteStatus<?php echo $row['idpostingan'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content c-square">
                                <div class="modal-body">
                                    <h3 class="c-font-24 c-font-sbold">Apakah anda yakin ingin menghapus postingan ini ?</h3>
                                    <div class="form-group">
                                        <button  data-dismiss="modal" class="btn btn-danger">Batal</button>
                                        <form method="POST" action="postingController.php" style="display: inline-block;">
                                            <input type="hidden" name="act" value="delete_status">
                                            <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
                                            <input type="hidden" name="idpostingan" value="<?php echo $row['idpostingan']; ?>">
                                            <button class="btn btn-info" > Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: MODAL DELETE STATUS -->

                    <div class="panel panel-warning" id="status_postingan">
                        <div class="panel-heading" >
                            <img style="border-radius: 50%; height: 40px;" src="images/fotoprofil/<?php echo $row['foto'] ?>">
                            <h3 class="panel-title" style="display: inline;"><?php echo $row['nama'] ?>
                                <a class="anchorjs-link" href="#panel-title">
                                    <span class="anchorjs-icon"></span>
                                </a>
                            </h3>
                            <?php
                            if ($_SESSION["login"] == true) {
                                if ($row['id'] == $_COOKIE['user_id'] || $_COOKIE['role'] == 'admin') {
                                    ?>
                                    <a href="#" style="float: right; margin-left: 2%;" data-toggle="modal" data-target="#modalDeleteStatus<?php echo $row['idpostingan']; ?>">
                                        <i class="fa fa-close"></i></a>
                                    <a href="#" style="float: right; margin-top: 2px; margin-left: 1.5%;" data-toggle="modal" data-target="#modalEditStatus<?php echo $row['idpostingan']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                                    <?php
                                }
                                if ($row['id'] != $_COOKIE['user_id']) {
                                    $query = mysqli_query($conn, "SELECT * FROM report WHERE user_id = '$user_id' AND postingan_id = '$idpostingan'");
                                    if (mysqli_num_rows($query) > 0) {
                                        ?>
                                        <button value="<?php echo $idpostingan ?>" class="unreport btn btn-danger" style="float: right; margin-top: 0.5%; padding: 0;padding-left: 1%;"><i class="fa fa-flag"></i></button>
                                    <?php } else { ?>
                                        <button value="<?php echo $idpostingan ?>" class="report btn btn-danger" style="float: right; margin-top: 0.5%; padding: 0;padding-left: 1%;"><i class="fa fa-flag"></i></button>
                                        <?php
                                    }
                                }
                            }
                            ?>
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
                                        <?php
                                    }
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
                                            $user_id = $_COOKIE['user_id'];
                                            $query1 = mysqli_query($conn, "SELECT * FROM `like` WHERE post_id = $postID AND user_id = $user_id");
                                            if (mysqli_num_rows($query1) > 0) {
                                                ?>
                                                <button value="<?php echo $postID ?>" class="unlike btn btn-default" style="width: 100%;"> 
                                                    <i class="fa fa-thumbs-o-down"></i>Batal Suka
                                                </button>
                                            <?php } else { ?>
                                                <button value="<?php echo $postID ?>" class="like btn btn-default" style="width: 100%;"> 
                                                    <i class="fa fa-thumbs-o-up"></i>Suka
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6" style="margin: 0; padding: 0;">
                                        <div class="fa-hover col-md-6 filter-icon" style="text-align: center; width: 100%;" onclick="document.getElementById('komen<?php echo $_SESSION['count'] ?>').getElementsByClassName('txtkomen')[0].focus()">
                                            <button class="btn btn-default" style="width: 100%;">         
                                                <i class="fa fa-comment-o"></i>Komentar
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
                                </span>
                                <?php 
                                $queryKomen = "SELECT * FROM komentar WHERE postingan_idpostingan = $idpostingan";
                                $hasilQuery = $conn->query($queryKomen);
                                if($hasilQuery->num_rows > 0) {
                                ?>
                                <div id="loadkomen<?php echo $idpostingan; ?>" style="display: inline; margin-left: 28%;" onclick="$('#isikomen<?php echo $idpostingan; ?>').slideToggle();";>Tampilkan / Sembunyikan Komentar</div>
                            <?php } ?>
                                <hr style="margin: 0;">
                            </div>

                            <section id="comment">
                                <!-- ISI DARI KOMEN MASUK DISINI -->
                                <div style="background-color: #f7f7f7; padding-left: 2%; padding-top: 2%; padding-right: 2%;">
                                    <div id="isikomen<?php echo $postID; ?>">
                                        <?php
                                        $sql2 = "SELECT u.id,u.nama, k.*, u.foto FROM komentar k inner join postingan p on k.postingan_idpostingan = p.idpostingan inner join user u on k.user_id = u.id WHERE k.postingan_idpostingan = $postID";
                                        $result2 = $conn->query($sql2);

                                        if ($result2->num_rows > 0) {
                                            // output data of each row
                                            while ($row2 = $result2->fetch_assoc()) {
                                                ?> 

                                                <img style="display: inline; border-radius: 50%; height: 40px;" src="images/fotoprofil/<?php echo $row2['foto'] ?>">
                                                <h3 style="display: inline;"><?php echo $row2['nama'] ?></h3>
                                                <?php if ($_SESSION["login"] == true && $row2['id'] == $user_id) { ?>
                                                    <a href="#" style="float: right;" data-toggle="modal" data-target="#modalDeleteKomen<?php echo $row2['idkomentar']; ?>"><i class="fa fa-close"></i></a>
                                                    <a href="#" style="float: right; margin-right: 2%;" data-toggle="modal" data-target="#modalEditKomen<?php echo $row2['idkomentar']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                                <?php } ?>
                                            <p style="margin-top: 1%; margin-bottom: 2%;"><?php echo nl2br($row2['isi']); ?></p>
                                            <div>    
                                <?php
                                if (!empty($row2['file'])) {
                                    $file = $row2['file'];
                                    $info = pathinfo($file);
                                    $ext = $info['extension'];
                                    if ($ext == "jpg" || $ext == "png" || $ext == "jpeg") {
                                        ?>
                                        <img src="komentar/<?php echo $row2["file"]; ?>" style="width: 96%; height: 250px; display: block; margin: auto; margin-bottom: 2%;">
                                    <?php } else { ?>
                                        <div class="fa fa-hover" style="margin: auto; display: block;">
                                            <a href="komen/<?php echo $file ?>" download> <i class="fa fa-file-o"></i>
                                                <?php echo $file ?>
                                            </a>
                                        </div> <br>
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                                                <!-- BEGIN: MODAL DELETE COMMENT -->
                                                <div class="modal fade" id="modalDeleteKomen<?php echo $row2['idkomentar'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content c-square">
                                                            <div class="modal-body">
                                                                <h3 class="c-font-24 c-font-sbold">Apakah anda yakin ingin menghapus komentar ini ?</h3>
                                                                <div class="form-group">
                                                                    <button  data-dismiss="modal" class="btn btn-danger">Batal</button>
                                                                    <form method="POST" action="postingController.php" style="display: inline-block;">
                                                                        <input type="hidden" name="act" value="delete_komentar">
                                                                        <input type="hidden" name="group_id" value="<?php echo $group_id; ?>">
                                                                        <input type="hidden" name="idkomentar" value="<?php echo $row2['idkomentar']; ?>">
                                                                        <button class="btn btn-info" > Hapus</button>
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
                                                                <h3 class="c-font-24 c-font-sbold">Ubah komentar</h3>
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
                                                                                <input type="hidden" name="group_id" value="<?php echo $group_id ?>">
                                                                                <input type="hidden" name="act" value="edit_komentar">
                                                                                <input type="hidden" name="idkomentar" value="<?php echo $row2['idkomentar']; ?>">
                                                                                <button  data-dismiss="modal" class="btn btn-danger" onclick="self.close();">Batal</button>
                                                                                <button class="btn btn-info" >Perbarui</button>
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
                                        <form method="POST" enctype="multipart/form-data" class="form-inline" action="postingController.php" id="posting_komentar<?php echo $postID ?>">
                                            <div class="row">
                                                <div class="form-group input-group-lg" style="margin-bottom: 2%; margin-top: 2%; width: 100%;">
                                                    <input type="hidden" name="idpostingan" value="<?php echo $postID ?>">
                                                    <input type="hidden" name="act" value="comment_feeds_group">
                                                    <input type="hidden" name="group_id" value="<?php echo $group_id ?>">
                                                    <div tabindex="-1" id="komen<?php echo $_SESSION['count'] ?>" style="margin-left: 2%;margin-right: 2%;">
                                                    <textarea name="comment" id="txtareakomen<?php echo $postID ?>"  class="form-control txtkomen" rows="2" style="font-size: 15px; resize: none; width: 100%;" placeholder="Tuliskan komentar anda"></textarea>
                                                   </div>
                                                   <div style="position:relative; margin-top: 1%; margin-left: 2%;">
        <a class='btn btn-primary' href='javascript:;'>
            Pilih File (Maksimal 5MB)
            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file" onchange='$("#upload-file-info<?php echo $postID ?>").html($(this).val());'>
        </a>
        &nbsp;
        <span class='label label-info' id="upload-file-info<?php echo $postID ?>"></span>
    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <script>
                        $(document).ready(function() {
    $("#posting_komentar<?php echo $postID ?>").submit(function(event){
    event.preventDefault(); //prevent default action 
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = new FormData(this); //Creates new FormData object
    

        $.ajax({
        url : post_url,
        type: request_method,
        data : form_data,
        contentType: false,
        cache: false,
        processData:false
    }).done(function(response){ //
        $("#comment").html(response);
    });
    
    
});
    $('#txtareakomen<?php echo $postID ?>').keydown(function(event) {
        var val = $("#txtareakomen<?php echo $postID ?>").val();
        if (event.which == 13 && !event.shiftKey) {
            event.preventDefault();
            
            if(val == ""){
                alert(val);
                alert("Komentar tidak boleh kosong");
                $("#txtareakomen<?php echo $postID ?>").val('');
            } else {
                $('#posting_komentar<?php echo $postID ?>').submit();
                return false; 
            }
         }
    });


});
                    </script>
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
                    <div id="postterakhir" lastID="0" groupID="" act=""><h>Tidak Ada Postingan Lagi</h></div>
                    <?php
                }
            } else {
                ?>
                <div id="postterakhir" lastID="0" groupID="" act=""><h>Tidak Ada Postingan Lagi</h></div>
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
                echo '<h2>Belum Ada Postingan</h2';
            }

            $queryloadposting = "SELECT * FROM postingan p INNER JOIN user u on p.user_id=u.id WHERE idpostingan < $lastID AND ISNULL(p.grup_id) ORDER BY idpostingan DESC LIMIT $showLimit";
//Get rows by limit except already displayed
            $hasil2 = mysqli_query($conn, $queryloadposting) or die(mysqli_error());
            if (mysqli_num_rows($hasil2) > 0) {
                while ($row = mysqli_fetch_assoc($hasil2)) {
                    $postID = $row["idpostingan"];

                    $_SESSION['count'] ++
                    ?>

                    <!-- BEGIN: MODAL EDIT STATUS -->
                    <div class="modal fade" id="modalEditStatus<?php echo $row['idpostingan'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content c-square">
                                <div class="modal-body">
                                    <h3 class="c-font-24 c-font-sbold">Ubah postingan</h3>
                                    <div class="form-group">
                                        <?php
                                        $idpostingan = $row['idpostingan'];
                                        $sql = "SELECT isi FROM postingan WHERE idpostingan = '$idpostingan'";
                                        $hasil = $conn->query($sql);
                                        if ($hasil->num_rows > 0) {
                                            while ($a = $hasil->fetch_assoc()) {
                                                ?>

                                                <form method="POST" action="postingController.php">
                                                    <textarea rows="3" name="isi" value="<?php echo $row['isi'] ?>" class="form-control c-square c-theme active" style="resize: none; width: 80%;" required><?php echo $row['isi'] ?></textarea>
                                                    <br>
                                                    <input type="hidden" name="act" value="edit_status">
                                                    <input type="hidden" name="group_id" value="NULL">
                                                    <input type="hidden" name="idpostingan" value="<?php echo $row['idpostingan']; ?>">
                                                    <button  data-dismiss="modal" class="btn btn-danger" onclick="self.close();">Batal</button>
                                                    <button class="btn btn-info" >Perbarui</button>
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
                    <!-- END: MODAL EDIT STATUS -->

                    <!-- BEGIN: MODAL DELETE STATUS -->
                    <div class="modal fade" id="modalDeleteStatus<?php echo $row['idpostingan'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content c-square">
                                <div class="modal-body">
                                    <h3 class="c-font-24 c-font-sbold">Apakah anda yakin ingin menghapus postingan ini ?</h3>
                                    <div class="form-group">
                                        <button  data-dismiss="modal" class="btn btn-danger">Batal</button>
                                        <form method="POST" action="postingController.php" style="display: inline-block;">
                                            <input type="hidden" name="act" value="delete_status">
                                            <input type="hidden" name="group_id" value="NULL">
                                            <input type="hidden" name="idpostingan" value="<?php echo $row['idpostingan']; ?>">
                                            <button class="btn btn-info" > Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: MODAL DELETE STATUS -->

                    <div class="panel panel-warning" id="status_postingan">
                        <div class="panel-heading" >
                            <img style="border-radius: 50%; height: 40px;" src="images/fotoprofil/<?php echo $row['foto'] ?>">
                            <h3 class="panel-title" style="display: inline;"><?php echo $row['nama'] ?>
                                <a class="anchorjs-link" href="#panel-title">
                                    <span class="anchorjs-icon"></span>
                                </a>
                            </h3>
                            <?php
                            if ($_SESSION["login"] == true) {
                                if ($row['id'] == $_COOKIE['user_id'] || $_COOKIE['role'] == 'admin') {
                                    ?>
                                    <a href="#" style="float: right; margin-left: 2%;" data-toggle="modal" data-target="#modalDeleteStatus<?php echo $row['idpostingan']; ?>">
                                        <i class="fa fa-close"></i></a>
                                    <a href="#" style="float: right; margin-top: 2px; margin-left: 1.5%;" data-toggle="modal" data-target="#modalEditStatus<?php echo $row['idpostingan']; ?>"><i class="glyphicon glyphicon-edit"></i></a>
                                    <?php
                                }
                                if ($row['id'] != $_COOKIE['user_id']) {
                                    $query = mysqli_query($conn, "SELECT * FROM report WHERE user_id = '$user_id' AND postingan_id = '$idpostingan'");
                                    if (mysqli_num_rows($query) > 0) {
                                        ?>
                                        <button value="<?php echo $idpostingan ?>" class="unreport btn btn-danger" style="float: right; margin-top: 0.5%; padding: 0;padding-left: 1%;"><i class="fa fa-flag"></i></button>
                                    <?php } else { ?>
                                        <button value="<?php echo $idpostingan ?>" class="report btn btn-danger" style="float: right; margin-top: 0.5%; padding: 0;padding-left: 1%;"><i class="fa fa-flag"></i></button>
                                        <?php
                                    }
                                }
                            }
                            ?>
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
                                        <?php
                                    }
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
                                            $user_id = $_COOKIE['user_id'];
                                            $query1 = mysqli_query($conn, "SELECT * FROM `like` WHERE post_id = $postID AND user_id = $user_id");
                                            if (mysqli_num_rows($query1) > 0) {
                                                ?>
                                                <button value="<?php echo $postID ?>" class="unlike btn btn-default" style="width: 100%;"> 
                                                    <i class="fa fa-thumbs-o-down"></i>Batal Suka
                                                </button>
                                            <?php } else { ?>
                                                <button value="<?php echo $postID ?>" class="like btn btn-default" style="width: 100%;"> 
                                                    <i class="fa fa-thumbs-o-up"></i>Suka
                                                </button>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="col-md-6" style="margin: 0; padding: 0;">
                                        <div class="fa-hover col-md-6 filter-icon" style="text-align: center; width: 100%;" onclick="document.getElementById('komen<?php echo $_SESSION['count'] ?>').getElementsByClassName('txtkomen')[0].focus()">
                                            <button class="btn btn-default" style="width: 100%;">         
                                                <i class="fa fa-comment-o"></i>Komentar
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
                                </span>
                                <?php 
                                $queryKomen = "SELECT * FROM komentar WHERE postingan_idpostingan = $postID";
                                $hasilQuery = $conn->query($queryKomen);
                                if($hasilQuery->num_rows > 0) {
                                ?>
                                <div id="loadkomen<?php echo $postID; ?>" style="display: inline; margin-left: 28%;" onclick="$('#isikomen<?php echo $postID; ?>').slideToggle();";>Tampilkan / Sembunyikan Komentar</div>
                            <?php } ?>
                                <hr style="margin: 0;">
                            </div>

                            <section id="comment">
                                <!-- ISI DARI KOMEN MASUK DISINI -->
                                <div style="background-color: #f7f7f7; padding-left: 2%; padding-top: 2%; padding-right: 2%;">
                                    <div id="isikomen<?php echo $postID; ?>">
                                        <?php
                                        $sql2 = "SELECT u.id,u.nama, k.*, u.foto FROM komentar k inner join postingan p on k.postingan_idpostingan = p.idpostingan inner join user u on k.user_id = u.id WHERE k.postingan_idpostingan = $postID";
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
                                            <p style="margin-top: 1%; margin-bottom: 2%;"><?php echo nl2br($row2['isi']); ?></p>
                                            <div>    
                                <?php
                                if (!empty($row2['file'])) {
                                    $file = $row2['file'];
                                    $info = pathinfo($file);
                                    $ext = $info['extension'];
                                    if ($ext == "jpg" || $ext == "png" || $ext == "jpeg") {
                                        ?>
                                        <img src="komentar/<?php echo $row2["file"]; ?>" style="width: 96%; height: 250px; display: block; margin: auto; margin-bottom: 2%;">
                                    <?php } else { ?>
                                        <div class="fa fa-hover" style="margin: auto; display: block;">
                                            <a href="komen/<?php echo $file ?>" download> <i class="fa fa-file-o"></i>
                                                <?php echo $file ?>
                                            </a>
                                        </div> <br>
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                                                <!-- BEGIN: MODAL DELETE COMMENT -->
                                                <div class="modal fade" id="modalDeleteKomen<?php echo $row2['idkomentar'] ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content c-square">
                                                            <div class="modal-body">
                                                                <h3 class="c-font-24 c-font-sbold">Apakah anda yakin ingin menghapus komentar ini ?</h3>
                                                                <div class="form-group">
                                                                    <button  data-dismiss="modal" class="btn btn-danger">Batal</button>
                                                                    <form method="POST" action="postingController.php" style="display: inline-block;">
                                                                        <input type="hidden" name="act" value="delete_komentar">
                                                                        <input type="hidden" name="group_id" value="NULL">
                                                                        <input type="hidden" name="idkomentar" value="<?php echo $row2['idkomentar']; ?>">
                                                                        <button class="btn btn-info" > Hapus</button>
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
                                                                <h3 class="c-font-24 c-font-sbold">Ubah komentar</h3>
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
                                                                                <input type="hidden" name="group_id" value="NULL">
                                                                                <input type="hidden" name="idkomentar" value="<?php echo $row2['idkomentar']; ?>">
                                                                                <button  data-dismiss="modal" class="btn btn-danger" onclick="self.close();">Batal</button>
                                                                                <button class="btn btn-info" >Perbarui</button>
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
                                        <form method="POST" enctype="multipart/form-data" class="form-inline" action="postingController.php" id="posting_komentar<?php echo $postID ?>">
                                            <div class="row">
                                                <div class="form-group input-group-lg" style="margin-bottom: 2%; margin-top: 2%; width: 100%;">
                                                    <input type="hidden" name="idpostingan" value="<?php echo $postID ?>">
                                                    <input type="hidden" name="act" value="comment_feeds">
                                                    <div tabindex="-1" id="komen<?php echo $_SESSION['count'] ?>" style="margin-left: 2%;margin-right: 2%;">
                                                    <textarea name="comment" id="txtareakomen<?php echo $postID ?>"  class="form-control txtkomen" rows="2" style="font-size: 15px; resize: none; width: 100%;" placeholder="Tuliskan komentar anda"></textarea>
                                                   </div>
                                                   <div style="position:relative; margin-top: 1%; margin-left: 2%;">
        <a class='btn btn-primary' href='javascript:;'>
            Pilih File (Maksimal 5MB)
            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file" onchange='$("#upload-file-info<?php echo $postID ?>").html($(this).val());'>
        </a>
        &nbsp;
        <span class='label label-info' id="upload-file-info<?php echo $postID ?>"></span>
    </div>
                                                </div>
                                            </div>
                                        </form>
                                       <script>
                        $(document).ready(function() {
    $("#posting_komentar<?php echo $postID ?>").submit(function(event){
    event.preventDefault(); //prevent default action 
    var post_url = $(this).attr("action"); //get form action url
    var request_method = $(this).attr("method"); //get form GET/POST method
    var form_data = new FormData(this); //Creates new FormData object
    

        $.ajax({
        url : post_url,
        type: request_method,
        data : form_data,
        contentType: false,
        cache: false,
        processData:false
    }).done(function(response){ //
        $("#comment").html(response);
    });
    
    
});
    $('#txtareakomen<?php echo $postID ?>').keydown(function(event) {
        var val = $("#txtareakomen<?php echo $postID ?>").val();
        if (event.which == 13 && !event.shiftKey) {
            event.preventDefault();
            
            if(val == ""){
                alert(val);
                alert("Komentar tidak boleh kosong");
                $("#txtareakomen<?php echo $postID ?>").val('');
            } else {
                $('#posting_komentar<?php echo $postID ?>').submit();
                return false; 
            }
         }
    });


});
                    </script>
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
                    <div id="postterakhir" lastID="0" act=""><h>Tidak Ada Postingan Lagi</h></div>
                    <?php
                }
            } else {
                ?>
                <div id="postterakhir" lastID="0" act=""><h>Tidak Ada Postingan Lagi</h></div>
                <?php
            }
            break;
    }
}
?>
