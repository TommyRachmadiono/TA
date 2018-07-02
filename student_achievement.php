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

    <?php if($_SESSION['login'] == true){
        if ($_COOKIE['role'] == 'admin') { ?>
        <div style="margin: 2%;">
            <button data-toggle="modal" data-target="#add-achievement" class="btn btn-info">Add New Photo</button>
            <table id="achievement" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">ID</th>
                        <th style="text-align: center;">Title</th>
                        <th style="text-align: center;">Description</th>
                        <th style="text-align: center;">Gambar</th>
                        <th style="text-align: center;">Action</th>
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
                                    <button class="btn btn-default" data-toggle="modal" data-target="#deleteAchievement<?php echo $row['id']; ?>">Delete</button>
                                </td>
                            </tr>
                            <!-- BEGIN: MODAL DELETE ACHIEVEMENT -->
                            <div class="modal fade" id="deleteAchievement<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content c-square">
                                        <div class="modal-body">
                                            <h3 class="c-font-24 c-font-sbold">Are you sure want to delete Photo <?php echo $row['title']; ?></h3>
                                            <div class="form-group">
                                                <button  data-dismiss="modal" class="btn btn-danger">Cancel</button>
                                                <form method="POST" action="galleryController.php" style="display: inline-block;">
                                                    <input type="hidden" name="act" value="delete_achievement">
                                                    <input type="hidden" name="achievement_id" value="<?php echo $row['id']; ?>">
                                                    <button class="btn btn-info" >Delete</button>
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
        <?php }} ?>

        <div id="c-isotope-anchor-1" class="c-content-box c-size-md c-bg-img-center" style="background-image: url(assets/base/img/content/backgrounds/bg-84.jpg)">
            <div class="container">
                <div class="c-content-title-1">
                    <h3 class="c-center c-font-uppercase c-font-bold c-font-white">Our Shcool Achievements</h3>
                    <div class="c-line-center c-theme-bg"></div>
                </div>
                <div class="c-content-isotope-gallery c-opt-2">
                    <?php
                    $sql = "SELECT * FROM achievement";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="c-content-isotope-item wow animate fadeInUp" data-wow-delay="0">
                                <div class="c-content-isotope-image-container">
                                    <img class="c-content-isotope-image" src="images/achievements/<?php echo $row['file'] ?>" />
                                    <div class="c-content-isotope-overlay c-ilightbox-image-2" href="images/achievements/<?php echo $row['file'] ?>" data-options="thumbnail:'images/achievements/<?php echo $row['file'] ?>'" data-caption="<h4><?php echo $row['title'] ?></h4><p><?php echo $row['description'] ?></p>">
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
                    <h3 class="c-font-24 c-font-sbold">Add New Photo</h3>
                    <form action="galleryController.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="create-group" class="">Your Photo</label>
                            <input type="file" class="form-control input-lg c-square" name="file" required=""> 
                            <span class="help-block">For better experience use <b>800x800</b> photo</span>
                            <label for="create-group" class="">Title</label>
                            <input type="text" class="form-control input-lg c-square" placeholder="Title" name="title" required=""><label class="">Description</label>
                            <textarea name="description" placeholder="Write the description (max 255 character)" class="form-control input-lg c-square" rows="3" style="font-size: 17px; resize: none;" maxlength="255"></textarea>
                            <input type="hidden" name="act" value="add_achievement">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;">Add</button><br><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- END MODAL ADD ACHIEVEMENT -->