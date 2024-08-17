<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>AL-Qur'an Digital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .navbar {
      box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
    }

    .card {
      transition: transform 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .arabic-text {
      font-size: 1.5rem;
      direction: rtl;
      padding-right: 10px;
    }

    .float-btn {
      position: fixed;
      width: 60px;
      height: 60px;
      bottom: 40px;
      right: 40px;
      background-color: #25d366;
      color: #FFF;
      border-radius: 50px;
      text-align: center;
      box-shadow: 2px 2px 3px #999;
      display: none;
    }

    .float-btn i {
      margin-top: 22px;
    }

    #ayat-container {
      max-height: 70vh;
      overflow-y: auto;
      padding-right: 10px;
    }

    #ayat-list {
      padding-right: 10px;
    }

    /* Untuk semua scrollbar */
    * {
      scrollbar-width: thin;
      scrollbar-color: #888 #f8f9fa;
    }

    /* Untuk scrollbar di WebKit (Chrome, Safari) */
    *::-webkit-scrollbar {
      width: 8px;
    }

    *::-webkit-scrollbar-track {
      background: #f8f9fa;
    }

    *::-webkit-scrollbar-thumb {
      background-color: #888;
      border-radius: 10px;
      border: 2px solid #f8f9fa;
    }
  </style>
</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar bg-success">
    <div class="container">
      <a class="navbar-brand h1 text-white" href="#" id="home-link"><i class="fas fa-quran me-2"></i>AL-Qur'an Digital</a>
    </div>
  </nav>
  <!-- Navbar End -->

  <div class="container mt-4">
    <div id="surah-page">
      <h1 class="text-center mb-4">Daftar Surah Al-Qur'an</h1>

      <!-- Start Search -->
      <div class="row justify-content-center mb-4">
        <div class="col-md-8">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cari Surat" aria-label="Cari Surat" aria-describedby="search-input" id="search-input">
            <button class="btn btn-success" type="button" id="search-button"><i class="fas fa-search"></i> Cari</button>
          </div>
        </div>
      </div>
      <!-- End Search -->

      <!-- List Surah -->
      <?php include 'ayat.php'; ?>
      <!-- End List Surah -->
    </div>

    <!-- List Ayat Start -->
    <div id="ayat-page" style="display: none;">
      <h2 class="text-center mb-3" id="surah-title"></h2>
      <button class="btn btn-secondary mb-3" id="back-button"><i class="fas fa-arrow-left"></i> Kembali ke Daftar Surah</button>
      <div class="card">
        <div class="card-body">
          <ul class="list-group list-group-flush float-start" id="ayat-list"></ul>
        </div>
      </div>
    </div>
    <!-- List Ayat End -->

  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="index.js"></script>
</body>

</html>