<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | MAPALA Arga Dahana</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/arga-dahana/public/assets/css/app.css">
</head>
<body class="login-page">
<div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
  <div class="card login-card border-0 shadow-lg">
    <div class="card-body p-4 p-md-5">
      <div class="text-center mb-4">
        <div class="brand-mark mx-auto mb-3">⛰</div>
        <h1 class="h3 fw-bold">ARGO DAHANA</h1>
        <p class="text-secondary">Portal Anggota MAPALA</p>
      </div>
      <form method="post" action="/arga-dahana/public/login">
        <input type="hidden" name="_csrf" value="<?= e(csrf_token()) ?>">
        <div class="mb-3">
          <label class="form-label" for="email">Email</label>
          <input class="form-control form-control-lg" type="email" id="email" name="email" required autocomplete="username">
        </div>
        <div class="mb-4">
          <label class="form-label" for="password">Password</label>
          <input class="form-control form-control-lg" type="password" id="password" name="password" required autocomplete="current-password">
        </div>
        <button class="btn btn-nature btn-lg w-100" type="submit">Masuk</button>
      </form>
      <p class="text-center text-secondary small mt-4 mb-0">Akses hanya untuk pengguna yang terdaftar.</p>
    </div>
  </div>
</div>
</body>
</html>
