<?php
session_start();
$_SESSION['menuHeader'] = 'studentAchievement';
include_once 'layout/header.php';
include 'config/connectdb.php';
?>

<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
    <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold" style="background-color: cyan;">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-sbold">Prestasi Sekolah</h3>
                <h4 class=""> Menampilkan prestasi yang berhasil diraih murid sekolah X </h4>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li>
                    <a href="index.php">Beranda</a>
                </li>
                <li>/</li>
                <li>
                    <a href="student_achievement.php">Prestasi Sekolah</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
    <!-- BEGIN: PAGE CONTENT -->

    <?php if ($_SESSION['login'] == true) {
        if ($_COOKIE['role'] == 'admin') {
            ?>
            <div style="margin: 2%;">
                <button data-toggle="modal" data-target="#add-achievement" class="btn btn-info">Tambahkan Foto Baru</button>
                <table id="achievement" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th style="text-align: center;">Judul</th>
                            <th style="text-align: center;">Deskripsi</th>
                            <th style="text-align: center;">Gambar</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2 = "SELECT * FROM achievement";
                        $result2 = $conn->query($sql2);
                        if ($result2->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {
                                ?>
                                <tr>
                                    <th style="text-align: center;"><?php echo $row['id']; ?></th>
                                    <td style="text-align: center;"><?php echo $row['title']; ?></td>
                                    <td style="text-align: justify;"><?php echo $row['description']; ?></td>
                                    <td style="text-align: center;"><img src="images/achievements/<?php echo $row['file']; ?>" style="border-radius: 50%; height: 50px;"></td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-default" data-toggle="modal" data-target="#deleteAchievement<?php echo $row['id']; ?>">Hapus</button>
                                    </td>
                                </tr>
                                <!-- BEGIN: MODAL DELETE ACHIEVEMENT -->
                            <div class="modal fade" id="deleteAchievement<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content c-square">
                                        <div class="modal-body">
                                            <h3 class="c-font-24 c-font-sbold">Apakah anda yakin ingin menghapus foto <?php echo $row['title']; ?></h3>
                                            <div class="form-group">
                                                <button  data-dismiss="modal" class="btn btn-danger">Batal</button>
                                                <form method="POST" action="galleryController.php" style="display: inline-block;">
                                                    <input type="hidden" name="act" value="delete_achievement">
                                                    <input type="hidden" name="achievement_id" value="<?php echo $row['id']; ?>">
                                                    <button class="btn btn-info" >Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: MODAL DELETE ACHIEVEMENT -->
                            <?php
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
    <?php }
} ?>

    <div class="c-content-box c-size-md c-bg-white c-overflow-hide">
        <div class="c-content-title-1">
            <h3 class="c-center c-font-uppercase c-font-bold c-font-black">Prestasi Murid Sekolah X</h3>
            <div class="c-line-center c-theme-bg"></div>
        </div>
    </div>
    <div id="c-isotope-anchor-1" class="c-content-box c-size-md c-bg-img-center" style="background-image: url(assets/base/img/content/backgrounds/bg-84.jpg)">
        <div class="container">

            <div class="c-content-isotope-gallery c-opt-2">
                <?php
                $sql = "SELECT * FROM achievement";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="c-content-isotope-item wow animate zoomIn">
                            <div class="c-content-isotope-image-container">
                                <img class="c-content-isotope-image" src="images/achievements/<?php echo $row['file'] ?>" />
                                <div class="c-content-isotope-overlay c-ilightbox-image-2" href="images/achievements/<?php echo $row['file'] ?>" data-options="thumbnail:'images/achievements/<?php echo $row['file'] ?>'" data-caption="<h4><?php echo $row['title'] ?></h4><p><?php echo nl2br($row['description']) ?></p>">
                                    <div class="c-content-isotope-overlay-icon">
                                        <i class="fa fa-search c-font-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- END: PAGE CONTENT -->
</div>
<!-- END: PAGE CONTAINER -->

<?php
include_once 'layout/footer.php';
?>

<script>
    var table = $('#achievement').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });
</script>

<!-- MODAL ADD ACHIEVEMENT -->
<div class="modal fade c-content-login-form" id="add-achievement" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="c-font-24 c-font-sbold">Tambahkan Foto Baru</h3>
                <form action="galleryController.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="create-group" class="">Foto</label>
                        <input type="file" class="form-control input-lg c-square" name="file" required=""> 
                        <span class="help-block">Untuk hasil yang maksimal gunakan <b>800x800</b> foto</span>
                        <label for="create-group" class="">Judul</label>
                        <input type="text" class="form-control input-lg c-square" placeholder="Title" name="title" required=""><label class="">Deskripsi</label>
                        <textarea name="description" placeholder="Write the description (max 255 character)" class="form-control input-lg c-square" rows="3" style="font-size: 17px; resize: none;" maxlength="255"></textarea>
                        <input type="hidden" name="act" value="add_achievement">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;">Tambah</button><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL ADD ACHIEVEMENT -->