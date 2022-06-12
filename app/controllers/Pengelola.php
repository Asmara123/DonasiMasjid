<?php
    
    if(!isset($_SESSION['login'])){
        Flasher::setFlash('authMessage', 8);
        header('Location: ' . BASEURL . '/auth');
        exit;
    }else{
        if(isset($_SESSION['donaturPage'])){
            header('Location: ' . BASEURL . '/donatur');
            exit;
        }
        $_SESSION['pengelolaPage'] = true;
    }

    class Pengelola extends Controller {

        public function index(){

            $data['data'] = $this->model('Pengelola_model')->getReportMasjid();
            $data['judul'] = 'Halaman Pengelola Masjid | Cahaya Donasi';
            $data['profile'] = $_SESSION['pengelola'];
            $this->view('pengelola_masjid/index', $data);

        }


        public function antrian_donasi(){
            $data['data'] = $this->model('Pengelola_model')->antrianDonasi();
            $data['judul'] = 'Halaman Pengelola Masjid | Cahaya Donasi';
            $data['profile'] = $_SESSION['pengelola'];
            $this->view('pengelola_masjid/antrian_donasi', $data);

        }

        public function terima_donasi($id_submit){
           
            if($this->model('Sukses_model')->pindahData($id_submit) > 0){
                $_SESSION['idSubmit'] = $id_submit;
                Flasher::setFlash('submit', 1);
                $this->model('Sukses_model')->hapusData($id_submit);
                header('Location: ' . BASEURL . '/pengelola/antrian_donasi');
                exit;
            }
        }

        public function riwayat_donasi(){

           
            $data['data'] = $this->model('Sukses_model')->getDataSuksesForMasjid();
            $data['judul'] = 'Halaman Pengelola Masjid | Cahaya Donasi';
            $data['profile'] = $_SESSION['pengelola'];
            $this->view('pengelola_masjid/riwayat_donasi', $data);

        }

        public function ubah_password(){

            $data['judul'] = 'Halaman Pengelola Masjid | Cahaya Donasi';
            $data['profile'] = $_SESSION['pengelola'];
            $this->view('pengelola_masjid/ubah_password', $data);

        }


        public function profile(){

            $data['judul'] = 'Halaman Pengelola Masjid | Cahaya Donasi';
            $data['profile'] = $_SESSION['pengelola'];
            $this->view('pengelola_masjid/profile', $data);

        }

        public function updateProfile(){

            if($this->model('Pengelola_model')->updateProfile($_POST, $_FILES) > 0){
                $result = $this->model('Pengelola_model')->getUser($_POST);
                $_SESSION['pengelola'] = $result;
                Flasher::setFlash('alertPengelola', 3);
                header('Location: ' . BASEURL . '/pengelola/profile');
                exit;
            }else{
                header('Location: ' . BASEURL . '/pengelola/profile');
                exit; 
            }
            
        }


        public function updatePassword(){

            $id = strtolower($_POST['id']);
            $oldPassword = $_POST['oldpassword'];
            $newPassword = $_POST['newpassword'];

            if($oldPassword === $newPassword){
                Flasher::setFlash('alertPengelola', 5);
                header('Location: ' . BASEURL . '/pengelola/ubah_password');
                exit; 
            }else{
                $result = $this->model('Pengelola_model')->getPassword($id);
                if(password_verify($oldPassword, $result[0]['password'])){
                    if($this->model('Pengelola_model')->updatePassword($_POST) > 0){
                        Flasher::setFlash('alertPengelola', 7);
                        header('Location: ' . BASEURL . '/pengelola/ubah_password');
                        exit; 
                    }
                }else{
                    Flasher::setFlash('alertPengelola', 6);
                    header('Location: ' . BASEURL . '/pengelola/ubah_password');
                    exit; 
                }
            }

        }


        public function logOut(){

            $_SESSION = [];
            session_unset();
            session_destroy();
            session_start();
            Flasher::setFlash('authMessage', 7);
            header('Location: ' . BASEURL . '/auth');
            exit;

        }

       
    }

?>