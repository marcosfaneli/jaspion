<?php
	require_once(PATH_FILES.'/Core/Control.php');

    Class autenticacao extends Control{
        public function freeconect(Array $value){
            return true;
        }

        public function logon($user,$hash){
        	return true;
        	
        }

        public function logoff(){
        	return true;
        }
    }
?>