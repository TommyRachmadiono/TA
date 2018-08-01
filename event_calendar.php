<?php
session_start();
$_SESSION['menuHeader'] = 'eventCalendar';
include 'config/connectdb.php';
include_once 'layout/header.php';

if ($_SESSION["login"] == false) {
    echo '<script type="text/javascript">alert("Silahkan login terlebih dahulu"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
?>

<div class="c-layout-page">
    <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
    <div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold" style="background-color: cyan;">
        <div class="container">
            <div class="c-page-title c-pull-left">
                <h3 class="c-font-uppercase c-font-sbold">Kalendar Kegiatan Sekolah</h3>
                <h4 class="">Menampilkan tanggal dari kegiatan yang akan diadakan di sekolah</h4>
            </div>
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li>
                    <a href="index.php">Beranda</a>
                </li>
                <li>/</li>
                <li>
                    Kalendar Kegiatan
                </li>
            </ul>
        </div>
    </div>
    <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->

    <div class="container" style="margin-bottom: 3%;">

        <div class="page-header">
            <div class="pull-right form-inline">
                <div class="btn-group">
                    <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
                    <button class="btn btn-default" data-calendar-nav="today">Today</button>
                    <button class="btn btn-primary" data-calendar-nav="next">Next >></button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-warning" data-calendar-view="year">Year</button>
                    <button class="btn btn-warning active" data-calendar-view="month">Month</button>
                    <button class="btn btn-warning" data-calendar-view="week">Week</button>
                    <!-- <button class="btn btn-warning" data-calendar-view="day">Day</button> -->
                </div>
            </div>
            <h3></h3>
            <small>Jangan lewatkan semua kegiatan yang ada</small>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div id="showEventCalendar"></div>
            </div>
            <div class="col-md-3">

                <?php if ($_COOKIE['role'] != 'murid' AND $_COOKIE['role'] != 'ortu') { ?>
                    <a data-toggle="modal" data-target="#create-event" style="width: 100%;"><button class="btn btn-default" style="width: 100%;">
                            <i class="fa fa-calendar-plus-o"> Tambahkan Kegiatan Baru</i>
                        </button></a>
                <?php } ?>

                <a data-toggle="modal" data-target="#detail-event" style="width: 100%;"><button class="btn btn-default" style="width: 100%; margin-top: 6%;">
                        <i class="fa fa-calendar"> Detail Kegiatan</i>
                    </button></a>
                <br><br>
                <h4>Daftar Semua Kegiatan</h4>
                <ul id="eventlist" class="nav nav-list"></ul>
            </div>
        </div>
    </div>	
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>
<?php include_once 'layout/footer.php'; ?>

<!-- MODAL CREATE EVENT -->
<div class="modal fade bs-example-modal-lg" id="create-event" tabindex="-1" role="dialog" style="margin-top: 5%;">
    <div class="modal-dialog">
        <div class="modal-content c-square">
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="c-font-24 c-font-sbold">Tambahkan Kegiatan Baru</h3>
                <form action="add_event.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="act" value="add_event"> <br>

                        <label>Nama Kegiatan</label>
                        <input type="text" class="form-control input-lg c-square" id="event_name" placeholder="Nama Kegiatan" name="event_name" required=""> <br>

                        <label>Deskripsi Kegiatan</label>
                        <textarea class="form-control input-lg c-square" name="event_description" id="event_description" placeholder="Tuliskan Deskripsi Kegiatan Disini (maksimal 500 karakter)" style="resize: none; margin-bottom: 3%;" maxlength="500"></textarea>

                        <label>Tanggal Mulai</label>
                        <input type="date" name="start_date" id="start_date" class="form-control input-lg c-square" min="<?php echo date('Y-m-d'); ?>" required=""> <br>

                        <label>Tanggal Selesai</label>
                        <input type="date" name="end_date" id="end_date" class="form-control input-lg c-square" min="<?php echo date('Y-m-d'); ?>" required="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;" name="create-event" id="create-event">Tambah</button><br><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL CREATE EVENT -->

<!-- MODAL DETAIL EVENT -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" id="detail-event" role="dialog" style="margin-top: 5%;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content c-square">
            <div class="modal-header c-no-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="example3" class="table table-hover table-bordered " width="100%;">
                        <thead>
                            <tr>
                                <th style="text-align: center; "><b>Nama Event</th>
                                <th style="text-align: center;"><b>Deskripsi Event</th>
                                <th style="text-align: center;"><b>Tanggal Mulai</th>
                                <th style="text-align: center;"><b>Tanggal Selesai</th>
                                <?php if ($_SESSION['login'] == true) {
                                    if ($_SESSION['role'] == 'guru') {
                                        ?>
                                        <th style="text-align: center;"><b>Aksi</th>
    <?php }
} ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($conn, "SELECT * FROM events ORDER BY id desc") or die(mysqli_error());
                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $row['title']; ?></td>
                                        <td style="text-align: center;"><?php echo $row['description']; ?></td>
                                        <td style="text-align: center;"><?php echo $row['start_date']; ?></td>
                                        <td style="text-align: center;"><?php echo $row['end_date']; ?></td>
        <?php if ($_COOKIE['role'] == 'guru' || $_COOKIE['role'] == 'admin') { ?>
                                            <td style="text-align: center;">

                                                <form action="delete_event.php" method="POST">
                                                    <input type="hidden" value="<?php echo $row['id']; ?>" name="event_id">
                                                    <button class="btn btn-default">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MODAL DETAIL EVENT -->
<script>
    var table = $('#example3').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    function bukamodal() {
        $("#detail-event").modal();
    }
</script>