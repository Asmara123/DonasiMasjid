<?php

    if(!isset($_SESSION['login'])){
        Flasher::setFlash('authMessage', 8);
        header('Location: ' . BASEURL . '/auth');
        exit;
    }else{
        if(isset($_SESSION['pengelolaPage'])){
            header('Location: ' . BASEURL . '/pengelola');
            exit;
        }
        $_SESSION['donaturPage'] = true;
    }

    class Donatur extends Controller {

        public function index(){
            
            $data['data'] = $this->model('Donatur_model')->getMasjid();
            $data['judul'] = 'Halaman Donatur | Cahaya Donasi';
            $this->view('donatur/index' ,$data);

        }

        public function antrian_donasi(){

            $data['data'] = $this->model('Donatur_model')->antrianDonasi();
            $data['judul'] = 'Halaman Donatur | Cahaya Donasi';
            $this->view('donatur/antrian_donasi' ,$data);

        }

        public function riwayat_donasi(){
            
            $data['data'] = $this->model('Donatur_model')->riwayatDonasi();
            $data['judul'] = 'Halaman Donatur | Cahaya Donasi';
            $this->view('donatur/riwayat_donasi', $data);

        }

        public function profile(){

            $data['data'] = $this->model('Donatur_model')->detailDonatur();
            $data['judul'] = 'Halaman Donatur | Cahaya Donasi';
            $this->view('donatur/profile', $data);

        }

        public function updateProfile(){

            if($this->model('Donatur_model')->updateProfile($_POST) > 0){
                Flasher::setFlash('alertDonatur', 5);
                header('Location: ' . BASEURL . '/donatur/profile');
                exit;
            }else{
                Flasher::setFlash('alertDonatur', 6);
                header('Location: ' . BASEURL . '/donatur/profile');
                exit;                
            }

        }

        public function ubah_password(){

            $data['judul'] = 'Halaman Donatur | Cahaya Donasi';
            $data['profile'] = $_SESSION['idDonatur'];
            $this->view('donatur/ubah_password' ,$data);

        }


        public function detail_masjid($id = null){
            
            if($id === null){
                header('Location: ' . BASEURL . '/donatur');
                exit;
            }

            $_SESSION['id_masjid'] = $id;
            $data['id_submit'] = $this->model('Submit_model')->generateIdSubmit();
            $data['data'] = $this->model('Donatur_model')->detailMasjid($id);
            $data['judul'] = 'Halaman Donatur | Cahaya Donasi';
            $this->view('donatur/detail_masjid', $data);

        }

        public function submitStruk(){
            
            
            if($this->model('Submit_model')->submitStruk($_POST, $_FILES) > 0){
                
                Flasher::setFlash('alertDonatur', 4);
                header('Location: ' . BASEURL . '/donatur/antrian_donasi');
                exit;
            }else{
                header('Location: ' . BASEURL . '/donatur/detail_masjid/' . $_SESSION['id_masjid']);
                exit; 
            }
        }

        public function updatePassword(){

            $id = strtolower($_POST['id']);
            $oldPassword = $_POST['oldpassword'];
            $newPassword = $_POST['newpassword'];

            if($oldPassword === $newPassword){
                Flasher::setFlash('alertPengelola', 5);
                header('Location: ' . BASEURL . '/donatur/ubah_password');
                exit; 
            }else{
                $result = $this->model('Donatur_model')->getPassword($id);
                if(password_verify($oldPassword, $result[0]['password'])){
                    if($this->model('Donatur_model')->updatePassword($_POST) > 0){
                        Flasher::setFlash('alertPengelola', 7);
                        header('Location: ' . BASEURL . '/donatur/ubah_password');
                        exit; 
                    }
                }else{
                    Flasher::setFlash('alertPengelola', 6);
                    header('Location: ' . BASEURL . '/donatur/ubah_password');
                    exit; 
                }
            }

        }

        public function hapus_donasi($id_submit){
            
            if($this->model('Donatur_model')->hapusDonasi($id_submit) > 0){
                unlink('../public/img/struk/' . $_SESSION['gambar_struk']);
                $_SESSION['idSubmit'] = $id_submit;
                Flasher::setFlash('alertDonatur', 7);
                header('Location: ' . BASEURL . '/donatur/antrian_donasi');
                exit; 
            }else{
                header('Location: ' . BASEURL . '/donatur/antrian_donasi');
                exit; 
            }
        }

        public function edit_donasi($id_submit){
            $_SESSION['idSubmit'] = $id_submit;
            if($this->model('Submit_model')->editDonasi($_POST, $_FILES) > 0){
                Flasher::setFlash('submit', 2);
                header('Location: ' . BASEURL . '/donatur/antrian_donasi');
                exit; 
            }else{
                Flasher::setFlash('submit', 4);
                header('Location: ' . BASEURL . '/donatur/antrian_donasi');
                exit; 
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