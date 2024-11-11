<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://smkn4bogor.sch.id/assets/images/background/smkn4bogor_2.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .category-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }
        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.7);
        }
        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #FFD700;
        }
        .btn-primary {
            background-color: #ff5722;
            border-color: #ff5722;
        }
        .btn-primary:hover {
            background-color: #e64a19;
        }
        .img-center {
            display: block;
            margin: 0 auto;
        }
        .modal-content {
            border-radius: 15px;
            backdrop-filter: blur(10px);
            color:black;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-center mb-5">Kategori</h1>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card category-card">
                <img src="img/PPLG.jpg" class="card-img-top img-center" alt="PPLG" data-toggle="modal" data-target="#modalPPLG">
                <div class="card-body">
                    <h5 class="card-title">PPLG</h5>
                    <a href="#" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modalPPLG">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card category-card">
                <img src="https://smkn4bogor.sch.id/assets/images/logo/tjkt.png" class="card-img-top" alt="TJKT" data-toggle="modal" data-target="#modalTJKT">
                <div class="card-body">
                    <h5 class="card-title">TJKT</h5>
                    <a href="#" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modalTJKT">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card category-card">
                <img src="img/TKR.jpg" class="card-img-top" alt="TKR" data-toggle="modal" data-target="#modalTKR">
                <div class="card-body">
                    <h5 class="card-title">TKR</h5>
                    <a href="#" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modalTKR">Lihat</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk PPLG -->
<div class="modal fade" id="modalPPLG" tabindex="-1" role="dialog" aria-labelledby="modalPPLGLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPPLGLabel">Kegiatan Ngajar Mengajar PPLG</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="https://smkn4bogor.sch.id/assets/images/background/pplg_2.jpg" class="img-fluid mt-2" alt="Gambar PPLG 3">
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk TJKT -->
<div class="modal fade" id="modalTJKT" tabindex="-1" role="dialog" aria-labelledby="modalTJKTLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTJKTLabel">Kegiatan Ngajar Mengajar TJKT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="https://smkn4bogor.sch.id/assets/images/background/tjkt_3.jpg" class="img-fluid mt-2" alt="Gambar TJKT 3">
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk TKR -->
<div class="modal fade" id="modalTKR" tabindex="-1" role="dialog" aria-labelledby="modalTKRLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTKRLabel">Kegiatan Ngajar Mengajar TKR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="https://hayoo.id/wp-content/uploads/2022/11/Sukses-Terapkan-Pendidikan-Vokasi-SMKN-4-Bogor-Dilirik-Banyak-Perusahaan-Industri-Ternama-IST-1.jpg" class="img-fluid mt-2" alt="Gambar TKR 3">
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
