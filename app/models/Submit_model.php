<?php

    class Submit_model {

        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getNilaiTbSukses(){

            $this->db->query("SELECT id_submit FROM tb_sukses ORDER BY id_submit DESC");

            $id_submit = $this->db->resultSet();
            
            $kode = $id_submit[0]['id_submit'];
            $urut = substr($kode, 7, 3);
            $tambah = (int) $urut;

            return $tambah;
        }

        public function generateIdSubmit(){

            $this->db->query("SELECT id_submit FROM tb_submit ORDER BY id_submit DESC");
            
            $id_submit = $this->db->resultSet();

            $i = $this->getNilaiTbSukses();
            
            $kode = $id_submit[0]['id_submit'];
            $urut = substr($kode, 7, 3);
            $tambah = (int) $urut;

            if($tambah == 0){
                if($i == 0){
                    $tambah = (int) $urut + 1;
                }else if($i != 0){
                    $tambah = $i + 1;
                }
            }else if($tambah != 0){
                if($i == 0){
                    $tambah = (int) $urut + 1;
                }else if($i != 0){
                    if($tambah > $i){
                        $tambah = (int) $urut + 1;
                    }else{
                        $tambah = $i + 1;
                    }
                }
            }
            
            
            
            if(strlen($tambah) == 1){
                $format = "donasi-00" . $tambah; 
            }else if(strlen($tambah) == 2){
                $format = "donasi-0" . $tambah;
            }else{
                $format = "donasi-" . $tambah;
            }

            return $format;
        }

        public function submitStruk($text,  $file){
            
            $idSubmit = strtolower($text['id_submit']);
            $idDonatur = $text['id_donatur'];
            $idMasjid = $text['id_masjid'];
            $jml = $text['jumlah_donasi'];
            
            $gambar = $this->uploadGambarStruk($file);

            if(!$gambar){
                return false;
            }

            $this->db->query("INSERT INTO tb_submit VALUES (:id_submit, :id_masjid,
            :id_donatur, :jml, :gambar, current_timestamp())");

            $this->db->bind('id_submit', $idSubmit);
            $this->db->bind('id_masjid', $idMasjid);
            $this->db->bind('id_donatur', $idDonatur);
            $this->db->bind('jml', $jml);
            $this->db->bind('gambar', $gambar);
            
            $this->db->execute();

            return $this->db->rowCount();
        }


        public function uploadGambarStruk($file){

            $namaFile = $file['gambar']['name'];
            $ukuranFile = $file['gambar']['size'];
            $error = $file['gambar']['error'];
            $tmpName = $file['gambar']['tmp_name'];

            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));

            // Cek apakah ada gambar yang diupload
            if($error === 4){
                Flasher::setFlash('alertDonatur', 1);
                return false;
            }

            // Kalau yang diupload bukan gambar atau beda ekstensi
            if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
                Flasher::setFlash('alertDonatur', 2);
                return false;
            }

            // Cek ukuran tidak boleh lebih dari 1.2 Mb
            if( $ukuranFile > 1200000 ){
                Flasher::setFlash('alertDonatur', 3);
                return false;
            }

            // Generate nama baru
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
            

            move_uploaded_file($tmpName, '../public/img/struk/'. $namaFileBaru);

            return $namaFileBaru;

        }

        public function uploadEditGambarStruk($file){

            $namaFile = $file['gambar']['name'];
            $ukuranFile = $file['gambar']['size'];
            $error = $file['gambar']['error'];
            $tmpName = $file['gambar']['tmp_name'];

            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));

            // Cek apakah ada gambar yang diupload
            if($error === 4){
                Flasher::setFlash('submit', 3);
                return false;
            }

            // Kalau yang diupload bukan gambar atau beda ekstensi
            if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
                Flasher::setFlash('submit', 3);
                return false;
            }

            // Cek ukuran tidak boleh lebih dari 1.2 Mb
            if( $ukuranFile > 1200000 ){
                Flasher::setFlash('alertDonatur', 3);
                return false;
            }

            // Generate nama baru
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
            

            move_uploaded_file($tmpName, '../public/img/struk/'. $namaFileBaru);

            return $namaFileBaru;

        }

        public function editDonasi($text, $file){
            $idSubmit = strtolower($text['id_submit']);
            $jml = $text['jumlah_donasi'];

            // Cek gambar lama
            $this->db->query("SELECT gambar FROM tb_submit WHERE id_submit = :id_submit");
            $this->db->bind('id_submit', $idSubmit);
            $gambarLama = $this->db->single();

            // Cek apakah user pilih gambar baru atau tidak
            if($file['gambar']['error'] === 4){
                $gambar = $gambarLama['gambar'];
                Flasher::setFlash('submit', 2);
            }else{
                $gambar = $this->uploadEditGambarStruk($file);
                if(!$gambar){
                    return false;
                }
                unlink('../public/img/struk/' . $gambarLama['gambar']);
            }

            $this->db->query("UPDATE tb_submit SET gambar = :gambar, jumlah = :jumlah, tanggal = current_timestamp() 
            WHERE id_submit = :id_submit");

            $this->db->bind('gambar', $gambar);
            $this->db->bind('jumlah', $jml);
            $this->db->bind('id_submit', $idSubmit);
            $this->db->execute();

            return $this->db->rowCount();

        }
    }





?>