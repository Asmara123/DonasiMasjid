<?php
    
    if( isset($_SESSION['login']) and isset($_SESSION['pengelolaPage']) ){
        header('Location: ' . BASEURL . '/pengelola');
        exit;
    }else if( isset($_SESSION['login']) and isset($_SESSION['donaturPage']) ){
        header('Location: ' . BASEURL . '/donatur');
        exit;
    }

    class Auth extends Controller {

        public function index(){
            
            $data['judul'] = 'Halaman Login | Cahaya Donasi';
            $this->view('auth/index', $data);

        }

        public function register(){

            $data['judul'] = 'Halaman Registrasi | Cahaya Donasi';
            $this->view('auth/register' ,$data);

        }

        public function login(){

            $password = $_POST['password'];

            if($this->model('Auth_model')->cekUser($_POST) > 0){

                $result = $this->model('Auth_model')->login($_POST);

                if(password_verify($password, $result[0]['password'])){
                    if($result[0]['status'] == 'donatur'){

                        $username = ucwords($result[0]['nama']);
                        $_SESSION['idDonatur'] = $result[0]['id_donatur'];
                        Flasher::setFlash('authMessage', 6, $username);
                        $_SESSION['login'] = true;
                        header("Location: " . BASEURL . '/donatur');
                    }else{
                        
                        $_SESSION['pengelola'] = $result;
                        $username = ucwords($result[0]['nama']);
                        Flasher::setFlash('authMessage', 5, $username);
                        $_SESSION['login'] = true;
                        header("Location: " . BASEURL . '/pengelola');
                    }
                }else{

                    Flasher::setFlash('authMessage', 4);
                    header("Location: " . BASEURL . '/auth');

                }

            }else{

                Flasher::setFlash('authMessage', 4);
                header("Location: " . BASEURL . '/auth');

            }


        }

        public function createAkun(){

            $password = $_POST['password'];
            $validatePassword = $_POST['validatepassword'];
            

            if($password !== $validatePassword){
                Flasher::setFlash('authMessage', 1);
                header('Location: ' . BASEURL . '/auth/register');
            }else{
                if($this->model('Auth_model')->cekUser($_POST) > 0){

                    Flasher::setFlash('authMessage', 3);
                    header('Location: ' . BASEURL . '/auth/register');
                    
                }else{

                    if($this->model('Auth_model')->registrasi($_POST) > 0){
                        Flasher::setFlash('authMessage', 2);
                        header('Location: ' . BASEURL . '/auth');
                    }

                }
          
            }

        }

    }


?>