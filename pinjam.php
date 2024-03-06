<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konfirmasi Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
      body {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
        background-color: #1C2526;
      }

      .custom-container {
        max-width: 400px;
        width: 100%;
        background-color: #000;
        padding: 20px;
        border-radius: 10px;
        color: #fff;
      }
    </style>
  </head>
  <body>
    <div class="container mt-5 custom-container">
      <h2>Konfirmasi Peminjaman</h2>
      
      <form>
        <div class="mb-3">
          <label for="tanggalPeminjaman" class="form-label">Tanggal Peminjaman</label>
          <input type="date" class="form-control" id="tanggalPeminjaman" required>
        </div>
        
        <div class="mb-3">
          <label for="pilihanPeminjaman" class="form-label">Pilihan Peminjaman Hingga</label>
          <select class="form-select" id="pilihanPeminjaman" required>
            <option value="1">1 Hari</option>
            <option value="2">2 Hari</option>
            <option value="3">3 Hari</option>
          </select>
        </div>
        
        <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#konfirmasiModal">Konfirmasi</button>
        
        <div class="modal fade" id="konfirmasiModal" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="konfirmasiModalLabel" style="color: black;">Konfirmasi Peminjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p style="color: black;">Peminjaman berhasil dikonfirmasi!</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
<a href="manga.html"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#batalModal">Batal</button></a>       
        <div class="modal fade" id="batalModal" tabindex="-1" aria-labelledby="batalModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="batalModalLabel">Batal Peminjaman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Peminjaman dibatalkan.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
        
      </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
