<?php

    class Auth_model {

        private $db;

        public function __construct(){
            $this->db = new Database;
        }


        public function login($data){
 
            $username = strtolower(stripslashes(trim($data['username'])));
            $status = $data['status'];

            if($status == 'donatur'){
                $this->db->query("SELECT * FROM tb_donatur WHERE nama = :nama");
                $this->db->bind('nama', $username);
                return $this->db->resultSet();
            }else{    
                $this->db->query("SELECT * FROM tb_masjid WHERE nama = :nama");
                $this->db->bind('nama', $username);
                return $this->db->resultSet();
            }

        }

        public function cekUser($data){

            $username = strtolower(stripslashes(trim($data['username'])));
            $status = $data['status'];

            if($status == 'donatur'){
                $this->db->query("SELECT * FROM tb_donatur WHERE nama = '$username'");
                $this->db->execute();
                return $this->db->rowCount();
            }else{    
                $this->db->query("SELECT * FROM tb_masjid WHERE nama = '$username'");
                $this->db->execute();
                return $this->db->rowCount();
            }
               
        }


        public function generateIDMasjid(){

            $this->db->query("SELECT id_masjid FROM tb_masjid ORDER BY id_masjid DESC");
            
            $id_user = $this->db->resultSet();
            
            $kode = $id_user[0]['id_masjid'];
            $urut = substr($kode, 7, 3);
            $tambah = (int) $urut + 1;
            
            if(strlen($tambah) == 1){
                $format = "masjid-00" . $tambah; 
            }else if(strlen($tambah) == 2){
                $format = "masjid-0" . $tambah;
            }else{
                $format = "masjid-" . $tambah;
            }

            return $format;
        }


        public function generateIDDonatur(){

            $this->db->query("SELECT id_donatur FROM tb_donatur ORDER BY id_donatur DESC");
            
            $id_user = $this->db->resultSet();
            
            $kode = $id_user[0]['id_donatur'];
            $urut = substr($kode, 8, 3);
            $tambah = (int) $urut + 1;
            
            if(strlen($tambah) == 1){
                $format = "donatur-00" . $tambah; 
            }else if(strlen($tambah) == 2){
                $format = "donatur-0" . $tambah;
            }else{
                $format = "donatur-" . $tambah;
            }

            return $format;
        }


        public function registrasi($data){

            $password = password_hash($data['password'], PASSWORD_DEFAULT);
            $username = strtolower(stripslashes( trim($data['username']) ));
            $email = strtolower(stripslashes( trim($data['email']) ));
            $status = $data['status'];

            if($status === 'pengelola'){

                $id = $this->generateIDMasjid();
            

                $this->db->query("INSERT INTO tb_masjid VALUES (:id_masjid, :nama, :email, NULL, NULL, NULL, NULL, :password, :status, NULL, NULL, NULL, NULL)");
                
                $this->db->bind('id_masjid', $id);
                $this->db->bind('nama', $username);
                $this->db->bind('email', $email);
                $this->db->bind('password', $password);
                $this->db->bind('status', $status);

                $this->db->execute();

                return $this->db->rowCount();
            }else{

                $id = $this->generateIDDonatur();
            

                $this->db->query("INSERT INTO tb_donatur VALUES (:id_donatur, :email, :nama, NULL, :password, :status)");
                
                $this->db->bind('id_donatur', $id);
                $this->db->bind('email', $email);
                $this->db->bind('nama', $username);
                $this->db->bind('password', $password);
                $this->db->bind('status', $status);
            
                $this->db->execute();

                return $this->db->rowCount();

            }
            

        }

    }



?>