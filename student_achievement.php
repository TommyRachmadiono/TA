<?php 
session_start();

$_SESSION['menuHeader'] = 'studentAchievement';
include_once 'layout/header.php';
include 'config/connectdb.php';
?>

<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
    <div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url(assets/base/img/content/backgrounds/bg-96.jpg)">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-bold c-font-dark c-font-20 c-font-slim">Student Achievements</h3>
                <h4 class="c-font-dark c-font-slim"> See the achievements of our students </h4>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li>
                    <a href="index.php" class="c-font-dark">Home</a>
                </li>
                <li class="c-font-dark">/</li>
                <li>
                    <a href="student_achievement.php" class="c-font-dark">Student Achievements</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
    <!-- BEGIN: PAGE CONTENT -->
    <div id="c-isotope-anchor-1" class="c-content-box c-size-md c-bg-img-center" style="background-image: url(assets/base/img/content/backgrounds/bg-84.jpg)">
        <div class="container">
            <div class="c-content-isotope-gallery c-opt-2">

                <div class="c-content-isotope-item wow animate fadeInUp" data-wow-delay="0">
                    <div class="c-content-isotope-image-container">
                        <img class="c-content-isotope-image" src="assets/base/img/content/stock5/85.jpg" />
                        <div class="c-content-isotope-overlay c-ilightbox-image-2" href="assets/base/img/content/stock5/85.jpg"  data-caption="<h4>The Architect</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dictum nibh pharetra ligula rhoncus, nec iaculis nulla semper.</p>">
                            <div class="c-content-isotope-overlay-icon">
                                <i class="fa fa-search c-font-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="c-content-isotope-item wow animate fadeInUp" data-wow-delay="0">
                    <div class="c-content-isotope-image-container">
                        <img class="c-content-isotope-image" src="assets/base/img/content/stock5/87.jpg" />
                        <div class="c-content-isotope-overlay c-ilightbox-image-2" href="assets/base/img/content/stock5/87.jpg"  data-caption="<h4>The Architect</h4><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dictum nibh pharetra ligula rhoncus, nec iaculis nulla semper.</p>">
                            <div class="c-content-isotope-overlay-icon">
                                <i class="fa fa-search c-font-white"></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: PAGE CONTENT -->
</div>
<!-- END: PAGE CONTAINER -->

<?php
include_once 'layout/footer.php'; 
?>