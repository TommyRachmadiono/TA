<?php
session_start();

$_SESSION['menuHeader'] = 'gallery';
include_once 'layout/header.php';

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
                    <a href="#">Components</a>
                </li>
                <li>/</li>
                <li>
                    <a href="javascript:;">Jango Components</a>
                </li>
                <li>/</li>
                <li class="c-state_active">Isotope Gallery</li>
            </ul>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
    <!-- BEGIN: PAGE CONTENT -->
    <!-- BEGIN: CONTENT/ISOTOPE/GALLERY-2 -->

    <?php if($_COOKIE['role']=='admin') { ?>
    <div style="margin: 2%;">
        <button class="btn btn-info">Add New Photo</button>
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
    <div class="c-content-box c-size-md c-bg-white">
        <div class="c-content-title-1" id="content_title">
            <h3 class="c-center c-font-uppercase c-font-bold">Gallery</h3>
            <div class="c-line-center c-theme-bg"></div>
        </div>
    </div>
    <div id="c-isotope-anchor-1" class="c-content-box c-size-md c-bg-img-center" style="background-image: url(assets/base/img/content/backgrounds/bg-84.jpg)">
        <div class="container">
            <div class="c-content-isotope-gallery c-opt-2">
                <div class="c-content-isotope-item wow animate fadeInUp" data-wow-delay="0">
                    <div class="c-content-isotope-image-container">
                        <img class="c-content-isotope-image" src="assets/base/img/content/stock5/85.jpg" />
                        <div class="c-content-isotope-overlay c-ilightbox-image-2" href="assets/base/img/content/stock5/85.jpg" data-options="thumbnail:'assets/base/img/content/stock5/85.jpg'" data-caption="<h4>The Architect</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dictum nibh pharetra ligula rhoncus, nec iaculis nulla semper.</p>">
                            <div class="c-content-isotope-overlay-icon">
                                <i class="fa fa-search c-font-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-content-isotope-item wow animate fadeInUp" data-wow-delay="0.2s">
                    <div class="c-content-isotope-image-container">
                        <img class="c-content-isotope-image" src="assets/base/img/content/stock5/79.jpg" />
                        <div class="c-content-isotope-overlay c-ilightbox-image-2" href="assets/base/img/content/stock5/79.jpg" data-options="thumbnail:'assets/base/img/content/stock5/79.jpg'" data-caption="<h4>The Tower</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dictum nibh pharetra ligula rhoncus, nec iaculis nulla semper.</p>">
                            <div class="c-content-isotope-overlay-icon">
                                <i class="fa fa-search c-font-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-content-isotope-item wow animate fadeInUp" data-wow-delay="0.4s">
                    <div class="c-content-isotope-image-container">
                        <img class="c-content-isotope-image" src="assets/base/img/content/stock5/70.jpg" />
                        <div class="c-content-isotope-overlay c-ilightbox-image-2" href="assets/base/img/content/stock5/70.jpg" data-options="thumbnail:'assets/base/img/content/stock5/70.jpg'" data-caption="<h4>The Map</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dictum nibh pharetra ligula rhoncus, nec iaculis nulla semper.</p>">
                            <div class="c-content-isotope-overlay-icon">
                                <i class="fa fa-search c-font-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-content-isotope-item wow animate fadeInUp" data-wow-delay="0.6s">
                    <div class="c-content-isotope-image-container">
                        <img class="c-content-isotope-image" src="assets/base/img/content/stock5/89.jpg" />
                        <div class="c-content-isotope-overlay c-ilightbox-image-2" href="assets/base/img/content/stock5/89.jpg" data-options="thumbnail:'assets/base/img/content/stock5/89.jpg'" data-caption="<h4>The Run</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dictum nibh pharetra ligula rhoncus, nec iaculis nulla semper.</p>">
                            <div class="c-content-isotope-overlay-icon">
                                <i class="fa fa-search c-font-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-content-isotope-item wow animate fadeInUp" data-wow-delay="0.8s">
                    <div class="c-content-isotope-image-container">
                        <img class="c-content-isotope-image" src="assets/base/img/content/stock5/90.jpg" />
                        <div class="c-content-isotope-overlay c-ilightbox-image-2" href="assets/base/img/content/stock5/90.jpg" data-options="thumbnail:'assets/base/img/content/stock5/90.jpg'" data-caption="<h4>Workload</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dictum nibh pharetra ligula rhoncus, nec iaculis nulla semper.</p>">
                            <div class="c-content-isotope-overlay-icon">
                                <i class="fa fa-search c-font-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-content-isotope-item wow animate fadeInUp" data-wow-delay="0">
                    <div class="c-content-isotope-image-container">
                        <img class="c-content-isotope-image" src="assets/base/img/content/stock5/88.jpg" />
                        <div class="c-content-isotope-overlay c-ilightbox-image-2" href="assets/base/img/content/stock5/88.jpg" data-options="thumbnail:'assets/base/img/content/stock5/88.jpg'" data-caption="<h4>The Balloon</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dictum nibh pharetra ligula rhoncus, nec iaculis nulla semper.</p>">
                            <div class="c-content-isotope-overlay-icon">
                                <i class="fa fa-search c-font-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-content-isotope-item wow animate fadeInUp" data-wow-delay="0.2s">
                    <div class="c-content-isotope-image-container">
                        <img class="c-content-isotope-image" src="assets/base/img/content/stock5/94.jpg" />
                        <div class="c-content-isotope-overlay c-ilightbox-image-2" href="assets/base/img/content/stock5/94.jpg" data-options="thumbnail:'assets/base/img/content/stock5/94.jpg'" data-caption="<h4>The Thinking Man</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dictum nibh pharetra ligula rhoncus, nec iaculis nulla semper.</p>">
                            <div class="c-content-isotope-overlay-icon">
                                <i class="fa fa-search c-font-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-content-isotope-item wow animate fadeInUp" data-wow-delay="0.4s">
                    <div class="c-content-isotope-image-container">
                        <img class="c-content-isotope-image" src="assets/base/img/content/stock5/65.jpg" />
                        <div class="c-content-isotope-overlay c-ilightbox-image-2" href="assets/base/img/content/stock5/65.jpg" data-options="thumbnail:'assets/base/img/content/stock5/65.jpg'" data-caption="<h4>The Route</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dictum nibh pharetra ligula rhoncus, nec iaculis nulla semper.</p>">
                            <div class="c-content-isotope-overlay-icon">
                                <i class="fa fa-search c-font-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-content-isotope-item wow animate fadeInUp" data-wow-delay="0.6s">
                    <div class="c-content-isotope-image-container">
                        <img class="c-content-isotope-image" src="assets/base/img/content/stock5/5.jpg" />
                        <div class="c-content-isotope-overlay c-ilightbox-image-2" href="assets/base/img/content/stock5/5.jpg" data-options="thumbnail:'assets/base/img/content/stock5/5.jpg'" data-caption="<h4>The Record</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dictum nibh pharetra ligula rhoncus, nec iaculis nulla semper.</p>">
                            <div class="c-content-isotope-overlay-icon">
                                <i class="fa fa-search c-font-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-content-isotope-item wow animate fadeInUp" data-wow-delay="0.8s">
                    <div class="c-content-isotope-image-container">
                        <img class="c-content-isotope-image" src="assets/base/img/content/stock5/68.jpg" />
                        <div class="c-content-isotope-overlay c-ilightbox-image-2" href="assets/base/img/content/stock5/68.jpg" data-options="thumbnail:'assets/base/img/content/stock5/68.jpg'" data-caption="<h4>The Music</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dictum nibh pharetra ligula rhoncus, nec iaculis nulla semper.</p>">
                            <div class="c-content-isotope-overlay-icon">
                                <i class="fa fa-search c-font-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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