<?php
session_start();
$_SESSION['menuHeader'] = 'home';
$_SESSION['menuAdmin'] = 'user';
include 'config/connectdb.php';
include_once 'layout/header.php';

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
                <h3 class="c-font-uppercase c-font-sbold">Halaman Admin</h3>
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
        <button class="btn btn-info" data-toggle="modal" data-target="#add-user" style="margin-bottom: 2%; margin-left: 2%;">Tambah User Baru</button>
        <form action="master_user.php" method="GET" style=" margin-left: 2%;" class="form-inline">
            <label style="display: inline;">Pilih Role</label>
            <div class="form-group">
                <select name="select-role" id="select-role" class="form-control" st>
                    <option value="" selected disabled="">-- Pilih Role --</option> 
                    <option value="">All</option>
                    <option value="murid">murid</option>
                    <option value="guru">guru</option>
                    <option value="ortu">ortu</option>
                </select>
                <button class="btn btn-info">Pilih</button>
            </div>
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
                    <th style="text-align: center;">Nama Ortu</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['select-role'])) {
                    $role = $_GET['select-role'];
                    if ($role != "") {
                        $sql = "SELECT u.*, k.nama_kelas FROM `user` u left JOIN kelas k on u.kelas_id = k.id WHERE role = '$role' AND NOT role = 'admin'";
                    } else {
                        $sql = "SELECT u.*, k.nama_kelas FROM `user` u left JOIN kelas k on u.kelas_id = k.id WHERE NOT role = 'admin' ORDER BY role ASC";
                    }
                } else {
                    $sql = "SELECT u.*, k.nama_kelas FROM `user` u left JOIN kelas k on u.kelas_id = k.id WHERE NOT role = 'admin' ORDER BY role ASC";
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
                            <td style="text-align: center;">
                                <?php 
                                $s = "SELECT nama FROM user WHERE id = '$ortu_id'";
                                $h = $conn->query($s);
                                if ($h->num_rows > 0) {
                                    while ($r = $h->fetch_assoc()) {
                                        echo $r['nama'];
                                    }
                                }
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <button class="btn btn-info" data-toggle="modal" data-target="#editUser<?php echo $row['id'] ?>">Ubah</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteUser<?php echo $row['id'] ?>">Hapus</button>
                            </td>
                        </tr>

                        <!-- BEGIN: MODAL DELETE USER -->
                        <div class="modal fade" id="deleteUser<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content c-square">
                                    <div class="modal-body">
                                        <h3 class="c-font-24 c-font-sbold">Apakah anda yakin ingin menghapus user <?php echo $row['nama']; ?> ?</h3>
                                        <div class="form-group">
                                            <button  data-dismiss="modal" class="btn btn-danger">Batal</button>
                                            <form method="POST" action="userController.php" style="display: inline-block;">
                                                <input type="hidden" name="act" value="delete_user">
                                                <input type="hidden" name="url" value="<?php echo $url ?>">
                                                <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                                <button class="btn btn-info" >Hapus</button>
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
                                        <h4 class="modal-title" id="myLargeModalLabel">Ubah User <?php echo $row['nama'] ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="userController.php" method="POST" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label class="col-md-3">Nama</label>
                                                <input type="text" class="form-control" style="width: 60%;" name="nama" value="<?php echo $row['nama'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3">Username</label>
                                                <input type="text" class="form-control" style="width: 60%;"  name="username" disabled="" value="<?php echo $row['username'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3">Password</label>
                                                <input type="text" class="form-control" style="width: 60%;"  name="password" value="<?php echo $row['password'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3">Role</label>
                                                <input type="text" class="form-control" style="width: 60%;"  name="role" disabled="" value="<?php echo $row['role'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3">Kelas</label>
                                                <select name="select-kelas" class="form-control" style="width: 60%;">
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
                                                        <?php if ($row['kelas_id'] != '') { ?>
                                                            <option selected="" value="<?php echo $row['kelas_id'] ?>"><?php echo $row['nama_kelas'] ?></option>
                                                            <?php
                                                        }
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

                                                <select name="select-ortu" class="form-control" style="width: 60%;">
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
                                            <div class="form-group" style="text-align: right;">
                                                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                                <input type="hidden" name="act" value="edit_user">
                                                <input type="hidden" name="role" value="<?php echo $role ?>">
                                                <input type="hidden" name="url" value="<?php echo $url ?>">
                                                <button type="reset" class="btn btn-warning c-btn-square c-btn-uppercase c-btn-bold" value="Reset">Reset</button>
                                                <button type="submit" class="btn btn-info c-btn-square c-btn-uppercase c-btn-bold">Simpan</button>

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
        ordering: true,
        order: [[5, 'asc']],
        stateSave: false,
    });
    //BUAT NGE-ORDER BY KOLOM 5 (INDEXING DARI 0) (ROLE) ASC. SOALNYA KALO PAKE QUERY DATATABLE NYA GAK MAU NGE-SORT
    // table.order( [ 5, 'asc' ] ).draw();
</script>

<!-- MODAL ADD USER -->
<div id="add-user" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content c-square">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myLargeModalLabel">Tambah User Baru</h4>
            </div>
            <div class="modal-body">

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
                            <select id="selectRole" name="role" class="form-control  c-square c-theme input-lg" required="">
                                <option value="" disabled selected>-- Pilih Role --</option>
                                <option value="murid">murid</option>
                                <option value="guru">guru</option>
                                <option value="ortu">ortu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Kelas</label>
                        <div class="col-md-6">
                            <select id="selectKelas" name="kelas" class="form-control  c-square c-theme input-lg">
                                <option value="NULL" selected>-- Pilih Kelas --</option> 
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
                            <span class="help-block">Pilih kelas jika role adalah <b>murid</b></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Orang Tua</label>
                        <div class="col-md-6">
                            <select id="selectOrtu" name="ortu" class="form-control  c-square c-theme input-lg">
                                <option value="NULL" selected>-- Pilih Ortu --</option> 
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
                            <span class="help-block">Pilih ortu jika role adalah <b>murid</b></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Foto</label>
                        <div class="col-md-6">
                            <input class="form-control  c-square c-theme input-lg" type="file" name="file"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-8 col-md-4">
                            <input type="hidden" name="act" value="add_user">
                            <input type="hidden" name="url" value="<?php echo $url ?>">
                            <button type="submit" class="btn btn-info c-btn-square c-btn-uppercase c-btn-bold">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL ADD USER -->

<script type="text/javascript">
    $('#selectOrtu').hide();
    $('#selectKelas').hide();

    $('#selectRole').change(function(){
        if($('#selectRole').val() === 'murid') {
            $('#selectOrtu').show();
            $('#selectKelas').show();
        } else {
            $('#selectOrtu').hide();
            $('#selectKelas').hide();
        }
    });
</script>