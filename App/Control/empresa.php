<?php
    class empresa extends Control{
        private $db;

        public function __construct(){
            $this->db = new empresaModel();
        }

        public function listaempresa(){
            print($this->makeJson($this->db->read()));
        }
    }
?>