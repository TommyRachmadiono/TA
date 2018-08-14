<?php
session_start();
$_SESSION['menuHeader'] = 'home';
include 'config/connectdb.php';
include_once 'layout/header.php';

if ($_SESSION["login"] == false) {
    echo '<script type="text/javascript">alert("Silahkan login terlebih dahulu"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
$user_id = $_COOKIE['user_id'];
?>
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
    <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-sbold">Kotak Masuk</h3>
                <h4 class="">Baca dan kirim pesan dengan teman anda</h4>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li>
                    <a href="index.php">Beranda</a>
                </li>
                <li>/</li>
                <li>
                    <a href="inbox.php">Kotak Masuk</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
    <!-- BEGIN: PAGE CONTENT -->
    <div style="margin-left: 2%; margin-top: 2%;">
        <button class="btn btn-info" data-toggle="modal" data-target="#conversation">Mulai Percakapan</button>
    </div>

    <div class="panel panel-info" style="margin: 2%;">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?php
                $sql2 = "SELECT SUM(n_number) as notifikasi FROM notification WHERE id_penerima = '$user_id'";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        if ($row2['notifikasi'] != NULL) {
                            ?>
                            Pesan (<?php echo $row2['notifikasi']; ?> Pesan Baru)
                        <?php } else { ?>
                            Pesan (0 Pesan Baru)
                        <?php }
                    }
                }
                ?>  
                <a class="anchorjs-link" href="#panel-title">
                    <span class="anchorjs-icon"></span>
                </a>
            </h3>
        </div>
        <div class="panel-body"> 
            <?php
            $sql = "SELECT c.*, u.foto as foto_pengirim, us.foto as foto_penerima, us.nama as nama_penerima, u.nama as nama_pengirim FROM conversation c INNER JOIN user u on u.id = c.id_pengirim INNER JOIN user us on us.id = c.id_penerima where c.id_pengirim = '$user_id' or c.id_penerima = '$user_id' ORDER BY time DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id_pengirim = $row['id_pengirim'];
                    $id_penerima = $row['id_penerima'];
                    $c_id = $row['c_id'];
                    if ($user_id == $row['id_pengirim']) {

                        $query = "SELECT c.*, cr.* FROM conversation c INNER JOIN conversation_reply cr ON cr.fk_c_id = c.c_id where c.id_pengirim = '$user_id' AND c.id_penerima = '$id_penerima' ORDER BY cr.time DESC limit 1";
                        $hasil = $conn->query($query);
                        if ($hasil->num_rows > 0) {
                            while ($i = $hasil->fetch_assoc()) {
                                ?>
                                <!-- BEGIN: MODAL DELETE CONVERSATION -->
                                <div class="modal fade" id="modalDeleteConversation<?php echo $row['c_id'] ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content c-square">
                                            <div class="modal-body">
                                                <h3 class="c-font-24 c-font-sbold">Apakah anda yakin ingin menghapus percakapn ini ?</h3>
                                                <div class="form-group">
                                                    <button  data-dismiss="modal" class="btn btn-danger">Batal</button>
                                                    <form method="POST" action="messagesController.php" style="display: inline-block;">
                                                        <input type="hidden" name="act" value="delete_conversation">
                                                        <input type="hidden" name="idconversation" value="<?php echo $row['c_id']; ?>">
                                                        <button class="btn btn-info" > Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: MODAL DELETE CONVERSATION -->

                                <div class="panel panel-warning">
                                    <a href="messages.php?conversation_id=<?php echo $row['c_id']; ?>">
                                        <div class="panel-heading">
                                            <img style="display: inline; border-radius: 50%; height: 40px;" src="images/fotoprofil/<?php echo $row['foto_penerima'] ?>">
                                            <h3 class="panel-title" style="display: inline;"><?php echo $row['nama_penerima'] ?>
                                                <span class="anchorjs-icon"></span>
                                                <?php
                                                $sql4 = "SELECT n_number as notifikasi FROM notification WHERE id_penerima = '$user_id' AND c_id = '$c_id'";
                                                $result3 = $conn->query($sql4);
                                                if ($result3->num_rows > 0) {
                                                    while ($row3 = $result3->fetch_assoc()) {
                                                        ?>
                                                        <span class="badge"><?php echo $row3['notifikasi'] ?> Pesan baru</span>
                        <?php }
                    } else { ?>
                                                    <span class="badge">0 Pesan Baru</span>
                    <?php } ?>
                                            </h3> 
                                        </div>
                                    </a>
                                    <div class="panel-body" style="padding-top: 0;"> 
                                        <h2><?php echo $i['reply']; ?></h2>
                                        <h3 class="panel-title" style="display: inline;"><span class="glyphicon glyphicon-time"></span> <?php echo $row['time']; ?>
                                        </h3> 
                                        <button class="btn btn-info" style="display: inline;" data-toggle="modal" data-target="#modalDeleteConversation<?php echo $row['c_id']; ?>">Hapus Percakapan</button>
                                    </div>
                                </div>

                            <?php
                            }
                        }
                    } else {
                        $query = "SELECT c.*, cr.* FROM conversation c INNER JOIN conversation_reply cr ON cr.fk_c_id = c.c_id where c.id_pengirim = '$id_pengirim' AND c.id_penerima = '$user_id' ORDER BY cr.time DESC limit 1";
                        $hasil = $conn->query($query);
                        if ($hasil->num_rows > 0) {
                            while ($i = $hasil->fetch_assoc()) {
                                ?>

                                <!-- BEGIN: MODAL DELETE CONVERSATION -->
                                <div class="modal fade" id="modalDeleteConversation<?php echo $row['c_id'] ?>" tabindex="-1" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content c-square">
                                            <div class="modal-body">
                                                <h3 class="c-font-24 c-font-sbold">Apakah anda yakin ingin menghapus percakapan ini ?</h3>
                                                <div class="form-group">
                                                    <button  data-dismiss="modal" class="btn btn-danger">Batal</button>
                                                    <form method="POST" action="messagesController.php" style="display: inline-block;">
                                                        <input type="hidden" name="act" value="delete_conversation">
                                                        <input type="hidden" name="idconversation" value="<?php echo $row['c_id']; ?>">
                                                        <button class="btn btn-info" > Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: MODAL DELETE CONVERSATION -->

                                <div class="panel panel-warning">
                                    <a href="messages.php?conversation_id=<?php echo $row['c_id']; ?>">	
                                        <div class="panel-heading">
                                            <img style="display: inline; border-radius: 50%; height: 40px;" src="images/fotoprofil/<?php echo $row['foto_pengirim'] ?>">
                                            <h3 class="panel-title" style="display: inline;"><?php echo $row['nama_pengirim'] ?>
                                                <span class="anchorjs-icon"></span>
                                                <?php
                                                $sql5 = "SELECT n_number as notifikasi FROM notification WHERE id_penerima = '$user_id' AND c_id = '$c_id'";
                                                $result4 = $conn->query($sql5);
                                                if ($result4->num_rows > 0) {
                                                    while ($row4 = $result4->fetch_assoc()) {
                                                        ?>
                                                        <span class="badge"><?php echo $row4['notifikasi']; ?> Pesan baru</span>
                        <?php }
                    } else { ?>
                                                    <span class="badge">0 Pesan baru</span>
                    <?php } ?>
                                            </h3>
                                        </div>
                                    </a>
                                    <div class="panel-body" style="padding-top: 0"> 
                                        <h2><?php echo $i['reply']; ?></h2> 
                                        <h3 class="panel-title" style="display: inline;"><span class="glyphicon glyphicon-time"></span> <?php echo $row['time']; ?>
                                        </h3> 
                                        <button class="btn btn-info" style="display: inline;" data-toggle="modal" data-target="#modalDeleteConversation<?php echo $row['c_id']; ?>">Hapus Percakapan</button>
                                    </div>
                                </div>

                <?php }
            }
        }
    }
} else { ?>
                Anda tidak mempunyai percakapan dengan siapapun. Mulailah mengirim pesan dan percakapan anda akan muncul disini.
<?php } ?>
        </div>
    </div>
    <!-- END: PAGE CONTENT -->
</div>
<!-- END: PAGE CONTAINER -->

<?php
include_once 'layout/footer.php';
?>

<div id="conversation" class="modal fade in" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Mulai percakapan baru</h4>
            </div>
            <form action="messagesController.php" method="POST" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputPassword3" class="col-md-4 control-label">Dengan</label>
                        <div class="col-md-6">
                            <select name="penerima" class="form-control  c-square c-theme" required="">
                                <option value="" selected="">-- Pilih User --</option>
<?php
$user_id = $_SESSION['user_id'];
$sql3 = "SELECT * FROM user where id != '$user_id'";
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {
    while ($row3 = $result3->fetch_assoc()) {
        ?>
                                        <option value="<?php echo $row3['id'] ?>"><?php echo $row3['nama']; ?></option>
    <?php }
} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Katakan Sesuatu</label>
                        <div class="col-md-6">
                            <input type="text" name="reply" style="border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; width: 100%; padding-left: 2%;" placeholder=" Katakan sesuatu" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="act" value="add_conversation">
                    <button type="submit" class="btn c-theme-btn c-btn-square c-btn-bold c-btn-uppercase">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>