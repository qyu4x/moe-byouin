<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
<div class="wrapper vh-100 d-flex flex-column justify-content-center align-items-center" style="background-color: #48829E;">
    <div class="cards border px-5 py-3 rounded-lg" style="width: 30%; background-color: white;">
        <div class="text-group my-2 d-flex flex-column justify-content-center align-items-center">
            <img src="../../../images/hospital-health-clinic-svgrepo-com.svg" class="text-center w-25 my-2" style="width: 20%;" alt="">
            <h3 class="text-center text-capitalize">Daftar Dokter</h3>
            <p class="text-center text-secondary">Masukkan informasi berdasarkan form</p>
        </div>
        <form action="" method="POST">
            @csrf
            @method('POST')
            <input type="text" class="w-100 px-4 py-2 my-2 rounded-lg border page-link" id="nama" placeholder="Nama Lengkap" autocomplete="off" name="nama" required>
            <div class="form-group my-2 gap-3">
                <input type="text" class="w-100 px-4 py-2 my-2 rounded-lg border page-link" id="email" placeholder="Email" autocomplete="off" name="email" required>
                <input type="text" class="w-100 px-4 py-2 my-2 rounded-lg border page-link" id="no_hp" placeholder="Nomor Telepon" autocomplete="off" name="no_hp" required>
                <input type="text" class="w-100 px-4 py-2 my-2 rounded-lg border page-link" id="alamat" placeholder="Alamat" autocomplete="off" name="alamat" required>
                <div class="form-group my-2">
                    <label for="poliklinik">Pilih Poliklinik</label>
                    <select class="form-control" id="poliklinik" name="id_poli" required>
                        @foreach ($polis as $poli)
                            <option value="{{ $poli->id }}">{{ $poli->nama_poli }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-evenly align-items-center my-2" style="gap: 0.5em;">
                    <input type="password" class="w-100 px-4 py-2 my-1 rounded-lg border page-link" id="password" placeholder="Password" name="password" required>
                    <input type="password" class="w-100 px-4 py-2 my-1 rounded-lg border page-link" id="re-password" placeholder="Re-Password" name="password_confirmation" required>
                </div>

            </div>
            @if($error ?? '')
                <div class="row">
                    <div class="alert alert-danger" role="alert">
                        {{$error}}
                    </div>
                </div>
            @endif
            <div class="form-group d-flex justify-content-end align-items-center">
                <button style="background-color: #48829E;" type="submit" class="w-auto px-4 btn btn-block rounded-2 text-white">Register</button>
            </div>
        </form>
    </div>
</div>


<div class="wrapper"></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3 class=" mt-3"/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/0116028855.js" crossorigin="anonymous"></script>
</body>

</html>
