<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Tugas Akhir</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
    <link href="assets/plugins/socicon/socicon.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-social/bootstrap-social.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/animate/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN: BASE PLUGINS  -->
    <link href="assets/plugins/revo-slider/css/settings.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/revo-slider/css/layers.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/revo-slider/css/navigation.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/owl-carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/slider-for-bootstrap/css/slider.css" rel="stylesheet" type="text/css" />
    <!-- END: BASE PLUGINS -->
    <!-- BEGIN: PAGE STYLES -->
    <link href="assets/plugins/ilightbox/css/ilightbox.css" rel="stylesheet" type="text/css" />
    <!-- END: PAGE STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="assets/base/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/base/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
    <link href="assets/base/css/themes/default.css" rel="stylesheet" id="style_theme" type="text/css" />
    <link href="assets/base/css/custom.css" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="assets/DataTables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/DataTables/css/buttons.bootstrap.min.css">

    
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->
    <script src="assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/calendar.css">

    <!-- SELECT2 -->
    <link rel="stylesheet" type="text/css" href="assets/select2/css/select2.css">
    <link rel="stylesheet" type="text/css" href="assets/select2/css/select2.min.css">
</head>

<?php
date_default_timezone_set("Asia/Jakarta");

if (isset($_COOKIE["login"])) {
    $_SESSION["login"] = $_COOKIE["login"];
} else {
    $_SESSION["login"] = false;
}

if($_SESSION['login'] == true){
    include 'config/connectdb.php';
    $user_id = $_COOKIE['user_id'];
} else {
        //do nothing
}

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$menuHome = '';
$menuGallery = '';
$menuCalendar = '';
$menuStudentAchievement = '';

if (isset($_SESSION['menuHeader'])) {
    $akses = $_SESSION['menuHeader'];

    if ($akses == 'home') {
        $menuHome = 'class="c-active"';
    } else if ($akses == 'gallery') {
        $menuGallery = 'class="c-active"';
    } else if ($akses == 'eventCalendar') {
        $menuCalendar = 'class="c-active"';
    } else if($akses = 'studentAchievement') {
        $menuStudentAchievement = 'class="c-active"';
    }
}

?>

<body class="c-layout-header-fixed c-layout-header-mobile-fixed">
    <!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
    <!-- BEGIN: HEADER -->
    <header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
        <div class="c-navbar">
            <div class="container">
                <!-- BEGIN: BRAND -->
                <div class="c-navbar-wrapper clearfix">
                    <div class="c-brand c-pull-left">
                        <a href="index.php" class="c-logo">
                            <img src="images/logo.png" alt="" class="c-desktop-logo">
                            <img src="images/logo.png" alt="" class="c-desktop-logo-inverse">
                            <img src="images/logo.png" alt="" class="c-mobile-logo"> </a>
                            <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
                                <span class="c-line"></span>
                                <span class="c-line"></span>
                                <span class="c-line"></span>
                            </button>
                            <button class="c-topbar-toggler" type="button">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                        </div>
                        <!-- END: BRAND -->

                        <!-- BEGIN: HOR NAV -->
                        <!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
                        <!-- BEGIN: MEGA MENU -->
                        <!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
                        <nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold">
                            <ul class="nav navbar-nav c-theme-nav">
                                <li <?php echo $menuHome; ?>>
                                    <a href="index.php" class="c-link dropdown-toggle">Beranda
                                    </a>
                                </li>

                                <?php
                                if ($_SESSION["login"] == true) {
                                    ?>
                                    <li <?php echo $menuGallery; ?>>
                                        <a href="gallery.php" class="c-link dropdown-toggle">Galeri    
                                        </a>
                                    </li>

                                    <li <?php echo $menuCalendar; ?>>
                                        <a href="event_calendar.php" class="c-link dropdown-toggle">Kalendar Kegiatan    
                                        </a>
                                    </li>

                                    <li <?php echo $menuStudentAchievement; ?>>
                                        <a href="student_achievement.php" class="c-link dropdown-toggle">Prestasi Sekolah
                                        </a>
                                    </li>

                                    <?php } ?>

                                    <?php
                                    if ($_SESSION["login"] == false) {
                                        ?>
                                        <li>
                                            <a href="#" class="c-link dropdown-toggle" data-toggle="modal" data-target="#login-form">Masuk
                                                <i class="glyphicon glyphicon-log-in"> </i>
                                            </a>
                                        </li>
                                        <?php } elseif ($_SESSION["login"] == true) { ?>
                                        <li class="c-menu-type-classic">
                                            <a href="#" class="c-link dropdown-toggle" >
                                                <?php echo 'Selamat Datang' . ", " . $_COOKIE["username"] ?>
                                                <span class="c-arrow c-toggler"></span>
                                            </a>
                                            <ul class="dropdown-menu c-menu-type-classic c-pull-right">
                                                <?php if($_COOKIE['role'] == 'admin')  { ?>
                                                <li>
                                                    <a href="master_user.php" class="c-link dropdown-toggle">User <i class="fa fa-user"></i> </a>
                                                </li>
                                                <li>
                                                    <a href="master_matpel.php" class="c-link dropdown-toggle">Mata Pelajaran <i class="fa fa-book"></i> </a>
                                                </li>
                                                <li>
                                                    <a href="master_kelas.php" class="c-link dropdown-toggle">Kelas <i class="fa fa-home"></i> </a>
                                                </li>
                                                <li>
                                                    <a href="relasi_user_matpel.php" class="c-link dropdown-toggle">Relasi User Matpel <i class="fa fa-user-plus"></i> </a>
                                                </li>
                                                <li>
                                                    <a href="report.php" class="c-link dropdown-toggle">Report <i class="fa fa-warning"></i> </a>
                                                </li>
                                                <?php } ?>
                                                <li>
                                                    <a href="#" class="c-link dropdown-toggle"  data-toggle="modal" data-target="#modalLogout">Keluar
                                                        <i class="glyphicon glyphicon-log-out"> </i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="inbox.php" class="c-link dropdown-toggle">
                                                <i class="fa fa-envelope"></i>
                                                <?php 
                                                $sql2 = "SELECT SUM(n_number) as notifikasi FROM notification WHERE id_penerima = '$user_id'";
                                                $result2 = $conn->query($sql2);
                                                if ($result2->num_rows > 0) { 
                                                    while ($row2 = $result2->fetch_assoc()) {
                                                        if($row2['notifikasi'] != NULL){ ?>
                                                        <span class="badge"><?php echo $row2['notifikasi']; ?></span>
                                                        <?php  } else { ?>
                                                        <span class="badge">0</span>
                                                        <?php  }}}
                                                        ?>    
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" class="c-link dropdown-toggle" data-toggle="modal" data-target="#notif" onclick='asyncNotif();'>
                                                        <i class="fa fa-bell"></i>
                                                        <?php 
                                                        $query = "SELECT COUNT(id_penerima) as notifikasi FROM `notif_socmed` WHERE id_penerima = '$user_id' AND seen = 0";
                                                        $hasil = $conn->query($query);
                                                        if ($hasil->num_rows > 0) {
                                                            while ($row = $hasil->fetch_assoc()) { ?>
                                                            <span id="showNotifSocmed" class="badge"><?php echo $row['notifikasi']; ?></span>   
                                                            <?php      
                                                        }
                                                    } else {
                                                        ?>
                                                        <span class="badge">0</span>
                                                        <?php } 
                                                        ?>
                                                    </a>
                                                </li>
                                                <?php } ?>

                                                <script type="text/javascript">
                                                    var iduser = <?php echo $user_id ?>;
                                                    function asyncNotif(){
                                                        $.post("reset_notif.php", 
                                                            { user_id: iduser })
                                                            .done(function( data ) {
                                                            
                                                            $("#showNotifSocmed").text(0);
                                                        });
                                                    }
                                                </script>

                                            </ul>
                                        </nav>
                                        <!-- END: MEGA MENU -->
                                        <!-- END: LAYOUT/HEADERS/MEGA-MENU -->
                                        <!-- END: HOR NAV -->
                                    </div>
                                </div>
                            </div>

                        </header>
                        <!-- END: HEADER -->
                        <!-- END: LAYOUT/HEADERS/HEADER-1 -->

                        <!-- BEGIN: CONTENT/USER/FORGET-PASSWORD-FORM -->
                        <div class="modal fade c-content-login-form" id="forget-password-form" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content c-square">
                                    <div class="modal-header c-no-border">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h1 class="c-font-24 c-font-sbold">Pemulihan Kata Sandi</h1>
                                        <p>Untuk memulihkan kata sandi anda silahkan hubungi admin yang bertugas.</p>
                                        <p>Anda bisa mengirimkan pesan ke email kami : example@mail.sch.id</p> 
                                        <p>Tolong tuliskan detail masalah anda (pesan error, masalah yang dihadapi, dll) untuk mendapatkan bantuan yang dibutuhkan.</p>

                                    </div>
                                    <div class="modal-footer c-no-border">

                                        <a href="javascript:;" data-toggle="modal" data-target="#login-form" data-dismiss="modal" class="btn c-btn-dark-1 btn c-btn-uppercase c-btn-bold c-btn-slim c-btn-border-2x c-btn-square c-btn-signup">Kembali ke halaman masuk!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: CONTENT/USER/FORGET-PASSWORD-FORM -->

                        <!-- BEGIN: CONTENT/USER/LOGIN-FORM -->
                        <div class="modal fade c-content-login-form" id="login-form" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content c-square">
                                    <div class="modal-header c-no-border">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h3 class="c-font-24 c-font-sbold">Selamat Datang!</h3>
                                        <p>Semoga hari anda menyenangkan!</p>
                                        <form action="login.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="username" class="hide">Username</label>
                                                <input type="text" class="form-control input-lg c-square" id="username" placeholder="Username" name="username" required="Input your username"> </div>
                                                <div class="form-group">
                                                    <label for="login-password" class="hide">Password</label>
                                                    <input type="password" class="form-control input-lg c-square" id="login-password" placeholder="Password" name="password" required="Input your password"> </div>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login">Masuk</button>
                                                        <a href="javascript:;" data-toggle="modal" data-target="#forget-password-form" data-dismiss="modal" class="c-btn-forgot">Lupa Kata Sandi ?</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: CONTENT/USER/LOGIN-FORM -->

                                <!-- BEGIN: CONTENT/USER/LOGOUT-FORM -->
                                <div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content c-square">
                                            <div class="modal-body">
                                                <h3 class="c-font-24 c-font-sbold">Apakah anda yakin ingin keluar ?</h3>
                                                <div class="form-group">
                                                    <button  data-dismiss="modal"  class="btn btn-danger">Batal</button>
                                                    <a href="logout.php"> <button class="btn btn-info" > Keluar</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: CONTENT/USER/LOGOUT-FORM -->

                                <!-- MODAL NOTIFIKASI -->
                                <div id="notif" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="overflow-y: initial !important">
                                        <div class="modal-content c-square">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">Pemberitahuan</h4>
                                            </div>
                                            <div class="modal-body" style="height: 500px; overflow-y: auto;">
                                                <?php 
                                                $query = "SELECT * FROM `notif_socmed` WHERE id_penerima = '$user_id' ORDER BY id desc";
                                                        $hasil = $conn->query($query);
                                                        if ($hasil->num_rows > 0) {
                                                            while ($row = $hasil->fetch_assoc()) {
                                                ?>
                                                <div class="alert alert-info" role="alert">
                                                    <a class="c-font-slim" href="postingan.php?id=<?php echo $row['idpostingan'] ?>"><?php echo $row['nama_notif'] ?></a>.
                                                    <h4 style="margin-top: 1%; padding-bottom: 0;"><?php echo $row['time'] ?></h4>
                                                </div>
                                                <?php }} else { ?>
                                                <h1>TIDAK ADA NOTIFIKASI</h1>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- END MODAL NOTIFIKASI -->

