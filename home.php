<?php
// Mulai sesi
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Sertakan skrip koneksi database
include 'koneksi.php'; // Pastikan ini berisi kode koneksi DB

// Cek apakah sesi pengguna sudah diatur
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Cek koneksi database
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            font-family: 'Arial', sans-serif;
        }

        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://smkn4bogor.sch.id/assets/images/background/smkn4bogor_2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            filter: blur(8px);
            z-index: -1;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .col-xl-3, .col-md-6 {
            flex: 1;
            margin: 10px;
            min-width: 220px;
            max-width: 300px;
        }

        .card {
            border: none;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        }

        .bg-sky-blue {
            background-color: #87CEEB !important;
        }

        .bg-turquoise-green {
            background-color: #40E0D0 !important;
        }

        .bg-pink {
            background-color: #FFC0CB !important;
        }

        .bg-light-gray {
            background-color: #D3D3D3 !important;
            color: #333;
        }

        .card-body {
            padding: 20px;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        footer {
            background-color: #343a40;
            text-align: center;
            padding: 10px;
        }

        .footer-text {
            color: #adb5bd;
        }

        .card-footer {
            background-color: transparent;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            z-index: 2;
        }

        /* Gaya untuk profil pengguna */
        .profile-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
        }

        .profile-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 1.5em;
        }

        .table th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="background-container"></div>
    <div class="content">
        <h1 class="mt-4">Dashboard</h1>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-sky-blue text-dark mb-4">
                    <div class="card-body">
                        <?php
                            $result = mysqli_query($koneksi, "SELECT * FROM kategori");
                            if ($result) {
                                echo mysqli_num_rows($result);
                            } else {
                                echo "Error: " . mysqli_error($koneksi);
                            }
                        ?>
                        <h5>Total Kategori</h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="#">Lihat Detail</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-turquoise-green text-dark mb-4">
                    <div class="card-body">
                        <?php
                            $result = mysqli_query($koneksi, "SELECT * FROM album");
                            if ($result) {
                                echo mysqli_num_rows($result);
                            } else {
                                echo "Error: " . mysqli_error($koneksi);
                            }
                        ?>
                        <h5>Total Album</h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="#">Lihat Detail</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-pink text-dark mb-4">
                    <div class="card-body">
                        <?php
                            $result = mysqli_query($koneksi, "SELECT * FROM komentar");
                            if ($result) {
                                echo mysqli_num_rows($result);
                            } else {
                                echo "Error: " . mysqli_error($koneksi);
                            }
                        ?>
                        <h5>Total Komentar</h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="#">Lihat Detail</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-light-gray text-dark mb-4">
                    <div class="card-body">
                        <?php
                            $result = mysqli_query($koneksi, "SELECT * FROM user");
                            if ($result) {
                                echo mysqli_num_rows($result);
                            } else {
                                echo "Error: " . mysqli_error($koneksi);
                            }
                        ?>
                        <h5>Total User</h5>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="#">Lihat Detail</a>
                        <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card profile-card shadow-lg">
            <div class="profile-header">
                Profil Pengguna
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td width="200"><strong>Nama</strong></td>
                        <td width="1">:</td>
                        <td><?php echo htmlspecialchars($_SESSION['user']['nama']); ?></td>
                    </tr>
                    <tr>
                        <td width="200"><strong>Level User</strong></td>
                        <td width="1">:</td>
                        <td><?php echo htmlspecialchars($_SESSION['user']['level']); ?></td>
                    </tr>
                    <tr>
                        <td width="200"><strong>Tanggal Login</strong></td>
                        <td width="1">:</td>
                        <td><?php echo date('d-m-Y'); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-text">© 2024 Dashboard. All rights reserved.</div>
    </footer>
</body>
</html>
