<?php

    class Pengelola_model {

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function updatePassword($data){

            $id = strtolower($data['id']);
            $newPassword = password_hash($data['newpassword'], PASSWORD_DEFAULT);

            $this->db->query("UPDATE tb_masjid SET password = :password WHERE id_masjid = :id_masjid");
            $this->db->bind('password', $newPassword);
            $this->db->bind('id_masjid', $id);

            $this->db->execute();

            return $this->db->rowCount();
            
        }

        public function getUser($data){

            $id = $data['id_masjid'];

            $this->db->query("SELECT * FROM tb_masjid WHERE id_masjid = :id_masjid");

            $this->db->bind('id_masjid', $id);

            return $this->db->resultSet();

        }

        public function getPassword($data){

            $id = $data;

            $this->db->query("SELECT * FROM tb_masjid WHERE id_masjid = :id_masjid");

            $this->db->bind('id_masjid', $id);

            return $this->db->resultSet();

        }

        public function updateProfile($text,  $file){
            
            
            $id = strtolower($text['id_masjid']);
            $email = $text['email_masjid'];
            $no_hp = $text['no_hp_masjid'];
            $nama = strtolower($text['nama_masjid']);
            $alamat = $text['alamat_masjid'];
            $jumlah = $text['donasi_masjid'];
            $deksripsi = $text['deskripsi_masjid'];
            $nama_bank = strtolower($text['nama_bank']);
            $no_rek = $text['no_rek'];
            $nama_rek = strtolower($text['nama_rek']);

            $gambarLama = $text['gambarLama'];

            // Cek apakah user pilih gambar baru atau tidak
            if($file['gambar']['error'] === 4){
                $gambar = $gambarLama;
                Flasher::setFlash('alertPengelola', 4);
            }else{
                $gambar = $this->uploadGambar($file);
                if(!$gambar){
                    return false;
                }
                unlink('../public/img/masjid/' . $gambarLama);
            }

            
            $this->db->query("UPDATE tb_masjid SET nama = :nama, email = :email, no_hp = :no_hp, 
                alamat = :alamat, jml_donasi = :jml_donasi, deskripsi = :deskripsi, gambar = :gambar, no_rek = :no_rek, 
                nama_bank = :nama_bank, nama_rek = :nama_rek WHERE id_masjid = :id_masjid
            ");

            $this->db->bind('nama', $nama);
            $this->db->bind('email', $email);
            $this->db->bind('no_hp', $no_hp);
            $this->db->bind('alamat', $alamat);
            $this->db->bind('jml_donasi', $jumlah);
            $this->db->bind('deskripsi', $deksripsi);
            $this->db->bind('gambar', $gambar);
            $this->db->bind('no_rek', $no_rek);
            $this->db->bind('nama_bank', $nama_bank);
            $this->db->bind('nama_rek', $nama_rek);
            $this->db->bind('id_masjid', $id);

            $this->db->execute();

            

            return $this->db->rowCount();
            

        }


        public function uploadGambar($file){

            $namaFile = $file['gambar']['name'];
            $ukuranFile = $file['gambar']['size'];
            $error = $file['gambar']['error'];
            $tmpName = $file['gambar']['tmp_name'];

            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));

            // Kalau yang diupload bukan gambar atau beda ekstensi
            if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
                Flasher::setFlash('alertPengelola', 1);
                return false;
            }

            // Cek ukuran tidak boleh lebih dari 1.2 Mb
            if( $ukuranFile > 1200000 ){
                Flasher::setFlash('alertPengelola', 2);
                return false;
            }

            // Generate nama baru
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
            

            move_uploaded_file($tmpName, '../public/img/masjid/'. $namaFileBaru);

            return $namaFileBaru;

        }


        public function getIdMasjid(){

            $this->db->query("SELECT id_masjid FROM tb_masjid
            WHERE id_masjid = :id_masjid");

            $this->db->bind('id_masjid', $_SESSION['pengelola'][0]['id_masjid']);

            return $this->db->resultSet();
        }


        public function antrianDonasi(){

            $id = $this->getIdMasjid();

            $this->db->query("SELECT tb_submit.id_submit, tb_submit.id_donatur, tb_submit.gambar, tb_donatur.nama, 
            tb_submit.tanggal, tb_submit.jumlah
            FROM ((tb_submit
            INNER JOIN tb_donatur ON tb_submit.id_donatur = tb_donatur.id_donatur )
            INNER JOIN tb_masjid ON tb_submit.id_masjid = tb_masjid.id_masjid)
            WHERE tb_masjid.id_masjid = :id_masjid");

            $this->db->bind('id_masjid', $id[0]['id_masjid']);

            return $this->db->resultSet();
        }

        public function getReportMasjid(){

            $dataMasjid = $_SESSION['pengelola'];
            foreach($dataMasjid as $idMasjid){

                $this->db->query("SELECT COUNT(DISTINCT tb_sukses.id_donatur) AS jumlah_donatur,
                SUM(tb_sukses.jumlah) AS jumlah_donasi, tb_masjid.jml_donasi, tb_sukses.id_masjid
                FROM tb_sukses
                INNER JOIN tb_masjid ON tb_sukses.id_masjid = tb_masjid.id_masjid
                WHERE tb_masjid.id_masjid = :id_masjid");

                $this->db->bind('id_masjid', $idMasjid['id_masjid']);
            }
            
            return $this->db->resultSet();
        }

    }



?>