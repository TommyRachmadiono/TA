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
    <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-sbold">Isotope Gallery</h3>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>/</li>
                <li>
                    <a href="javascript:;">Gallery</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
    <!-- BEGIN: PAGE CONTENT -->
    <!-- BEGIN: CONTENT/ISOTOPE/GALLERY-2 -->

    <?php if($_COOKIE['role']=='admin') { ?>
    <div style="margin: 2%;">
        <button data-toggle="modal" data-target="#add-photo" class="btn btn-info">Add New Photo</button>
        <table id="gallery" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Nama File</th>
                    <th style="text-align: center;">Gambar</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                ?>
                <tr>
                    <th style="text-align: center;">a</th>
                    <td style="text-align: center;">b</td>
                    <td style="text-align: center;">c</td>
                    <td style="text-align: center;">
                        <form action="#" method="POST">
                            <input type="hidden" value="invite_member" name="act">
                            <input type="hidden" value="<?php echo $row['id'] ?>" name="member_id">
                            <input type="hidden" value="<?php echo $group_id; ?>" name="group_id">
                            <button class="btn btn-default">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php 

                ?>
            </tbody>
        </table>
    </div>
    <?php } ?>

    <div class="c-content-title-1" id="content_title">
        <h3 class="c-center c-font-uppercase c-font-bold">Gallery</h3>
        <div class="c-line-center c-theme-bg"></div>
    </div>
    
    <!-- BEGIN: PAGE CONTENT -->
    <div class="c-content-box c-size-md c-bg-white c-overflow-hide">
        <div id="filters-container" class="cbp-l-filters-alignCenter">
            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> ALL
                <div class="cbp-filter-counter"></div>
            </div>
        </div>
        <div id="grid-container" class="cbp">
            <?php 
            $sql = "SELECT * FROM gallery g INNER JOIN user u on g.user_id = u.id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { ?>

                <div class="cbp-item logos">
                    <a href="images/gallery/<?php echo $row['file']; ?>" class="cbp-caption cbp-lightbox" data-title="<?php echo $row['title']; ?>">
                        <div class="cbp-caption-defaultWrap">
                            <img src="images/gallery/<?php echo $row['file']; ?>" alt=""> </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignLeft">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title"><?php echo $row['title']; ?></div>
                                        <div class="cbp-l-caption-desc">by <?php echo $row['nama']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } 
                } ?>
                <div class="cbp-item graphic logos">
                    <a href="assets/base/img/content/stock/20.jpg" class="cbp-caption cbp-lightbox" data-title="Starindeed Website<br>by Tiberiu Neamu">
                        <div class="cbp-caption-defaultWrap">
                            <img src="assets/base/img/content/stock/20.jpg" alt=""> </div>
                            <div class="cbp-caption-activeWrap">
                                <div class="cbp-l-caption-alignLeft">
                                    <div class="cbp-l-caption-body">
                                        <div class="cbp-l-caption-title">Starindeed Website</div>
                                        <div class="cbp-l-caption-desc">by Tiberiu Neamu</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END: PAGE CONTENT -->
            <!-- END: CONTENT/ISOTOPE/GALLERY-2 -->
            <!-- END: PAGE CONTENT -->
        </div>
        <!-- END: PAGE CONTAINER -->



        <?php
        include_once 'layout/footer.php';
        ?>
        <script>
            var table = $('#gallery').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
            } );
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
                        <form action="galleryController" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="create-group" class="">Your Photo</label>
                                <input type="file" class="form-control input-lg c-square" name="" required=""> 

                                <label for="create-group" class="">Title</label>
                                <input type="text" class="form-control input-lg c-square" id="topic_discussion" placeholder="Title" name="" required=""> 
                                <input type="hidden" name="act" value="add_photo">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;" name="create-group" id="create-group">Add</button><br><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!-- END MODAL ADD PHOTO -->