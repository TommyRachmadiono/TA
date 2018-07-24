<?php
session_start();
include_once 'layout/header.php';
include 'config/connectdb.php';

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
                    <a href="javascript:;">Master Relasi User Matpel</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
    <!-- BEGIN: PAGE CONTENT -->
    <div style="margin: 2%;">
        <!-- <button class="btn btn-info" data-toggle="modal" data-target="#add-matpel">Add New Relasi</button> -->
        <form action="relasi_user_matpel.php" method="GET" style="margin-left: 2%;" class="form-inline">
            <label style="display: inline;">Pilih Role</label>
            <div class="form-group">
            <select name="select-role" id="select-role" class="form-control">
                <option value="" selected disabled="">-- Pilih Role --</option> 
                <option value="">All</option>
                <?php
                $sql = "select distinct role from user where NOT (role ='admin' OR role = 'ortu')";
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
            <button class="btn btn-info">Pilih</button>
        </div>
        </form>
        <table id="relasimatpel" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center;">Foto</th>
                    <th style="text-align: center;">Nama</th>
                    <th style="text-align: center;">Kelas</th>
                    <th style="text-align: center;">Role</th>
                    <th style="text-align: center;">Mata Pelajaran</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['select-role'])) {
                    $role = $_GET['select-role'];
                    if ($role != "") {
                        $sql2 = "select distinct u.id as u_id, u.role, u.nama,u.foto, k.nama_kelas from user u left join relasi_user_matpel rum ON u.id = rum.user_id LEFT JOIN kelas k on k.id = u.kelas_id WHERE u.role = '$role'";
                    } else {
                        $sql2 = "select distinct u.id as u_id, u.role, u.nama,u.foto, k.nama_kelas from user u left join relasi_user_matpel rum ON u.id = rum.user_id LEFT JOIN kelas k on k.id = u.kelas_id WHERE NOT (role = 'ortu')";
                    }
                } else {
                    $sql2 = "select distinct u.id as u_id, u.role, u.nama,u.foto, k.nama_kelas from user u left join relasi_user_matpel rum ON u.id = rum.user_id LEFT JOIN kelas k on k.id = u.kelas_id WHERE NOT (role = 'ortu')";
                }

                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                    while ($row = $result2->fetch_assoc()) {
                        $iduser = $row['u_id'];
                        ?>

                        <tr>
                            <th style="text-align: center;"><img src="images/fotoprofil/<?php echo $row['foto']; ?>" style="border-radius: 50%; height: 50px;"></th>
                            <td style="text-align: center;"><?php echo $row['nama']; ?></td>
                            <td style="text-align: center;"><?php echo $row['nama_kelas']; ?></td>
                            <td style="text-align: center;"><?php echo $row['role']; ?></td>
                            <td style="text-align: center;">
                                <?php
                                $sql = "SELECT m.nama_pelajaran from user u inner join relasi_user_matpel rum ON u.id = rum.user_id INNER JOIN matpel m ON rum.matpel_id = m.id WHERE u.id = $iduser";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // echo $sql;
                                    while ($row1 = $result->fetch_assoc()) {
                                        ?>

                                        <?php echo $row1['nama_pelajaran'] ?> |

                                    <?php }
                                } ?>

                            </td>

                            <td style="text-align: center;">
                                <button class="btn btn-info" data-toggle="modal" data-target="#details<?php echo $row['u_id']; ?>">Ubah</button>
                            </td>
                        </tr>

                        <!-- BEGIN: MODAL DETAILS -->
                    <div class="modal fade" id="details<?php echo $row['u_id'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content c-square">
                                <div class="modal-body">
                                    <h3 class="c-font-24 c-font-sbold">Mata Pelajaran Yang Diambil <?php echo $row['nama']; ?></h3>
                                    <form method="POST" action="userController.php" style="display: inline-block;">
                                        <?php
                                        $query = "SELECT * from matpel";
                                        $hasil = $conn->query($query);
                                        if ($hasil->num_rows > 0) {
                                            while ($a = $hasil->fetch_assoc()) {
                                                $matpeilid = $a['id'];

                                                $query2 = "SELECT * FROM relasi_user_matpel rum INNER JOIN matpel m on rum.matpel_id = m.id WHERE user_id = $iduser AND m.id = $matpeilid";
                                                $hasil2 = $conn->query($query2);
                                                if ($hasil2->num_rows > 0) {
                                                    ?>
                                                    <div class="checkbox">
                                                        <label><input checked="" type="checkbox" value="<?php echo $a['id'] ?>" name="matpel[]"><?php echo $a['nama_pelajaran'] ?></label>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" value="<?php echo $a['id'] ?>" name="matpel[]"><?php echo $a['nama_pelajaran'] ?></label>
                                                    </div>
                                                <?php }
                                            }
                                        } ?>
                                        <div class="form-group">
                                            <input type="hidden" name="url" value="<?php echo $url; ?>">
                                            <input type="hidden" name="act" value="update_relasi">
                                            <input type="hidden" name="user_id" value="<?php echo $iduser; ?>">
                                            <input type="reset" class="btn btn-danger" name="">
                                            <button class="btn btn-info" >Perbarui</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- END: MODAL DETAILS -->
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
    var table = $('#relasimatpel').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });
</script>