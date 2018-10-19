<?php
session_start();
include 'config/connectdb.php';

$act = $_POST["act"];
if ($_SESSION['login'] == true) {

    switch ($act) {
        case 'buat_tugas':
        $namatugas = mysqli_real_escape_string($conn, $_POST["nama_tugas"]);
        $matpel_id = $_SESSION["matpel_id"];
        $week_id = mysqli_real_escape_string($conn, $_POST["week_id"]);


        $sql = "INSERT INTO tugas (namatugas, matpel_id, week_id)
        VALUES ('$namatugas', '$matpel_id', '$week_id')";
        if (mysqli_query($conn, $sql)) {

            $sql2 = "SELECT id FROM tugas ORDER BY id DESC LIMIT 1";
            $result = $conn->query($sql2);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $tugas_id = $row['id'];
                    mkdir('tugas/' . $tugas_id . ' ' . $namatugas);
                }
            }

            $sql3 = "SELECT * FROM kelas";
            $result2 = $conn->query($sql3);
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    $kelas = $row['nama_kelas'];
                    mkdir('tugas/' . $tugas_id . ' ' . $namatugas . '/' . $kelas);
                }
            }
            echo '<script type="text/javascript">alert("Berhasil membuat tugas baru"); </script>';
            echo '<script type="text/javascript"> window.location = "mata_pelajaran.php?id=' . $matpel_id . '" </script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        break;

        case 'delete_tugas':
        $tugas_id = mysqli_real_escape_string($conn, $_POST["tugas_id"]);
        $matpel_id = $_SESSION["matpel_id"];

        $sql2 = "SELECT * FROM tugas WHERE id = '$tugas_id'";
        $result = $conn->query($sql2);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $dir = 'tugas/' . $row['id'] . ' ' . $row['namatugas'];
            }
        }

            //BUAT DELETE SUB-FOLDER + FILE YANG ADA DALAM FOLDER
        function rrmdir($dir) {
            if (is_dir($dir)) {
                $objects = scandir($dir);
                foreach ($objects as $object) {
                    if ($object != "." && $object != "..") {
                        if (is_dir($dir . "/" . $object))
                            rrmdir($dir . "/" . $object);
                        else
                            unlink($dir . "/" . $object);
                    }
                }
                rmdir($dir);
            }
        }

        rrmdir($dir);

        $sql = "DELETE FROM tugas WHERE id = '$tugas_id'";
        if (mysqli_query($conn, $sql)) {
            echo '<script type="text/javascript">alert("Berhasil Menghapus Tugas"); </script>';
            echo '<script type="text/javascript"> window.location = "mata_pelajaran.php?id=' . $matpel_id . '" </script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        break;

        case 'upload_materi':
        $tglupload = date('YmdHis');
        $user_id = $_COOKIE['user_id'];
        $file_name = basename($tglupload . $_FILES["file"]["name"]);
        $matpel_id = $_SESSION["matpel_id"];
        $week_id = mysqli_real_escape_string($conn, $_POST["week_id"]);
        $target_dir = "materi/";
        $target_file = $target_dir . $tglupload . $_FILES['file']['name'];
        $uploadOk = 1;

            //batasi file size 20MB 
        if ($_FILES["file"]["size"] > 20857600) {
            echo '<script type="text/javascript">alert("File terlalu besar"); </script>';
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo '<script type="text/javascript">alert("Gagal Unggah Berkas"); </script>';
            echo '<script type="text/javascript"> window.location = "mata_pelajaran.php?id=' . $matpel_id . '" </script>';
                // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO materi (file, matpel_id, week_id, user_id)
                VALUES ('$file_name', '$matpel_id', '$week_id', '$user_id')";
                if (mysqli_query($conn, $sql)) {
                    echo '<script type="text/javascript">alert("Berhasil Upload Materi"); </script>';
                    echo '<script type="text/javascript"> window.location = "mata_pelajaran.php?id=' . $matpel_id . '" </script>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }
        break;

        case 'delete_materi':
        $matpel_id = $_SESSION["matpel_id"];
        $materi_id = mysqli_real_escape_string($conn, $_POST["materi_id"]);
        $dir = "materi";

        $sql2 = "SELECT * FROM materi WHERE id = '$materi_id'";
        $result = $conn->query($sql2);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $file = $row['file'];
            }
        }

        if (unlink($dir . '/' . $file)) {
            $sql = "DELETE FROM materi WHERE id = '$materi_id'";
            mysqli_query($conn, $sql);
            echo '<script type="text/javascript">alert("Berhasil Menghapus Materi"); </script>';
            echo '<script type="text/javascript"> window.location = "mata_pelajaran.php?id=' . $matpel_id . '" </script>';
        }
        break;

        case 'upload_tugas':
        $tugas_id = mysqli_real_escape_string($conn, $_POST["tugas_id"]);
        $user_id = $_COOKIE['user_id'];
        $kelas = $_COOKIE['nama_kelas'];
        $tgldibuat = date("Y/m/d");
        $tglupload = date("YmdHis");
        $file_name = basename($tglupload . $_FILES["file"]["name"]);

        $sql = "SELECT * FROM tugas WHERE id = '$tugas_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $namatugas = $row['namatugas'];
                $path = "tugas/" . $tugas_id . ' ' . $namatugas . '/' . $kelas . '/';
                $a = "tugas/" . $tugas_id . ' ' . $namatugas . '/' . $kelas;
                $b = "tugas/" . $tugas_id . ' ' . $namatugas;
                if(!is_dir($a)) {
                    mkdir($b);
                    mkdir($a);
                }
                $target_dir = $path;
            }
        }

        $target_file = $target_dir . $tglupload . $_FILES['file']['name'];
        $uploadOk = 1;

            //batasi file size 20MB
        if ($_FILES["file"]["size"] > 20857600) {
            echo '<script type="text/javascript">alert("Your file is too large")</script>';
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo '<script type="text/javascript">alert("Sorry your file is not uploaded")</script>';
                // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO user_has_tugas (user_id, tugas_id, file, tgl_diupload)
                VALUES ('$user_id','$tugas_id','$file_name', '$tgldibuat')";
                if (mysqli_query($conn, $sql)) {
                    echo '<script type="text/javascript">alert("Berhasil Upload Tugas"); </script>';
                    echo '<script type="text/javascript"> window.location = "tugas.php?id=' . $tugas_id . '" </script>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo '<script type="text/javascript">alert("Sorry there was an error uploading your file")</script>';
            }
        }
        break;

        case 'delete_tugas_user':
        $tugas_id = mysqli_real_escape_string($conn, $_POST["tugas_id"]);
        $user_id = $_COOKIE['user_id'];
        $dir;

        $q = "SELECT k.nama_kelas FROM user u INNER JOIN kelas k on u.kelas_id = k.id WHERE u.id = '$user_id'";
        $h = $conn->query($q);
        if ($h->num_rows > 0) {
            while ($r = $h->fetch_assoc()) {
                $namakelas = $r['nama_kelas'];
            }
        }

        $sql2 = "SELECT * FROM tugas WHERE id = '$tugas_id'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $namatugas = $row2['namatugas'];
            }
            $dir = "tugas/" . $tugas_id . ' ' . $namatugas . '/' . $namakelas . '/';
        }

        $sql = "SELECT * FROM user_has_tugas WHERE user_id = '$user_id' AND tugas_id = '$tugas_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $file = $row['file'];
            }
        }

        if (unlink($dir . '/' . $file)) {
            $sql2 = "DELETE FROM user_has_tugas WHERE user_id = '$user_id' AND tugas_id = '$tugas_id'";
            if (mysqli_query($conn, $sql2)) {
                echo '<script type="text/javascript">alert("Berhasil Menghapus Tugas"); </script>';
                echo '<script type="text/javascript"> window.location = "tugas.php?id=' . $tugas_id . '" </script>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        break;

        case 'penilaian':
        $tugas_id = mysqli_real_escape_string($conn, $_POST["tugas_id"]);
        $user_id = mysqli_real_escape_string($conn, $_POST["user_id"]);
        $nilai = mysqli_real_escape_string($conn, $_POST["nilai"]);
        $url = mysqli_real_escape_string($conn, $_POST["url"]);
        $matpel_id = mysqli_real_escape_string($conn, $_POST['matpel_id']);

        $time = date("Y-m-d H:i:s");
        $id_pengirim = $_COOKIE['user_id'];
        $id_penerima = mysqli_real_escape_string($conn, $_POST["ortu_id"]);

        $q = "SELECT * FROM tugas where id = '$tugas_id'";
        if (mysqli_query($conn, $q)) {
            $r = $conn->query($q);
            while ($a = $r->fetch_assoc()) {
                $namatugas = $a['namatugas'];
            }
        }

        $q2 = "SELECT * FROM matpel where id = '$matpel_id'";
        if (mysqli_query($conn, $q2)) {
            $r2 = $conn->query($q2);
            while ($b = $r2->fetch_assoc()) {
                $nama_pelajaran = $b['nama_pelajaran'];
            }
        }

        $reply = "Putra/i anda mendapatkan nilai " . $nilai . " dari tugas <b>" . $namatugas . "</b> pada pelajaran <b>" . $nama_pelajaran . "</b>.";

        $query = "UPDATE user_has_tugas SET nilai = '$nilai' WHERE user_id = '$user_id' AND tugas_id = '$tugas_id'";
        if (mysqli_query($conn, $query)) {
            $sql2 = "SELECT * FROM conversation c INNER JOIN user u on c.id_pengirim = u.id INNER JOIN user us on c.id_penerima = us.id WHERE c.id_pengirim = '$id_pengirim' AND c.id_penerima = '$id_penerima' OR c.id_pengirim = '$id_penerima' AND c.id_penerima = '$id_pengirim'";
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    $c_id = $row2['c_id'];
                }
                $query1 = "INSERT INTO conversation_reply (reply, fk_id_pengirim, time, fk_c_id, seen)
                VALUES ('$reply', '$id_pengirim', '$time', '$c_id', 0)";
                if (mysqli_query($conn, $query1)) {
                    $query2 = "SELECT * FROM notification WHERE c_id = '$c_id' AND id_penerima = '$id_penerima'";
                    $hasil = $conn->query($query2);
                    if ($hasil->num_rows > 0) {
                        while ($row = $hasil->fetch_assoc()) {
                            $notif = $row['n_number'] + 1;
                            $query3 = "UPDATE notification SET n_number='$notif' WHERE c_id = '$c_id' AND id_penerima = '$id_penerima'";
                            if (mysqli_query($conn, $query3)) {
                                echo '<script type="text/javascript">alert("Berhasil Mengupdate Nilai Tugas"); </script>';
                                echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
                            } else {
                                echo "Error: " . $query3 . "<br>" . mysqli_error($conn);
                            }
                        }
                    } else {
                        $query4 = "INSERT INTO notification (c_id, n_number, id_penerima)
                        VALUES ('$c_id', 1, '$id_penerima')";
                        if (mysqli_query($conn, $query4)) {
                            echo '<script type="text/javascript">alert("Berhasil Mengupdate Nilai Tugas"); </script>';
                            echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
                        } else {
                            echo "Error: " . $query4 . "<br>" . mysqli_error($conn);
                        }
                    }
                } else {
                    echo "Error: " . $query1 . "<br>" . mysqli_error($conn);
                }
            } else {
                $sql = "INSERT INTO conversation (id_pengirim, id_penerima, time)
                VALUES ('$id_pengirim', '$id_penerima', '$time')";
                if (mysqli_query($conn, $sql)) {
                    $sql4 = "SELECT c_id from conversation order by c_id DESC limit 1";
                    $result3 = $conn->query($sql4);
                    if ($result3->num_rows > 0) {
                        while ($row3 = $result3->fetch_assoc()) {
                            $c_id = $row3['c_id'];
                        }
                    }
                    $sql3 = "INSERT INTO conversation_reply (reply, fk_id_pengirim, time, fk_c_id, seen)
                    VALUES ('$reply', '$id_pengirim', '$time', '$c_id', 0)";
                    if (mysqli_query($conn, $sql3)) {
                        $sql5 = "INSERT INTO notification (c_id, n_number, id_penerima)
                        VALUES ('$c_id', 1, '$id_penerima')";
                        if (mysqli_query($conn, $sql5)) {
                            echo '<script type="text/javascript">alert("Berhasil Mengupdate Nilai Tugas"); </script>';
                            echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
                        }
                    } else {
                        echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
                    }
                } else {
                    echo '<script type="text/javascript">alert("Berhasil Mengupdate Nilai Tugas"); </script>';
                    echo '<script type="text/javascript"> window.location = "' . $url . '" </script>';
                    // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
        break;

        case 'download_zip':
        $kelas = mysqli_real_escape_string($conn, $_POST["kelas"]);
        $tugas_id = mysqli_real_escape_string($conn, $_POST["tugas_id"]);
        $dir;
        $zip_file;

        $sql2 = "SELECT * FROM kelas WHERE id = '$kelas'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $namakelas = $row2['nama_kelas'];
            }
        }

        $sql = "SELECT * FROM tugas WHERE id = '$tugas_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $namatugas = $row['namatugas'];
            }
            if ($kelas == "NULL") {
                $dir = "tugas/" . $tugas_id . ' ' . $namatugas;
            } else {
                $dir = "tugas/" . $tugas_id . ' ' . $namatugas . '/' . $namakelas;
            }
            $zip_file = $dir . '.zip';
        }

// Get real path for our folder
        $rootPath = realpath($dir);

// Initialize archive object
        $zip = new ZipArchive();
        $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath), RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
                // Skip directories (they would be added automatically)
            if (!$file->isDir()) {
                    // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                    // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }

// Zip archive will be created only after closing object
        $zip->close();

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($zip_file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($zip_file));
        readfile($zip_file);
        unlink($zip_file);
        break;

        case 'add_matpel':
        $nama_pelajaran = mysqli_real_escape_string($conn, ucfirst(strtolower($_POST["nama_matpel"])));
        $jenjang_id = mysqli_real_escape_string($conn, $_POST["jenjang"]);
        $jurusan = mysqli_real_escape_string($conn, $_POST["jurusan"]);
        $namakelas = $jenjang_id . ' ' . $jurusan;

        $query = "SELECT * FROM matpel WHERE nama_pelajaran = '$nama_pelajaran' AND jenjang_id = '$jenjang_id' AND jurusan = '$jurusan'";
        $hasil = $conn->query($query);
        if($hasil->num_rows > 0) {
            echo '<script type="text/javascript">alert("Sudah ada nama pelajaran itu, silahkan cari nama lain") </script>';
            echo '<script type="text/javascript"> window.location = "master_matpel.php" </script>';
        } else {

            $sql = "INSERT INTO matpel (nama_pelajaran, jenjang_id, jurusan)
            VALUES ('$nama_pelajaran', '$jenjang_id', '$jurusan')";

            if (mysqli_query($conn, $sql)) {
                $sql2 = "SELECT id FROM matpel ORDER BY id DESC LIMIT 1";
                $result = $conn->query($sql2);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $matpel_id = $row['id'];
                    }
                }

                $query2 = "SELECT u.id, k.nama_kelas FROM user u INNER JOIN kelas k on u.kelas_id = k.id WHERE u.role = 'murid' AND k.nama_kelas LIKE '%$namakelas%'";
                $hasil2 = $conn->query($query2);
                if ($hasil2->num_rows > 0) {
                    while ($r = $hasil2->fetch_assoc()) {
                        $user_id = $r['id'];

                        $query3 = "INSERT INTO relasi_user_matpel (user_id, matpel_id)
                        VALUES ('$user_id', '$matpel_id')";
                        mysqli_query($conn, $query3);
                    }
                }

                $sql3 = "INSERT INTO matpel_has_week (matpel_id, week_id, title, description)
                VALUES 
                ('$matpel_id', '1', '',''),
                ('$matpel_id', '2', '',''),
                ('$matpel_id', '3', '',''),
                ('$matpel_id', '4', '',''),
                ('$matpel_id', '5', '',''),
                ('$matpel_id', '6', '',''),
                ('$matpel_id', '7', '',''),
                ('$matpel_id', '8', '',''),
                ('$matpel_id', '9', '',''),
                ('$matpel_id', '10', '',''),
                ('$matpel_id', '11', '',''),
                ('$matpel_id', '12', '',''),
                ('$matpel_id', '13', '',''),
                ('$matpel_id', '14', '','')";

                if (mysqli_query($conn, $sql3)) {
                    echo '<script type="text/javascript">alert("Berhasil menambah matpel baru") </script>';
                     // echo '<script type="text/javascript">alert("'.$jenjang_id.'") </script>';
                     // echo '<script type="text/javascript">alert("'.$nama_pelajaran.'") </script>';
                     // echo '<script type="text/javascript">alert("'.$jurusan.'") </script>';
                    echo '<script type="text/javascript"> window.location = "master_matpel.php" </script>';
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }

        break;

        case 'edit_matpel':
        $matpel_id = mysqli_real_escape_string($conn, $_POST["matpel_id"]);
        $nama_pelajaran = mysqli_real_escape_string($conn, $_POST["nama_matpel"]);
        $sql = "UPDATE matpel SET nama_pelajaran = '$nama_pelajaran' WHERE id = '$matpel_id'";
        if (mysqli_query($conn, $sql)) {
            echo '<script type="text/javascript">alert("Berhasil Mengupdate Nama Pelajaran"); </script>';
            echo '<script type="text/javascript"> window.location = "master_matpel.php" </script>';
        }
        break;

        case 'delete_matpel':
        $matpel_id = mysqli_real_escape_string($conn, $_POST["matpel_id"]);
        $dir = "materi";

        $query = "SELECT * FROM materi WHERE matpel_id = '$matpel_id'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $file = $row['file'];
                if (isset($file))
                    unlink($dir . '/' . $file);
            }
        }


                    //BUAT DELETE SUB-FOLDER + FILE YANG ADA DALAM FOLDER
        function rrmdir($dir) {
            if (is_dir($dir)) {
                $objects = scandir($dir);
                foreach ($objects as $object) {
                    if ($object != "." && $object != "..") {
                        if (is_dir($dir . "/" . $object))
                            rrmdir($dir . "/" . $object);
                        else
                            unlink($dir . "/" . $object);
                    }
                }
                rmdir($dir);
            }
        }

        $query2 = "SELECT * FROM tugas WHERE matpel_id = '$matpel_id'";
        $result2 = $conn->query($query2);
        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $dir = 'tugas/' . $row2['id'] . ' ' . $row2['namatugas'];
                rrmdir($dir);
            }
        }


        $sql = "DELETE FROM matpel_has_week WHERE matpel_id = '$matpel_id'";
        if (mysqli_query($conn, $sql)) {
            $sql2 = "DELETE FROM matpel WHERE id = '$matpel_id'";
            if (mysqli_query($conn, $sql2)) {
                echo '<script type="text/javascript">alert("Berhasil menghapus matpel"); </script>';
                echo '<script type="text/javascript"> window.location = "master_matpel.php" </script>';
            }
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        break;

        case 'edit_topik':
        $matpel_id = mysqli_real_escape_string($conn, $_POST["matpel_id"]);
        $week_id = mysqli_real_escape_string($conn, $_POST["week_id"]);
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $description = mysqli_real_escape_string($conn, $_POST["description"]);

        $sql = "UPDATE matpel_has_week SET title = '$title', description = '$description' WHERE matpel_id = '$matpel_id' AND week_id = '$week_id'";
        if (mysqli_query($conn, $sql)) {
            echo '<script type="text/javascript">alert("Berhasil Mengupdate Topik dan Deskripsi Week' . $week_id . '") </script>';
            echo '<script type="text/javascript"> window.location = "mata_pelajaran.php?id=' . $matpel_id . '" </script>';
        }
        break;
    }
} else {
    echo '<script type="text/javascript">alert("Silahkan Login Terlebih Dahulu"); </script>';
    echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
?>
