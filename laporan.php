<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://smkn4bogor.sch.id/assets/images/background/smkn4bogor_2.jpg'); /* Gambar latar belakang */
            background-size: cover; /* Mengatur gambar agar memenuhi seluruh area */
            background-position: center; /* Menempatkan gambar di tengah */
        }
        .profile-container {
            background-color: rgba(248, 249, 250, 0.8); /* Warna latar belakang transparan */
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .rounded-circle {
            width: 300px;
            height: 300px;
            object-fit: cover;
        }
        .social-buttons a {
            margin-right: 10px;
        }
        .social-buttons .btn {
            transition: transform 0.2s;
        }
        .social-buttons .btn:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>

<div class="container mt-4 profile-container">
    <div class="text-center">
        <img src="img/budin.jpeg" class="img-fluid rounded-circle" alt="Gambar Profil">
        <h1 class="mt-4">Nama Pengguna</h1>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <p><strong>Email:</strong> fauzanraja79@gmail.com</p>
            <p><strong>Deskripsi:</strong> Ini adalah deskripsi singkat tentang pengguna. Misalnya, hobi, pekerjaan, atau minat.</p>
            <h3>Media Sosial</h3>
            <div class="social-buttons">
                <a href="#" class="btn btn-primary">Facebook</a>
                <a href="#" class="btn btn-info">Twitter</a>
                <a href="#" class="btn btn-danger">Instagram</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
