<?php
session_start();
$_SESSION['menuHeader'] = 'tugas';
include 'config/connectdb.php';
include_once 'layout/header.php';
$kelas="";

if ($_SESSION["login"] == false) {
    echo '<script type="text/javascript">alert("Silahkan login terlebih dahulu"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}

if (isset($_GET["id"])) {
    $tugas_id = $_GET["id"];
    $user_id = $_COOKIE['user_id'];
    $matpel_id = $_SESSION['matpel_id'];

    $sql = "SELECT * FROM relasi_user_matpel rum INNER JOIN tugas t on rum.matpel_id = t.matpel_id WHERE rum.user_id = '$user_id' AND t.id='$tugas_id'";
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
                        <span class="glyphicon glyphicon-cloud-upload"></span> Pengumpulan Tugas
                    </h3>
                    <h4>Tugas Sekolah</h4>
                </div>
                <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>/</li>
                    <li>
                        <?php
                        $sql = "SELECT * FROM matpel WHERE id = '$matpel_id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <a href="mata_pelajaran.php?id=<?php echo $matpel_id; ?>"> <?php echo $row['nama_pelajaran']; ?></a>
                                <?php
                            }
                        }
                        ?>
                    </li>
                    <li>/</li>
                    <?php
                    $sql = "SELECT * FROM `tugas` WHERE id = '$tugas_id'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <li class="c-state_active"><?php echo $row['namatugas']; ?></li>
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
        <div class="c-content-box c-size-md c-bg-white">
            <div class="container">
                <?php if ($_COOKIE['role'] === 'murid') { ?>
                    <div class="panel panel-success" style="width: 100%;">
                        <div class="panel-heading">
                            <h3 class="panel-title"><h3 style="text-align: center;">Upload Tugas Sekolah</h3>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            $sql = "SELECT * FROM user_has_tugas WHERE user_id = '$user_id' AND tugas_id = '$tugas_id'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>

                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">File Yang Sudah Terupload
                                                <a class="anchorjs-link" href="#panel-title">
                                                    <span class="anchorjs-icon"></span>
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label style="margin-right: 4.5%;">Nama File  </label>: <?php echo $row['file']; ?> <br>
                                                <label style="">Tanggal Upload : </label> <?php echo $row['tgl_diupload']; ?> <br>
                                                <label style="margin-right: 8.3%;">Nilai</label> : <?php echo $row['nilai']; ?> <br>
                                                <form action="matpelController.php" method="POST">
                                                    <input type="hidden" name="act" value="delete_tugas_user">
                                                    <input type="hidden" name="tugas_id" value="<?php echo $tugas_id; ?>">
                                                    <button class="btn btn-info" style="margin-top: 1%; margin-bottom: 0">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="matpelController.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Upload File Tugas</label>
                                            <div class="col-md-7">
                                                <input class="form-control  c-square c-theme" type="file" name="file" style="display: inline;" required="" disabled="">
                                                <span class="help-block">Max 20MB</span>
                                                <input type="submit" value="Upload" name="" class="btn btn-primary" disabled="">
                                                Delete your uploaded file first before upload a new assignment
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                }
                            } else {
                                ?>
                                <form action="matpelController.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Upload File Tugas</label>
                                        <div class="col-md-7">
                                            <input type="hidden" name="act" value="upload_tugas">
                                            <input type="hidden" name="tugas_id" value="<?php echo $tugas_id; ?>">
                                            <input class="form-control  c-square c-theme" type="file" name="file" style="display: inline;" required="">
                                            <span class="help-block">Max 20MB</span>
                                            <input type="submit" value="Upload" name="" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Dashboard Guru
                                <a class="anchorjs-link" href="#panel-title">
                                    <span class="anchorjs-icon"></span>
                                </a>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            if (isset($_GET['select-kelas'])) {
                                $kelas = $_GET['select-kelas'];
                                if ($kelas != "") {
                                    $query = mysqli_query($conn, "SELECT uht.user_id, u.nama, uht.file, uht.tgl_diupload, uht.nilai, t.namatugas, k.nama_kelas as kelas FROM tugas t INNER JOIN user_has_tugas uht ON t.id = uht.tugas_id INNER JOIN user u ON u.id = uht.user_id INNER JOIN kelas k ON k.id = u.kelas_id WHERE t.id = '$tugas_id' AND k.nama_kelas = '$kelas'") or die(mysqli_error());
                                } else {
                                    $query = mysqli_query($conn, "SELECT uht.user_id, u.nama, uht.file, uht.tgl_diupload, uht.nilai, t.namatugas, k.nama_kelas as kelas FROM tugas t INNER JOIN user_has_tugas uht ON t.id = uht.tugas_id INNER JOIN user u ON u.id = uht.user_id INNER JOIN kelas k ON k.id = u.kelas_id WHERE t.id = '$tugas_id'") or die(mysqli_error());
                                }
                            } else {
                                $query = mysqli_query($conn, "SELECT uht.user_id, u.nama, uht.file, uht.tgl_diupload, uht.nilai, t.namatugas, k.nama_kelas as kelas FROM tugas t INNER JOIN user_has_tugas uht ON t.id = uht.tugas_id INNER JOIN user u ON u.id = uht.user_id INNER JOIN kelas k ON k.id = u.kelas_id WHERE t.id = '$tugas_id'") or die(mysqli_error());
                            }

                            if (mysqli_num_rows($query) > 0) {
                                ?>

                                <form method="POST" action="matpelController.php" enctype="multipart/form-data" style="display: inline-block;">
                                	<input type="hidden" name="kelas" value="<?php echo $kelas ?>">
                                    <input type="hidden" name="act" value="download_zip">
                                    <input type="hidden" name="tugas_id" value="<?php echo $tugas_id; ?>">
                                    <input type="submit" class="btn btn-info" value="Download All File" style="display: inline;">
                                </form>

                                <button class="btn btn-info" data-toggle="modal" data-target="#quick-grade" style="vertical-align: top !important; margin-left: 1%;">Quick Grade</button>

                                <form method="GET" action="tugas.php" enctype="multipart/form-data" style="display: inline-block; margin-left: 2%;">
                                    <input type="hidden" name="id" value="<?php echo $tugas_id; ?>">
                                    <select name="select-kelas" id="select-kelas" >
                                        <option value="" selected disabled="">-- Select Kelas --</option> 
                                        <option value="">All</option>
                                        <?php
                                        $sql = "select * from kelas";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row['nama_kelas']; ?>"><?php echo $row['nama_kelas']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <button class="btn btn-info">Select</button>
                                </form>

                            <?php } else { ?>
                                <button class="btn btn-info" disabled="">Download All File</button>
                                <button class="btn btn-info" data-toggle="modal" data-target="#quick-grade" disabled="">Quick Grade</button>
                                <form method="GET" action="tugas.php" enctype="multipart/form-data" style="display: inline-block; margin-left: 2%;">
                                    <input type="hidden" name="id" value="<?php echo $tugas_id; ?>">
                                    <select name="select-kelas" id="select-kelas" >
                                        <option value="" selected disabled="">-- Select Kelas --</option> 
                                        <option value="">All</option>
                                        <?php
                                        $sql = "select * from kelas";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $row['nama_kelas']; ?>"><?php echo $row['nama_kelas']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <button class="btn btn-info">Select</button>
                                </form>
                            <?php } ?>


                            <table id="tabel-tugas" class="table table-hover table-bordered" width="100%;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">User</th>
                                        <th style="text-align: center;">File</th>
                                        <th style="text-align: center;">Tanggal Upload</th>
                                        <th style="text-align: center;">Nilai</th>
                                        <th style="text-align: center;">Kelas</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_GET['select-kelas'])) {
                                        $kelas = $_GET['select-kelas'];
                                        if ($kelas != "") {
                                            $sql2 = "SELECT uht.user_id, u.nama, uht.file, uht.tgl_diupload, uht.nilai, t.namatugas, k.nama_kelas as kelas FROM tugas t INNER JOIN user_has_tugas uht ON t.id = uht.tugas_id INNER JOIN user u ON u.id = uht.user_id INNER JOIN kelas k ON k.id = u.kelas_id WHERE t.id = '$tugas_id' AND k.nama_kelas = '$kelas'";
                                        } else {
                                            $sql2 = "SELECT uht.user_id, u.nama, uht.file, uht.tgl_diupload, uht.nilai, t.namatugas, k.nama_kelas as kelas FROM tugas t INNER JOIN user_has_tugas uht ON t.id = uht.tugas_id INNER JOIN user u ON u.id = uht.user_id INNER JOIN kelas k ON k.id = u.kelas_id WHERE t.id = '$tugas_id'";
                                        }
                                    } else {
                                        $sql2 = "SELECT uht.user_id, u.nama, uht.file, uht.tgl_diupload, uht.nilai, t.namatugas, k.nama_kelas as kelas FROM tugas t INNER JOIN user_has_tugas uht ON t.id = uht.tugas_id INNER JOIN user u ON u.id = uht.user_id INNER JOIN kelas k ON k.id = u.kelas_id WHERE t.id = '$tugas_id'";
                                    }
                                    $result2 = $conn->query($sql2);
                                    if ($result2->num_rows > 0) {
                                        while ($row2 = $result2->fetch_assoc()) {
                                        	$nama_kelas = $row2['kelas'];
                                            $namatugas = $row2['namatugas'];
                                            $file = $row2['file'];
                                            $path = 'tugas/' . $tugas_id . ' ' . $namatugas . '/' . $nama_kelas . '/'.$file;
                                            ?>

                                            <tr>
                                                <th style="text-align: center;"><?php echo $row2['nama'] ?></th>
                                                <td style="text-align: center;"><a href="<?php echo $path; ?>" download=""><?php echo $file ?></a></td>
                                                <td style="text-align: center;"><?php echo $row2['tgl_diupload']; ?></td>
                                                <td style="text-align: center;"><?php echo $row2['nilai']; ?></td>
                                                <td style="text-align: center;"><?php echo $row2['kelas']; ?></td>
                                                <td style="text-align: center;">
                                                    <a data-toggle="modal" data-target="#grading<?php echo $row2['user_id']; ?>"> <button type="button" class="btn btn-info" value="<?php echo $row['user_id']; ?>">
                                                            Grading
                                                        </button></a>
                                                </td>
                                            </tr>

                                            <!-- MODAL GRADING -->
                                        <div class="modal fade c-content-login-form" id="grading<?php echo $row2['user_id']; ?>" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content c-square">
                                                    <div class="modal-header c-no-border">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h3 class="c-font-24 c-font-sbold">Penilaian Untuk User<br> <?php echo $row2['nama']; ?></h3>
                                                        <form action="matpelController.php" method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="buat-tugas" class="">Masukkan Nilai</label>
                                                                <input type="number" class="form-control input-lg c-square" placeholder="Input Nilai" name="nilai" required="" min="0" max="100"> 
                                                                <input type="hidden" name="tugas_id" value="<?php echo $tugas_id; ?>">
                                                                <input type="hidden" name="user_id" value="<?php echo $row2['user_id']; ?>">
                                                                <input type="hidden" name="act" value="penilaian">
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;" name="buat-tugas">Update</button><br><br>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END MODAL GRADING -->
                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                <?php } ?>
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
include_once 'layout/footer.php';
?>

<script>
    var table = $('#tabel-tugas').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

</script>

<div class="modal fade c-content-login-form" id="quick-grade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="c-font-24 c-font-sbold">Penilaian Untuk Semua User</h3>
                <form action="matpelController.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="buat-tugas" class="">Masukkan Nilai</label>
                        <input type="number" class="form-control input-lg c-square" placeholder="Input Nilai" name="nilai" required="" max="100" min="0" /> 
                        <input type="hidden" name="tugas_id" value="<?php echo $tugas_id; ?>">
                        <input type="hidden" name="act" value="penilaian_massal">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;" name="buat-tugas">Update</button><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>