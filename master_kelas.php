<?php
session_start();
$_SESSION['menuHeader'] = 'home';
include 'config/connectdb.php';
include_once 'layout/header.php';


if ($_SESSION["login"] == false) {
    echo '<script type="text/javascript">alert("Silahkan login terlebih dahulu"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
if ($_COOKIE['role'] != 'admin') {
    echo '<script type="text/javascript">alert("Hanya Admin Yang Boleh Akses Halaman Ini"); </script>';
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
                    <a href="javascript:;">Master Kelas</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
    <!-- BEGIN: PAGE CONTENT -->
    <div style="margin: 2%;">
        <button class="btn btn-info" data-toggle="modal" data-target="#add-kelas">Tambah Kelas Baru</button>
        <table id="kelas" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Nama Kelas</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM kelas";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <th style="text-align: center;"><?php echo $row['id']; ?></th>
                            <td style="text-align: center;"><?php echo $row['nama_kelas']; ?></td>
                            <td style="text-align: center;">
                                <button class="btn btn-info" data-toggle="modal" data-target="#deleteKelas<?php echo $row['id'] ?>">Hapus</button>
                            </td>
                        </tr>

                        <!-- BEGIN: MODAL DELETE MATPEL -->
                        <div class="modal fade" id="deleteKelas<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content c-square">
                                    <div class="modal-body">
                                        <h3 class="c-font-24 c-font-sbold">Apakah anda yakin ingin menghapus Kelas <?php echo $row['nama_kelas']; ?> ?</h3>
                                        <div class="form-group">
                                            <button  data-dismiss="modal" class="btn btn-danger">Batal</button>
                                            <form method="POST" action="kelasController.php" style="display: inline-block;">
                                                <input type="hidden" name="act" value="delete_kelas">
                                                <input type="hidden" name="kelas_id" value="<?php echo $row['id']; ?>">
                                                <button class="btn btn-info" > Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: MODAL DELETE MATPEL -->
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
    var table = $('#kelas').DataTable({
        lengthChange: false,
        ordering: true,
        order: [[1, 'asc']],
        stateSave: true,
    });
</script>

<!-- MODAL ADD NEW KELAS -->
<div class="modal fade c-content-login-form" id="add-kelas" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-body">
                <h3 class="c-font-24 c-font-sbold">Tambah Kelas Baru</h3>
                <form action="kelasController.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="control-label" class="">Jenjang Kelas</label>
                        <select class="form-control" required="" name="jenjang_kelas">
                            <option value="">--Pilih Jenjang--</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jurusan</label>
                        <select class="form-control" required="" name="jurusan">
                            <option value="">--Pilih Jurusan--</option>
                            <option value="IPA">IPA</option>
                            <option value="IPS">IPS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama Kelas</label>
                        <input type="text" class="form-control input-lg c-square" id="nama_kelas" placeholder="Nama Kelas" name="nama_kelas" required="">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="act" value="add_kelas">
                        <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;">Tambah</button><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL ADD NEW KELAS -->