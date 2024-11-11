<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komentar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('https://smkn4bogor.sch.id/assets/images/background/smkn4bogor_2.jpg');
            background-size: cover;
            background-position: center;
            color: #333;
        }
        .list-group-item {
            background-color: rgba(255, 255, 255, 0.8);
            border-left: 5px solid #007bff;
            transition: transform 0.2s, background-color 0.2s;
        }
        .list-group-item:hover {
            background-color: #e9ecef;
            transform: scale(1.02);
        }
        h1 {
            color: #007bff;
        }

        /* Gaya khusus untuk komentar tertentu */
        .list-group-item.special {
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            border-left: 8px solid #ff8c00;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            position: relative;
            padding-left: 20px;
            color: #ffffff;
            animation: glow 1s ease-in-out infinite alternate;
        }

        /* Animasi glow */
        @keyframes glow {
            from {
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            }
            to {
                box-shadow: 0 4px 20px rgba(255, 140, 0, 0.7);
            }
        }

        /* Ikon di sebelah kiri komentar khusus */
        .list-group-item.special::before {
            content: '🌟';
            font-size: 30px;
            position: absolute;
            top: 10px;
            left: -15px;
            color: #ff8c00;
        }

        .list-group-item small {
            transition: color 0.2s, transform 0.2s;
        }

        .list-group-item small:hover {
            color: #ff8c00;
            transform: scale(1.1);
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h1 class="mt-4">Komentar</h1>
    <div class="list-group" id="commentList">
        <!-- Komentar akan ditambahkan di sini menggunakan JavaScript -->
    </div>
    
    <!-- Form Tambah Komentar -->
    <div class="card mt-4">
        <div class="card-body">
            <h3>Tambah Komentar Baru</h3>
            <form id="commentForm">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" placeholder="Masukkan nama" required>
                </div>
                <div class="form-group">
                    <label for="comment">Komentar</label>
                    <textarea class="form-control" id="comment" rows="3" placeholder="Tulis komentar Anda" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan Komentar</button>
            </form>
        </div>
    </div>
</div>

<script>
    const commentForm = document.getElementById('commentForm');
    const commentList = document.getElementById('commentList');
    const nameInput = document.getElementById('name');
    const commentInput = document.getElementById('comment');

    // Fungsi untuk menyimpan komentar ke localStorage
    function saveCommentsToLocalStorage(comments) {
        localStorage.setItem('comments', JSON.stringify(comments));
    }

    // Fungsi untuk mendapatkan komentar dari localStorage
    function getCommentsFromLocalStorage() {
        const comments = localStorage.getItem('comments');
        return comments ? JSON.parse(comments) : [];
    }

    // Fungsi untuk menampilkan komentar
    function displayComment(name, comment, date, index, isSpecial = false) {
        const commentItem = document.createElement('div');
        commentItem.classList.add('list-group-item');
        if (isSpecial) commentItem.classList.add('special');
        commentItem.innerHTML = `
            <h5 class="mb-1">${name}</h5>
            <p class="mb-1">${comment}</p>
            <small>Waktu: ${date}</small>
            <button class="btn btn-danger btn-sm float-right" onclick="deleteComment(${index})">Hapus</button>
        `;
        commentList.appendChild(commentItem);
    }

    // Event listener untuk menambah komentar
    commentForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const name = nameInput.value;
        const comment = commentInput.value;
        const date = new Date().toLocaleDateString('id-ID', { day: '2-digit', month: 'long', year: 'numeric' });

        const comments = getCommentsFromLocalStorage();
        comments.push({ name, comment, date });
        saveCommentsToLocalStorage(comments);

        displayComment(name, comment, date, comments.length - 1, name.toLowerCase() === 'ariq');
        
        // Bersihkan form
        commentForm.reset();
    });

    // Fungsi untuk menghapus komentar
    function deleteComment(index) {
        const comments = getCommentsFromLocalStorage();
        comments.splice(index, 1); // Hapus komentar dari array
        saveCommentsToLocalStorage(comments); // Simpan perubahan ke localStorage

        // Perbarui daftar komentar
        renderComments();
    }

    // Fungsi untuk merender ulang komentar dari localStorage
    function renderComments() {
        commentList.innerHTML = '';
        const comments = getCommentsFromLocalStorage();
        comments.forEach((comment, index) => {
            displayComment(comment.name, comment.comment, comment.date, index, comment.name.toLowerCase() === 'ariq');
        });
    }

    // Fungsi untuk menyimpan isi form ke localStorage sebagai draft
    function saveDraft() {
        const draft = {
            name: nameInput.value,
            comment: commentInput.value
        };
        localStorage.setItem('draft', JSON.stringify(draft));
    }

    // Fungsi untuk memuat draft dari localStorage (jika ada)
    function loadDraft() {
        const draft = localStorage.getItem('draft');
        if (draft) {
            const { name, comment } = JSON.parse(draft);
            nameInput.value = name || '';
            commentInput.value = comment || '';
        }
    }

    // Saat input berubah, simpan ke draft
    nameInput.addEventListener('input', saveDraft);
    commentInput.addEventListener('input', saveDraft);

    // Saat halaman dimuat, ambil dan tampilkan komentar dari localStorage, lalu muat draft (jika ada)
    window.onload = function() {
        renderComments();
        loadDraft();
    };
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
