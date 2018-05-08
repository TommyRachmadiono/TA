<div class="c-layout-sidebar-menu c-theme ">
            <!-- BEGIN: LAYOUT/SIDEBARS/SIDEBAR-MENU-1 -->
            <div class="c-sidebar-menu-toggler">
                <h3 class="c-title c-font-uppercase c-font-bold">Navigation</h3>
                <a href="javascript:;" class="c-content-toggler" data-toggle="collapse" data-target="#sidebar-menu-1, #sidebar-menu-2, #createGroup">
                    <span class="c-line"></span>
                    <span class="c-line"></span>
                    <span class="c-line"></span>
                </a>
            </div>


            <?php if ($_SESSION["login"] == true) { ?>
                <a class="c-sidebar-menu collapse" data-toggle="modal" data-target="#create-group" style="width: 100%;" id="createGroup"><button type="button" class="btn btn-default" style="width: 100%;">
                        <i class="icon-bubbles">Create Group</i>
                    </button></a>
            <?php } ?>

            <?php if($_SESSION["menuHeader"] == 'group_page') { ?>

                <a class="c-sidebar-menu collapse" data-toggle="modal" data-target="#show-member" style="width: 100%; margin-top: 3%;" id="createGroup"><button type="button" class="btn btn-default" style="width: 100%;">
                        <i class="fa fa-eye"> Show Member</i>
                    </button></a>

                <?php
                $sql = "SELECT * FROM user u INNER JOIN grup g on u.id = g.user_id WHERE u.id = $user_id AND g.id=$group_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    ?>
                    <a class="c-sidebar-menu collapse" data-toggle="modal" data-target="#invite-member" style="width: 100%; margin-top: 3%;" id="createGroup"><button type="button" class="btn btn-default" style="width: 100%;">
                            <i class="fa fa-user-plus"> Invite Member</i>
                        </button></a>
                <?php }} ?>


            <ul class="c-sidebar-menu collapse " id="sidebar-menu-1" style="margin-top: 7%;">
                <li class="c-active">
                    <a class="c-toggler">My Groups
                        <span class="c-arrow"></span>
                    </a>
                    <?php
                    if ($_SESSION["login"] == true) {
                        $user_id = $_COOKIE['user_id'];
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
                    }
                } elseif ($_SESSION["login"] == false) {
                    ?>
                    <li>
                        <a href="#">
                            <i class="icon-bubbles"></i> Example Link</a>
                    </li>
                <?php } ?>

                </li>
            </ul>
            <br>
            <ul class="c-sidebar-menu collapse " id="sidebar-menu-2">
                <li class="c-active">
                    <a class="c-toggler">Mata Pelajaran
                        <span class="c-arrow"></span>
                    </a>
                 <?php 
                 if ($_SESSION["login"] == true) {
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
                <?php } } } else { ?>
                <li>
                    <a href="#">
                        <i class="icon-bell"></i> Example Link</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-bubbles"></i> Example Link</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-user"></i> Example Link</a>
                </li>
                <?php } ?>
                </li>
            </ul>
            <!-- END: LAYOUT/SIDEBARS/SIDEBAR-MENU-1 -->
        </div>