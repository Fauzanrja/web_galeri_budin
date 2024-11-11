<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('https://smkn4bogor.sch.id/assets/images/background/smkn4bogor_2.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }
        h1 {
            font-weight: 600;
            color: #fff;
        }
        .album-card {
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }
        .album-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        .album-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        .album-card:hover .album-image {
            transform: scale(1.1);
        }
        .card-body {
            background-color: rgba(255, 255, 255, 0.8);
            color: #333;
            padding: 15px;
            text-align: center;
        }
        .card-title {
            font-weight: 600;
            color: #333;
        }
        .btn-primary {
            background: linear-gradient(to right, #00b4db, #0083b0);
            border: none;
            transition: background 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #0083b0, #00b4db);
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h1 class="text-center mb-4">Daftar Album</h1>
    
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="text-dark">Tambah Album Baru</h3>
            <form id="albumForm">
                <div class="form-group">
                    <label for="albumName" class="text-dark">Nama Album</label>
                    <input type="text" class="form-control" id="albumName" placeholder="Masukkan nama album" required>
                </div>
                <div class="form-group">
                    <label for="albumImage" class="text-dark">URL Gambar Album</label>
                    <input type="url" class="form-control" id="albumImage" placeholder="Masukkan URL gambar album" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Album</button>
            </form>
        </div>
    </div>
    
    <div class="row" id="albumList">
    </div>
</div>

<script>
    const albumForm = document.getElementById('albumForm');
    const albumList = document.getElementById('albumList');

    // Fungsi untuk menyimpan album ke localStorage
    function saveAlbumsToLocalStorage(albums) {
        localStorage.setItem('albums', JSON.stringify(albums));
    }

    // Fungsi untuk mendapatkan album dari localStorage
    function getAlbumsFromLocalStorage() {
        const albums = localStorage.getItem('albums');
        return albums ? JSON.parse(albums) : [];
    }

    // Fungsi untuk menampilkan album
    function displayAlbum(albumName, albumImage) {
        const albumCard = document.createElement('div');
        albumCard.classList.add('col-md-4', 'album-card');
        albumCard.innerHTML = `
            <div class="card">
                <img src="${albumImage}" class="card-img-top album-image" alt="${albumName}">
                <div class="card-body">
                    <h5 class="card-title">${albumName}</h5>
                    <button class="btn btn-danger" onclick="removeAlbum(this, '${albumName}')">Hapus Album</button>
                </div>
            </div>
        `;
        albumList.appendChild(albumCard);
    }

    // Event listener untuk menambah album
    albumForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const albumName = document.getElementById('albumName').value;
        const albumImage = document.getElementById('albumImage').value;

        displayAlbum(albumName, albumImage);

        const albums = getAlbumsFromLocalStorage();
        albums.push({ name: albumName, image: albumImage });
        saveAlbumsToLocalStorage(albums);

        albumForm.reset();
    });

    // Fungsi untuk menghapus album dan memperbarui localStorage
    function removeAlbum(button, albumName) {
        const albumCard = button.closest('.album-card');
        albumCard.remove();

        let albums = getAlbumsFromLocalStorage();
        albums = albums.filter(album => album.name !== albumName);
        saveAlbumsToLocalStorage(albums);
    }

    // Saat halaman dimuat, ambil album dari localStorage dan tampilkan
    window.onload = function() {
        const albums = getAlbumsFromLocalStorage();
        albums.forEach(album => displayAlbum(album.name, album.image));
    };
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
