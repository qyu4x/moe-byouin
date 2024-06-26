<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/loginStyle.css">
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
    <div class="container-fluid container">
        <a class="navbar-brand" href="#">Poliklinik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Pasien</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dokter/login') }}">Dokter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->

<!-- Content -->
<div class="wrapper">
    <div class="logo d-flex justify-content-center">
        <img class="img_logo" style="width: 10%;" src="https://ik.imagekit.io/6v306xm58/Logo_Udinus_-_Official_02.png?updatedAt=1688364410119" alt="Logo">
    </div>
    <div class="container">
        <form action="/admin/login" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            @if($error ?? '')
                <div class="row">
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<!-- End Content -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
