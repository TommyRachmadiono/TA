<?php
session_start();
$_SESSION['menuHeader'] = 'home';
include 'config/connectdb.php';
include_once 'layout/header.php';

if ($_SESSION["login"] == false) {
    echo '<script type="text/javascript">alert("Silahkan login terlebih dahulu"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
?>

<div class="c-layout-page">
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
                    <a href="javascript:;">Report</a>
                </li>
            </ul>
        </div>
    </div>

    <div style="margin: 2%;">
        <h1>Tabel Report</h1>
        <table id="tabel-report" class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">File</th>
                    <th style="text-align: center;">Postingan</th>
                    <th style="text-align: center;">Jumlah Report</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT p.file,r.postingan_id as id, COUNT(r.postingan_id) as Jumlah_Report, p.isi FROM report r INNER JOIN postingan p on r.postingan_id = p.idpostingan GROUP BY r.postingan_id";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if ($row['Jumlah_Report'] != NULL) {
                            $file = $row['file'];
                            ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $row['id']; ?></td>
                                <?php
                                if (!empty($file)) {
                                    $info = pathinfo($file);
                                    $ext = $info['extension'];
                                    if ($ext == "jpg" || $ext == "png" || $ext == "jpeg") {
                                        ?>
                                        <td style="text-align: center;"><img src="postingan/<?php echo $file; ?>" style="height: 100px; width: 250px;"></td>
                                    <?php } else { ?>
                                        <td style="text-align: center;"><a href="postingan/<?php echo $file ?>" download=""><?php echo $file ?></a></td>
                                    <?php }
                                } else { ?>
                                    <td style="text-align: center;">Tidak Ada Attachment</td>
                                <?php } ?>
                                <td style="text-align: center;"><?php echo $row['isi']; ?></td>
                                <td style="text-align: center;"><?php echo $row['Jumlah_Report']; ?></td>
                                <td style="text-align: center;">
                                    <button class="btn btn-info" data-toggle="modal" data-target="#ignorePostingan<?php echo $row['id'] ?>">Abaikan</button>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#deletePostingan<?php echo $row['id'] ?>">Hapus</button>

                                </td>
                            </tr>

                            <!-- BEGIN: MODAL DELETE STATUS -->
                        <div class="modal fade" id="deletePostingan<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content c-square">
                                    <div class="modal-body">
                                        <h3 class="c-font-24 c-font-sbold">Apakah anda yakin ingin menghapus postingan id <?php echo $row['id']; ?> ?</h3>
                                        <div class="form-group">
                                            <button  data-dismiss="modal" class="btn btn-danger">Batal</button>
                                            <form method="POST" action="reportController.php" style="display: inline-block;">
                                                <input type="hidden" name="act" value="delete_postingan">
                                                <input type="hidden" name="postingan_id" value="<?php echo $row['id']; ?>">
                                                <button class="btn btn-info" >Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: MODAL DELETE STATUS -->

                        <!-- BEGIN: MODAL IGNORE REPORT -->
                        <div class="modal fade" id="ignorePostingan<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content c-square">
                                    <div class="modal-body">
                                        <h3 class="c-font-24 c-font-sbold">Apakah anda yakin ingin mengabaikan laporan untuk postingan id <?php echo $row['id']; ?> ?</h3>
                                        <div class="form-group">
                                            <button  data-dismiss="modal" class="btn btn-danger">Cancel</button>
                                            <form method="POST" action="reportController.php" style="display: inline-block;">
                                                <input type="hidden" name="act" value="ignore_report">
                                                <input type="hidden" name="postingan_id" value="<?php echo $row['id']; ?>">
                                                <button class="btn btn-info" >Abaikan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: MODAL IGNORE REPORT -->

                        <?php
                    }
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>


<?php
include_once 'layout/footer.php';
?>

<script>
    var table = $('#tabel-report').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });
</script>