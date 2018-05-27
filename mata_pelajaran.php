<?php
session_start();
$_SESSION['menuHeader'] = 'mata_pelajaran';
include 'config/connectdb.php';
include_once 'layout/header.php';

if ($_SESSION["login"] == false) {
    echo '<script type="text/javascript">alert("Silahkan login terlebih dahulu"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
$info = getdate();
$date = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];
$current_date = "$date/$month/$year = $hour:$min:$sec";
$current_time = "$hour:$min";

if (isset($_GET["id"])) {
    $matpel_id = $_GET["id"];
    $_SESSION["matpel_id"] = $matpel_id;
    $user_id = $_COOKIE['user_id'];

    $sql = "SELECT * FROM relasi_user_matpel m WHERE m.matpel_id = '$matpel_id' AND m.user_id = '$user_id'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        echo '<script type="text/javascript">alert("Kamu tidak mengambil mata pelajaran ini"); </script>';
        echo '<script type="text/javascript"> window.location = "index.php" </script>';
    }
    ?>

    <div class="c-layout-page">
        <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
        <div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold" style="background-color: lightblue;">
            <div class="container">
                <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-sbold">
                        <span class="glyphicon glyphicon-book"></span> Materi
                    </h3>
                    <h4>Mata Pelajaran</h4>
                </div>
                <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>/</li>
                    <?php
                    $sql = "SELECT * FROM `matpel` WHERE id = '$matpel_id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <li class="c-state_active">Mata Pelajaran <?php echo $row['nama_pelajaran'] ?></li>
                            <?php
                        }
                    } else {
                        echo '<script type="text/javascript">alert("Jangan otak atik idnya lewat url cok"); </script>';
                        echo '<script type="text/javascript"> window.location = "index.php" </script>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->

        <div class="container">
            <div class="c-layout-sidebar-menu c-theme ">
                <!-- BEGIN: LAYOUT/SIDEBARS/SIDEBAR-MENU-1 -->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-time"></span> Clock
                        </h3>
                    </div>
                    <div class="panel-body">
                        Server : <?php echo $current_time; ?>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Logged In User
                        </h3>
                    </div>
                    <div class="panel-body">
                        <h2><?php echo $_COOKIE["username"]; ?></h2>
                        <br>
                        <a href="#" data-toggle="modal" data-target="#modalLogout">Log Out
                            <i class="glyphicon glyphicon-log-out"> </i>
                        </a>
                    </div>
                </div>

                <ul class="c-sidebar-menu" id="sidebar-menu-2">
                    <li class="c-active">
                        <a class="c-toggler">Mata Pelajaran
                            <span class="c-arrow"></span>
                        </a>
                        <?php
                        $user_id = $_COOKIE['user_id'];
                        $sql = "SELECT m.id,m.nama_pelajaran FROM relasi_user_matpel r INNER JOIN matpel m on r.matpel_id = m.id WHERE r.user_id = '$user_id'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                ?>
                            <li>
                                <a href="mata_pelajaran.php?id=<?php echo $row['id'] ?>">
                                    <i class="icon-notebook"></i> <?php echo $row['nama_pelajaran']; ?></a>
                            </li>
                        <?php
                        }
                    }
                    ?>
                </ul>

                <div class="c-padding-20 c-margin-t-40 c-bg-grey-1 c-bg-img-bottom-right" style="background-image:url(assets/base/img/content/misc/feedback_box_2.png)">
                    <div class="c-content-title-1 c-margin-t-20">
                        <h3 class="c-font-uppercase c-font-bold">Have a question?</h3>
                        <div class="c-line-left"></div>
                        <p class="c-font-thin">Ask your questions away and let our dedicated customer service help you look through our FAQs to get your questions answered!</p>
                    </div>
                </div>
                <!-- END: LAYOUT/SIDEBARS/SIDEBAR-MENU-1 -->
            </div>


            <div class="c-layout-sidebar-content">
                <div class="c-content-title-1">
                    <h3 class="c-center c-font-uppercase c-font-bold">Daftar Materi</h3>
                    <div class="c-line-center"></div>
                </div>
                <?php
                $sql = "SELECT * from week";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $week_id = $row['id'];
                        ?>

                        <div class="panel panel-info" style="width: 100%;">
                            <div class="panel-heading">
                                <h3 class="panel-title"><h3><?php echo $row['nama']; ?></h3>
                                    <a class="anchorjs-link" href="#panel-title">
                                        <span class="anchorjs-icon"></span>
                                    </a>
                                </h3>
                            </div>
            <?php if ($_COOKIE['role'] == 'guru') { ?>
                                <div class="" style="margin: 2%; margin-bottom: 0;">
                                    <form action="matpelController.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group" style="display: inline;">
                                            <label>Upload Materi :</label>
                                            <input type="file" name="file" required="" style="display: inline;">
                                            <small style="color: black;">Max 20MB</small>
                                            <input type="hidden" name="week_id" value="<?php echo $row['id']; ?>">
                                            <input type="hidden" name="act" value="upload_materi">
                                            <input type="submit" value="Upload" class="btn btn-primary">

                                            <a data-toggle="modal" data-target="#buat-tugas<?php echo $row['id']; ?>" id="buatTugas" style="float: right;"><button type="button" class="btn btn-info" value="<?php echo $row['id'] ?>">
                                                    <i class="fa fa-tasks"> Buat Tugas</i>
                                                </button></a>
                                        </div>
                                    </form>

                                </div>
                                <!-- MODAL BUAT TUGAS -->
                                <div class="modal fade c-content-login-form" id="buat-tugas<?php echo $row['id']; ?>" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content c-square">
                                            <div class="modal-header c-no-border">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h3 class="c-font-24 c-font-sbold">Buat Tugas Baru <?php echo $row['id']; ?></h3>
                                                <form action="matpelController.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="buat-tugas" class="">Nama Tugas</label>
                                                        <input type="text" class="form-control input-lg c-square" placeholder="Nama Tugas" name="nama_tugas" required=""> 
                                                        <input type="hidden" name="week_id" value="<?php echo $row['id']; ?>">
                                                        <input type="hidden" name="act" value="buat_tugas">
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;" name="buat-tugas">Create</button><br><br>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END MODAL BUAT TUGAS -->
                                <?php } ?>
                            <div class="panel-body"> 
                                <?php
                                $sql2 = "SELECT * FROM tugas t WHERE t.matpel_id='$matpel_id' AND t.week_id='$week_id'";
                                $result2 = $conn->query($sql2);
                                if ($result2->num_rows > 0) {
                                    // output data of each row
                                    while ($row2 = $result2->fetch_assoc()) {
                                        ?>
                                        <div class="panel panel-danger">
                                            <div class="panel-heading">
                                                <form action="matpelController.php" method="POST">
                                                    <a href="tugas.php?id=<?php echo $row2['id']; ?>"><h3 class="panel-title"><h3><?php echo $row2['namatugas']; ?>
                                                                <input type="hidden" name="act" value="delete_tugas">
                                                                <input type="hidden" name="matpel_id" value="$matpel_id">
                                                                <input type="hidden" name="tugas_id" value="<?php echo $row2['id']; ?>">
                                                                <?php if ($_COOKIE['role'] == 'guru') { ?>
                                                                    <button class="btn btn-default" style="float: right;">Delete</button>
                    <?php } ?>
                                                            </h3></a>
                                                </form>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                }
                                ?>

                                <?php
                                $sql3 = "SELECT * FROM materi m WHERE m.matpel_id='$matpel_id' AND m.week_id='$week_id'";
                                $result3 = $conn->query($sql3);
                                if ($result3->num_rows > 0) {
                                    while ($row3 = $result3->fetch_assoc()) {
                                        ?>
                                        <form action="matpelController.php" method="POST">
                                            <a href="materi/<?php echo $row3['file']; ?>" download> 
                                                <i class="fa fa-file-o"></i><?php echo $row3['file']; ?>
                                            </a>  <?php if ($_COOKIE['role'] == 'guru') { ?>
                                                <input type="hidden" name="act" value="delete_materi">
                                                <input type="hidden" name="materi_id" value="<?php echo $row3['id'] ?>">
                                                <button class="btn btn-default">Delete</button>
                                            </form>
                                        <?php } ?><br>

                                    <?php
                                    }
                                }
                                ?> 	
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php
} else {
    echo '<script type="text/javascript">alert("Mau ngapain hayo?"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
?>

<?php
include_once './layout/footer.php';
?>
