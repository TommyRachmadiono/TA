<?php 
$info = getdate();
$date = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];
$current_date = "$date/$month/$year = $hour:$min:$sec";
$current_time = "$hour:$min";
?>

<div class="c-layout-sidebar-menu c-theme ">
    <!-- BEGIN: LAYOUT/SIDEBARS/SIDEBAR-MENU-1 -->
    <div class="c-sidebar-menu-toggler">
        <h3 class="c-title c-font-uppercase c-font-bold">Navigasi</h3>
        <a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1, #sidebar-menu-2, #createGroup" aria-expanded="true">
            <span class="c-line"></span>
            <span class="c-line"></span>
            <span class="c-line"></span>
        </a>
    </div>


    <?php if ($_SESSION["login"] == true) { ?>
    <a class="c-sidebar-menu collapse" data-toggle="modal" data-target="#create-group" style="width: 100%;" id="createGroup"><button type="button" class="btn btn-default" style="width: 100%;">
        <i class="icon-bubbles">Buat Grup</i>
    </button></a>
    <?php } ?>

    <?php if($_SESSION["menuHeader"] == 'group_page') { ?>

    <a class="c-sidebar-menu collapse" data-toggle="modal" data-target="#show-member" style="width: 100%; margin-top: 3%;" id="createGroup"><button type="button" class="btn btn-default" style="width: 100%;">
        <i class="fa fa-eye"> Tampilkan Anggota</i>
    </button></a>

    <?php
    $sql = "SELECT * FROM user u INNER JOIN grup g on u.id = g.user_id WHERE u.id = $user_id AND g.id=$group_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        ?>
        <a class="c-sidebar-menu collapse" data-toggle="modal" data-target="#invite-member" style="width: 100%; margin-top: 3%;""><button type="button" class="btn btn-default" style="width: 100%;">
            <i class="fa fa-user-plus"> Undang Anggota</i>
        </button></a>

        <a class="c-sidebar-menu collapse" data-toggle="modal" data-target="#delete-group" style="width: 100%; margin-top: 3%;"><button type="button" class="btn btn-danger" style="width: 100%;">
            <i class="fa fa-warning"> Bubarkan Grup</i>
        </button></a>
        <?php }} ?>

        
        <?php
        if ($_SESSION["login"] == true) { ?>
        <ul class="c-sidebar-menu collapse " id="sidebar-menu-1" style="margin-top: 7%;">
            <li class="c-active">
                <a class="c-toggler">Grup Saya
                    <span class="c-arrow"></span>
                </a>
                <?php    $user_id = $_COOKIE['user_id'];
                $sql = "SELECT g.id, g.topik_grup FROM anggota a INNER JOIN grup g on a.grup_id = g.id WHERE a.user_id = '$user_id'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                            // output data of each row
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <li>
                            <a href="group_page.php?id=<?php echo $row['id'] ?>">
                                <i class="icon-bubbles"></i> <?php echo $row['topik_grup'] ?></a>
                            </li>
                            <?php
                        }
                    } ?>
                </li>
            </ul>
            <br>
            <?php } ?>



            <?php 
            if ($_SESSION["login"] == true) { ?>
            <ul class="c-sidebar-menu collapse " id="sidebar-menu-2" style="margin-bottom: 10%;">
             <li class="c-active">
                <a class="c-toggler">Mata Pelajaran
                    <span class="c-arrow"></span>
                </a>
                <?php  $user_id = $_COOKIE['user_id'];
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
                            <?php } } ?> 
                        </li>
                    </ul>
                    <?php } ?>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span class="glyphicon glyphicon-time"></span> Clock
                            </h3>
                        </div>
                        <div class="panel-body">
                            Server : <?php echo $current_time; ?>
                        </div>
                    </div>

                    <div class="c-padding-20 c-margin-t-0 c-bg-grey-1 c-bg-img-bottom-right" style="background-image:url(assets/base/img/content/misc/feedback_box_2.png)">
                        <div class="c-content-title-1 c-margin-t-20">
                            <h3 class="c-font-uppercase c-font-bold">Ingin menanyakan sesuatu?</h3>
                            <div class="c-line-left"></div>
                            <p class="c-font-thin">Silahkan mengirimkan pertanyaan anda melalui email <b>example@mail.com</b> atau langsung datang ke alamat kami di <b>Lorem Ipsum Dolor Sit Amet</b>, Surabaya</p>
                        </div>
                    </div>

                </div>