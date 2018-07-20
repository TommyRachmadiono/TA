<?php
session_start();

$_SESSION['menuHeader'] = 'gallery';
include_once 'layout/header.php';
include 'config/connectdb.php';

if ($_SESSION["login"] == false) {
    echo '<script type="text/javascript">alert("Silahkan login terlebih dahulu"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
?>
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
    <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold" style="background-color: cyan;">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-sbold">Galeri Foto Sekolah</h3>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li>
                    <a href="index.php">Beranda</a>
                </li>
                <li>/</li>
                <li>
                    <a href="javascript:;">Galeri</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
    <!-- BEGIN: PAGE CONTENT -->
    <!-- BEGIN: CONTENT/ISOTOPE/GALLERY-2 -->

    <?php if ($_COOKIE['role'] == 'admin') { ?>
        <div style="margin: 2%;">
            <button data-toggle="modal" data-target="#add-photo" class="btn btn-info">Tambahkan Foto Baru</button>
            <table id="gallery" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">Judul</th>
                        <th style="text-align: center;">Gambar</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql2 = "SELECT * FROM gallery";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {
                            ?>
                            <tr>
                                <th style="text-align: center;"><?php echo $row['id']; ?></th>
                                <td style="text-align: center;"><?php echo $row['title']; ?></td>
                                <td style="text-align: center;"><img src="images/gallery/<?php echo $row['file']; ?>" style="border-radius: 50%; height: 50px;"></td>
                                <td style="text-align: center;">
                                    <button class="btn btn-default" data-toggle="modal" data-target="#deleteGallery<?php echo $row['id']; ?>">Hapus</button>
                                </td>
                            </tr>
                            <!-- BEGIN: MODAL DELETE GALLERY -->
                        <div class="modal fade" id="deleteGallery<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content c-square">
                                    <div class="modal-body">
                                        <h3 class="c-font-24 c-font-sbold">Apakah anda yakin ingin menghapus foto <?php echo $row['title']; ?></h3>
                                        <div class="form-group">
                                            <button  data-dismiss="modal" class="btn btn-danger">Batal</button>
                                            <form method="POST" action="galleryController.php" style="display: inline-block;">
                                                <input type="hidden" name="act" value="delete_gallery">
                                                <input type="hidden" name="gallery_id" value="<?php echo $row['id']; ?>">
                                                <button class="btn btn-info" >Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: MODAL DELETE GALLERY -->
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    <?php } ?>

    <div class="c-content-title-1" id="content_title" style="margin-top: 3%;">
        <h3 class="c-center c-font-uppercase c-font-bold">Galeri Foto</h3>
        <div class="c-line-center c-theme-bg"></div>
    </div>

    <!-- BEGIN: PAGE CONTENT -->
    <div class="container">
        <div class="c-content-box c-size-md c-bg-white c-overflow-hide">
            <div id="filters-container" class="cbp-l-filters-alignCenter">
                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> SEMUA
                    <div class="cbp-filter-counter"></div>
                </div> 
            </div>
            <div id="grid-container" class="cbp">

                <?php
                $sql = "SELECT * FROM gallery g INNER JOIN user u on g.user_id = u.id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>

                        <div class="cbp-item identity logos">
                            <a href="images/gallery/<?php echo $row['file'] ?>" class="cbp-caption cbp-lightbox" data-title="<?php echo $row['title'] ?><br>by Paul Flavius Nechita">
                                <div class="cbp-caption-defaultWrap">
                                    <img src="images/gallery/<?php echo $row['file'] ?>" alt=""> </div>
                                <div class="cbp-caption-activeWrap">
                                    <div class="cbp-l-caption-alignLeft">
                                        <div class="cbp-l-caption-body">
                                            <div class="cbp-l-caption-title"><?php echo $row['title']; ?></div>
                                            <div class="cbp-l-caption-desc">by Admin</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div id="loadMore-container" class="cbp-l-loadMore-text">
                <a href="ajax/fullwidth-gallery/load-more.html?test=1" class="cbp-l-loadMore-link btn c-btn-square c-btn-border-2x c-btn-dark c-btn-bold c-btn-uppercase">
                    <span class="cbp-l-loadMore-defaultText">TAMPILKAN LEBIH BANYAK</span>
                    <span class="cbp-l-loadMore-loadingText">LOADING...</span>
                    <span class="cbp-l-loadMore-noMoreLoading">TIDAK ADA FOTO LAGI</span>
                </a>
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
    var table = $('#gallery').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });
</script>

<!-- MODAL ADD PHOTO -->
<div class="modal fade c-content-login-form" id="add-photo" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="c-font-24 c-font-sbold">Add New Photo</h3>
                <form action="galleryController.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="create-group" class="">Your Photo</label>
                        <input type="file" class="form-control input-lg c-square" name="file" required=""> 
                        <span class="help-block">For better experience use <b>600x600</b> photo</span>
                        <label for="create-group" class="">Title</label>
                        <input type="text" class="form-control input-lg c-square" placeholder="Title" name="title" required=""> 
                        <input type="hidden" name="act" value="add_gallery">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;">Add</button><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL ADD PHOTO -->
