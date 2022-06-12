<?php

    class Flasher {

        public static function setFlash($kelas, $tipe, $pesan=null){
            $_SESSION['flash'] = [
                'kelas' => $kelas,
                'tipe' => $tipe,
                'pesan' => $pesan
            ];
        }

        public static function flashMessage(){

            if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'authMessage') and ($_SESSION['flash']['tipe'] == 1 ) ){

                echo '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal Buat Akun!</strong> Password yang anda masukan tidak match.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'authMessage') and ($_SESSION['flash']['tipe'] == 2 ) ){

                echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Akun Anda Berhasi Dibuat!</strong> Silahkan Login.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                    ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'authMessage') and ($_SESSION['flash']['tipe'] == 3 ) ){
               
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Username telah digunakan !</strong> Silahkan Registrasi ulang.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'authMessage') and ($_SESSION['flash']['tipe'] == 4 ) ){
               
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Username / Password Anda salah !</strong> Silahkan login ulang.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'authMessage') and ($_SESSION['flash']['tipe'] == 5 ) ){
               
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat datang masjid ' .$_SESSION['flash']['pesan'] . ' !</strong> Pastikan data masjid anda sudah anda lengkapi. Cek di profile.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'authMessage') and ($_SESSION['flash']['tipe'] == 6 ) ){
               
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat datang ' .$_SESSION['flash']['pesan'] . ' !</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'authMessage') and ($_SESSION['flash']['tipe'] == 7 ) ){
               
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Anda berhasil log Out !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'authMessage') and ($_SESSION['flash']['tipe'] == 8 ) ){
               
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Silahkan login terlebih dahulu !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'alertPengelola') and ($_SESSION['flash']['tipe'] == 1 ) ){
               
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Yang anda upload bukan gambar!</strong> Pastikan anda mengupload gambar.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'alertPengelola') and ($_SESSION['flash']['tipe'] == 2 ) ){
               
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Ukuran gambar tidak boleh lebih dari <i>1,2 Mb</i> !</strong> Pastikan gambar anda memenuhi ukuran kriteria.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'alertPengelola') and ($_SESSION['flash']['tipe'] == 3 ) ){
               
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat profile masjid ' .ucwords($_SESSION['pengelola'][0]['nama']) .' berhasil diupdate !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'alertPengelola') and ($_SESSION['flash']['tipe'] == 4 ) ){
               
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Anda tidak melakukan perubahan apapun !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'alertPengelola') and ($_SESSION['flash']['tipe'] == 5 ) ){
               
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i>Password lama</i> dan <i>Password baru</i> tidak boleh sama !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'alertPengelola') and ($_SESSION['flash']['tipe'] == 6 ) ){
               
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i>Password lama</i> tidak sesuai dengan yang di database !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'alertPengelola') and ($_SESSION['flash']['tipe'] == 7 ) ){
               
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Password Anda berhasil diubah !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'alertDonatur') and ($_SESSION['flash']['tipe'] == 1 ) ){
               
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Anda tidak mengupload Gambar struk. Gagal berdonasi !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'alertDonatur') and ($_SESSION['flash']['tipe'] == 2 ) ){
               
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Yang Anda upload bukan gambar. Gagal berdonasi !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'alertDonatur') and ($_SESSION['flash']['tipe'] == 3 ) ){
               
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ukuran gambar tidak boleh lebih dari <i>1,2 Mb</i> !</strong> Pastikan gambar anda memenuhi ukuran kriteria.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'alertDonatur') and ($_SESSION['flash']['tipe'] == 4 ) ){
               
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i>Anda berhasil berdonasi</i> !</strong> Semoga donasi anda menjadi amal jariyah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'alertDonatur') and ($_SESSION['flash']['tipe'] == 5 ) ){
               
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Profile Anda berhasi diupdate !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'alertDonatur') and ($_SESSION['flash']['tipe'] == 6 ) ){
               
                echo '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Tidak ada perubahan data !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'alertDonatur') and ($_SESSION['flash']['tipe'] == 7 ) ){
               
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>' .ucwords($_SESSION['idSubmit']) . ' berhasil dihapus!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }
            else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'submit') and ($_SESSION['flash']['tipe'] == 1 ) ){
               
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Anda menerima ' .ucwords($_SESSION['idSubmit']) . ' !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'submit') and ($_SESSION['flash']['tipe'] == 2 ) ){
               
                echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>' .ucwords($_SESSION['idSubmit']) . ' berhasil diedit !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'submit') and ($_SESSION['flash']['tipe'] == 3 ) ){
               
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda tidak mengupload Gambar struk. Donasi gagal diedit !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }else if( (isset($_SESSION['flash']) ) and ($_SESSION['flash']['kelas'] == 'submit') and ($_SESSION['flash']['tipe'] == 4 ) ){
               
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Donasi ' .ucwords($_SESSION['idSubmit']) . ' gagal diedit !</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
                unset($_SESSION['flash']);

            }
        
        }




    }
    



?>