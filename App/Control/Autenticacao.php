<?php
    class autenticacao extends Control{
        public function openconnect(Array $value){
            $db = new autenticacaoModel();
            print_r($db->read('sys_empresa'));
            return true;
        }

        public function logon($user,$hash){
        	return true;
        	
        }

        public function logout(){
        	return true;
        }
    }
?>