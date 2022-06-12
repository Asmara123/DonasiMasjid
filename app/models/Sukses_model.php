<?php

    class Sukses_model {

        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function pindahData($id_submit){

            $this->db->query("INSERT INTO tb_sukses (id_submit, id_masjid, id_donatur, jumlah, gambar)
            SELECT id_submit, id_masjid, id_donatur, jumlah, gambar FROM tb_submit WHERE id_submit = :id_submit");

            $this->db->bind('id_submit', $id_submit);
            

            $this->db->execute();

            return $this->db->rowCount();
           
        }

        public function hapusData($id_submit){

            $this->db->query("DELETE FROM tb_submit WHERE id_submit = :id_submit");

            $this->db->bind('id_submit', $id_submit);

            $this->db->execute();

            return $this->db->rowCount();
        }

        public function getIdMasjid(){

            $this->db->query("SELECT id_masjid FROM tb_masjid");

            return $this->db->resultSet();
        }

        public function getDataSuksesForMasjid(){

            $dataMasjid = $_SESSION['pengelola'];
            foreach($dataMasjid as $idMasjid){

                $this->db->query("SELECT tb_sukses.id_submit, tb_sukses.id_donatur,
                tb_sukses.gambar, tb_donatur.nama, tb_sukses.tanggal, tb_sukses.jumlah
                FROM ((tb_sukses
                INNER JOIN tb_masjid ON tb_sukses.id_masjid = tb_masjid.id_masjid)
                INNER JOIN tb_donatur ON tb_sukses.id_donatur = tb_donatur.id_donatur)
                WHERE tb_masjid.id_masjid = :id_masjid");

                $this->db->bind('id_masjid', $idMasjid['id_masjid']);
            }
            
            return $this->db->resultSet();
            
        }
    }


?>