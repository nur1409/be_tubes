<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login PIPGuard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e5f2ff;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }
    .card {
      background: #ffffff;
      border-radius: 12px;
      padding: 24px;
      margin: 12px;
      width: 320px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    .card h2 {
      margin-bottom: 8px;
      font-size: 20px;
      color: #00529B;
    }
    .card p {
      font-size: 14px;
      margin-bottom: 16px;
    }
    .card input, .card select, .card button {
      width: 100%;
      padding: 10px;
      margin-bottom: 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    .card button {
      background-color: #00529B;
      color: white;
      font-weight: bold;
      border: none;
      cursor: pointer;
    }
    .card button:hover {
      background-color: #003f7d;
    }
    .text-link {
      font-size: 13px;
      text-align: center;
      color: #555;
    }
    .text-link a {
      color: #00529B;
      text-decoration: none;
    }
    .error-message {
      color: red;
      font-size: 14px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <!-- Login Form -->
  <div class="card">
    <h2>Masuk ke Akun Anda</h2>
    <p>Silakan login sesuai peran Anda: Pemerintah, Sekolah, atau Siswa</p>

    @if ($errors->any())
      <div class="error-message">
        @foreach ($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif

    <form method="POST" action="/login">
      @csrf
      <select name="role" required>
        <option value="">Pilih Role</option>
        <option value="siswa">Siswa</option>
        <option value="sekolah">Sekolah</option>
        <option value="pemerintah">Pemerintah</option>
      </select>

      <input type="text" name="username" placeholder="NISN / NPSN / Email" required>
      <input type="password" name="password" placeholder="Password" required>

      <button type="submit">Masuk</button>
    </form>

    <div class="text-link">
      <a href="#">Lupa password?</a> | <a href="#">Butuh bantuan?</a>
    </div>
  </div>
</body>
</html>
