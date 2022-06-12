<?php

    class Donatur_model {

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getIdMasjid(){

            $this->db->query("SELECT id_masjid FROM tb_masjid");
            return $this->db->resultSet();
        }


        public function antrianDonasi(){

            $this->db->query("SELECT tb_submit.id_submit, tb_masjid.id_masjid,
            tb_submit.gambar, tb_masjid.nama, tb_submit.tanggal, tb_submit.jumlah
            FROM ((tb_submit
            INNER JOIN tb_masjid ON tb_submit.id_masjid = tb_masjid.id_masjid)
            INNER JOIN tb_donatur ON tb_submit.id_donatur = tb_donatur.id_donatur)
            WHERE tb_donatur.id_donatur = :id_donatur");

            $this->db->bind('id_donatur', $_SESSION['idDonatur']);

            return $this->db->resultSet();
        }

        public function hapusDonasi($id_submit){

            $this->db->query("SELECT gambar FROM tb_submit WHERE id_submit = :id_submit");
            $this->db->bind('id_submit', $id_submit);

            $gambar = $this->db->single();
            $_SESSION['gambar_struk'] = $gambar['gambar'];

            $this->db->query("DELETE FROM tb_submit WHERE id_submit = :id_submit");

            $this->db->bind('id_submit', $id_submit);

            $this->db->execute();

            return $this->db->rowCount();
        }


        public function getMasjid(){

            $idMasjid = $this->getIdMasjid();
            $total = [];

            $i = 0;
            foreach($idMasjid as $id){
                
                $this->db->query("SELECT tb_masjid.id_masjid, tb_masjid.nama, SUM(tb_sukses.jumlah) AS total_donasi, 
                COUNT(DISTINCT tb_sukses.id_donatur) AS total_donatur, tb_masjid.jml_donasi
                FROM tb_sukses
                INNER JOIN tb_masjid ON tb_sukses.id_masjid = tb_masjid.id_masjid
                WHERE tb_masjid.id_masjid = :id_masjid");

                $this->db->bind('id_masjid', $id['id_masjid']);
                $total[$i] =  $this->db->resultSet();
                $i++;
            }

            return $total; 
        }

        public function detailMasjid($id){

            $this->db->query("SELECT * FROM tb_masjid
            WHERE id_masjid = :id_masjid ");

            $this->db->bind('id_masjid', $id);

            return $this->db->single();
        }

        public function detailDonatur(){

            $this->db->query("SELECT id_donatur, email, nama, alamat 
            FROM tb_donatur WHERE id_donatur = :id_donatur");

            $this->db->bind('id_donatur', $_SESSION['idDonatur']);

            return $this->db->single();
        }

        public function updateProfile($data){

            $id = strtolower($data['id']);
            $email = strtolower($data['email']);
            $nama = strtolower($data['nama']);
            $alamat = strtolower($data['alamat']);

            $this->db->query("UPDATE tb_donatur SET  email = :email,
            nama = :nama, alamat = :alamat WHERE id_donatur = :id_donatur");

            $this->db->bind('email', $email);
            $this->db->bind('nama', $nama);
            $this->db->bind('alamat', $alamat);
            $this->db->bind('id_donatur', $id);

            $this->db->execute();

            return $this->db->rowCount();
        }

        public function getPassword($data){

            $id = $data;

            $this->db->query("SELECT * FROM tb_donatur WHERE id_donatur = :id_donatur");

            $this->db->bind('id_donatur', $id);

            return $this->db->resultSet();

        }

        public function updatePassword($data){

            $id = strtolower($data['id']);
            $newPassword = password_hash($data['newpassword'], PASSWORD_DEFAULT);

            $this->db->query("UPDATE tb_donatur SET password = :password WHERE id_donatur = :id_donatur");
            $this->db->bind('password', $newPassword);
            $this->db->bind('id_donatur', $id);

            $this->db->execute();

            return $this->db->rowCount();
            
        }

        public function riwayatDonasi(){

            $this->db->query("SELECT  tb_sukses.id_submit, tb_sukses.id_masjid, tb_sukses.gambar, 
            tb_masjid.nama, tb_sukses.tanggal, tb_sukses.jumlah
            FROM(( tb_sukses
            INNER JOIN tb_donatur ON tb_sukses.id_donatur = tb_donatur.id_donatur)
            INNER JOIN tb_masjid ON tb_sukses.id_masjid = tb_masjid.id_masjid)
            WHERE tb_donatur.id_donatur = :id_donatur");

            $this->db->bind('id_donatur', $_SESSION['idDonatur']);

            return $this->db->resultSet();
        }

    }





?>