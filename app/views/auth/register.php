<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?=$data['judul'] ;?></title>
    <link href="<?=BASEURL ;?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?=BASEURL ;?>/css/sb-admin-2.min.css" rel="stylesheet" type="text/css">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <?php Flasher::flashMessage(); ;?>
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Sebagai Pengelola Masjid | Donatur</h1>
                            </div>
                            <form class="user" action="<?=BASEURL ;?>/auth/createakun" method="post">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user" id="username"
                                        placeholder="Masukan Username Anda..." autocomplete="off" required>
                                    <small id="username" class="form-text text-muted px-2">Jika Anda sebagai pengelola masjid masukan<i class="text-danger"> nama masjid*</i></small>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="email"
                                        placeholder="Masukan Email Anda..." autocomplete="off" required>
                                </div>
                                <div class="form-group px-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="pengelola" value="pengelola" required>
                                        <label class="form-check-label" for="pengelola">Pengelola Masjid</label>
                                      </div>
                                      <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="donatur" value="donatur" required>
                                        <label class="form-check-label" for="donatur">Donatur</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="validatepassword" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Ulang Password" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">Buat Akun</button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <p style="display: inline;">Sudah Punya Akun?</p><a class="small" href="<?=BASEURL ;?>/auth/index"> Silahkan Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
    <script src="<?=BASEURL ;?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=BASEURL ;?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?=BASEURL ;?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?=BASEURL ;?>/js/sb-admin-2.min.js"></script>

</body>

</html>