<?php
session_start();
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
                <h3 class="c-font-uppercase c-font-sbold">Admin Page</h3>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li>
                    <a href="#">Admin</a>
                </li>
                <li>/</li>
                <li>
                    <a href="javascript:;">Master User</a> 
                </li>
            </ul>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
    <!-- BEGIN: PAGE CONTENT -->
    <div style="margin: 2%;">
        <button class="btn btn-info" data-toggle="modal" data-target="#add-user" style="vertical-align: top !important; margin-bottom: 2%;">Add New User</button>
        <form action="master_user.php" method="GET" style="display: inline-block; margin-left: 2%;">
            <label style="display: inline;">Select Role</label>
            <select name="select-role" id="select-role" >
                <option value="" selected disabled="">-- Select Role --</option> 
                <option value="">All</option>
                <?php
                $sql = "select distinct role from user where NOT role ='admin'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row['role']; ?>"><?php echo $row['role']; ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <button class="btn btn-default">Select</button>
        </form>
        <table id="tabel-user" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Foto</th>
                    <th style="text-align: center;">Nama</th>
                    <th style="text-align: center;">Username</th>
                    <th style="text-align: center;">Password</th>
                    <th style="text-align: center;">Role</th>
                    <th style="text-align: center;">Kelas</th>
                    <th style="text-align: center;">Ortu ID</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['select-role'])) {
                    $role = $_GET['select-role'];
                    if ($role != "") {
                        $sql = "SELECT u.*, k.nama_kelas FROM `user` u left JOIN kelas k on u.kelas_id = k.id WHERE role = '$role' AND NOT role = 'admin'";
                    } else {
                        $sql = "SELECT u.*, k.nama_kelas FROM `user` u left JOIN kelas k on u.kelas_id = k.id WHERE NOT role = 'admin'";
                    }
                } else {
                    $sql = "SELECT u.*, k.nama_kelas FROM `user` u left JOIN kelas k on u.kelas_id = k.id WHERE NOT role = 'admin'";
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $foto = $row['foto'];
                        $ortu_id = $row['ortu_id'];
                        $role = $row['role'];
                        $user_id = $row['id'];
                        ?>
                        <tr>
                            <th style="text-align: center;"><?php echo $row['id']; ?></th>
                            <td style="text-align: center;"><img src="images/fotoprofil/<?php echo $foto; ?>" style="border-radius: 50%; height: 50px;"></td>
                            <td style="text-align: center;"><?php echo $row['nama']; ?></td>
                            <td style="text-align: center;"><?php echo $row['username']; ?></td>
                            <td style="text-align: center;"><?php echo $row['password']; ?></td>
                            <td style="text-align: center;"><?php echo $row['role']; ?></td>
                            <td style="text-align: center;"><?php echo $row['nama_kelas']; ?></td>
                            <td style="text-align: center;"><?php echo $row['ortu_id']; ?></td>
                            <td style="text-align: center;">
                                <button class="btn btn-info" data-toggle="modal" data-target="#editUser<?php echo $row['id'] ?>">Edit</button>
                                <button class="btn btn-info" data-toggle="modal" data-target="#deleteUser<?php echo $row['id'] ?>">Delete</button>
                            </td>
                        </tr>

                        <!-- BEGIN: MODAL DELETE USER -->
                    <div class="modal fade" id="deleteUser<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content c-square">
                                <div class="modal-body">
                                    <h3 class="c-font-24 c-font-sbold">Are you sure want to delete User <?php echo $row['nama']; ?> ?</h3>
                                    <div class="form-group">
                                        <button  data-dismiss="modal" class="btn btn-danger">Cancel</button>
                                        <form method="POST" action="userController.php" style="display: inline-block;">
                                            <input type="hidden" name="act" value="delete_user">
                                            <input type="hidden" name="url" value="<?php echo $url ?>">
                                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                            <button class="btn btn-info" >Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: MODAL DELETE USER -->

                    <!-- BEGIN: MODAL EDIT USER -->
                    <div id="editUser<?php echo $row['id'] ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content c-square">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myLargeModalLabel">Edit User <?php echo $row['nama'] ?></h4>
                                </div>
                                <div class="modal-body">
                                    <form action="userController.php" method="POST" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="col-md-3">Nama</label>
                                            <input type="text" style="width: 60%;" name="nama" value="<?php echo $row['nama'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3">Username</label>
                                            <input type="text" style="width: 60%;"  name="username" disabled="" value="<?php echo $row['username'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3">Password</label>
                                            <input type="text" style="width: 60%;"  name="password" value="<?php echo $row['password'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3">Role</label>
                                            <input type="text" style="width: 60%;"  name="role" disabled="" value="<?php echo $row['role'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3">Kelas</label>
                                            <select name="select-kelas">
                                                <option value="NULL" selected="">--Pilih Kelas--</option>
                                                <?php if ($row['role'] == 'guru' || $row['role'] == 'ortu') { ?>

                                                    <?php
                                                    $sql = "select * from kelas where nama_kelas != '" . $row['nama_kelas'] . "'";
                                                    $result2 = $conn->query($sql);
                                                    if ($result2->num_rows > 0) {
                                                        while ($row = $result2->fetch_assoc()) {
                                                            ?>
                                                            <option disabled="" value="<?php echo $row['id']; ?>"><?php echo $row['nama_kelas']; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                } else {
                                                    ?>
                                                    <option selected="" value="<?php echo $row['kelas_id'] ?>"><?php echo $row['nama_kelas'] ?></option>
                                                    <?php
                                                    $sql = "select * from kelas where nama_kelas != '" . $row['nama_kelas'] . "'";
                                                    $result2 = $conn->query($sql);
                                                    if ($result2->num_rows > 0) {
                                                        while ($row = $result2->fetch_assoc()) {
                                                            ?>
                                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nama_kelas']; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3">Ortu</label>

                                            <select name="select-ortu">
                                                <option value="NULL">-- Pilih Orang Tua --</option>
                                                <?php
                                                if ($role == 'guru' || $role == 'ortu') {
                                                    $sql = "select * from user where id = '$ortu_id' AND role = 'ortu'";
                                                    $hasil = $conn->query($sql);
                                                    if ($hasil->num_rows > 0) {
                                                        while ($a = $hasil->fetch_assoc()) {
                                                            ?>
                                                            <option disabled="" value="<?php echo $a['id'] ?>"><?php echo $a['nama'] ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                                    <?php
                                                    $sql = "select * from user where id != '$ortu_id' AND role = 'ortu'";
                                                    $hasil2 = $conn->query($sql);
                                                    if ($hasil2->num_rows > 0) {
                                                        while ($b = $hasil2->fetch_assoc()) {
                                                            ?>
                                                            <option disabled="" value="<?php echo $b['id'] ?>"><?php echo $b['nama'] ?></option>
                                                            <?php
                                                        }
                                                    }
                                                } else {
                                                    $sql = "select * from user where id = '$ortu_id' AND role = 'ortu'";
                                                    $hasil = $conn->query($sql);
                                                    if ($hasil->num_rows > 0) {
                                                        while ($a = $hasil->fetch_assoc()) {
                                                            ?>
                                                            <option selected="" value="<?php echo $a['id'] ?>"><?php echo $a['nama'] ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                                    <?php
                                                    $sql = "select * from user where id != '$ortu_id' AND role = 'ortu'";
                                                    $hasil2 = $conn->query($sql);
                                                    if ($hasil2->num_rows > 0) {
                                                        while ($b = $hasil2->fetch_assoc()) {
                                                            ?>
                                                            <option value="<?php echo $b['id'] ?>"><?php echo $b['nama'] ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3">Foto</label>
                                            <input type="file" style="width: 60%;"  name="file">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                            <input type="hidden" name="act" value="edit_user">
                                            <input type="hidden" name="url" value="<?php echo $url ?>">
                                            <button type="reset" class="btn btn-default c-btn-square c-btn-uppercase c-btn-bold" value="Reset">Reset</button>
                                            <button type="submit" class="btn btn-default c-btn-square c-btn-uppercase c-btn-bold">Submit</button>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: MODAL EDIT USER -->
                    <?php
                }
            }
            ?>
            </tbody>
        </table>
    </div>
    <!-- END: PAGE CONTENT -->
</div>
<!-- END: PAGE CONTAINER -->
<?php
include_once 'layout/footer.php';
?>

<script>
    var table = $('#tabel-user').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });
</script>

<!-- MODAL ADD USER -->
<div id="add-user" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content c-square">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myLargeModalLabel">Add New User</h4>
            </div>
            <div class="modal-body">
                <div class="c-content-title-1 c-title-md c-margin-b-20 clearfix">
                    <h3 class="c-center c-font-uppercase c-font-bold">New User</h3>
                    <div class="c-line-center c-theme-bg"></div>
                </div>
                <form action="userController.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Nama</label>
                        <div class="col-md-6">
                            <input name="nama" class="form-control  c-square c-theme input-lg" type="text" placeholder="Nama User" required=""> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Username</label>
                        <div class="col-md-6">
                            <input name="username" class="form-control  c-square c-theme input-lg" type="text" placeholder="Username" required=""> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            <input name="password" class="form-control  c-square c-theme input-lg" type="password" placeholder="Password" required=""> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Role</label>
                        <div class="col-md-6">
                            <select name="role" class="form-control  c-square c-theme input-lg" required="">
                                <option value="" disabled selected>-- Select Role --</option>
                                <option value="murid">murid</option>
                                <option value="guru">guru</option>
                                <option value="ortu">ortu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Kelas</label>
                        <div class="col-md-6">
                            <select name="kelas" class="form-control  c-square c-theme input-lg">
                                <option value="NULL" selected>-- Select Kelas --</option> 
                                <?php
                                $sql = "select * from kelas";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nama_kelas']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <span class="help-block">Select kelas only if role is <b>murid</b></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Orang Tua</label>
                        <div class="col-md-6">
                            <select name="ortu" class="form-control  c-square c-theme input-lg">
                                <option value="NULL" selected>-- Select Ortu --</option> 
                                <?php
                                $sql = "select * from user WHERE ISNULL(ortu_id) AND role NOT IN('guru','admin','murid')";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                            <span class="help-block">Select ortu only if role is <b>murid</b></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Foto</label>
                        <div class="col-md-6">
                            <input class="form-control  c-square c-theme input-lg" type="file" name="file" required=""> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-8 col-md-4">
                            <input type="hidden" name="act" value="add_user">
                            <input type="hidden" name="url" value="<?php echo $url ?>">
                            <button type="submit" class="btn btn-default c-btn-square c-btn-uppercase c-btn-bold">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL ADD USER -->

