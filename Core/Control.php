<?php
	require_once('General.php');
	class control extends General{
		protected function makeJson($value){
    		$objJson = json_encode($value);
			print($objJson);
    	}

    	protected function view($value){
    		require_once(PATH_FILES.$this->pathView.$value.'.php');
    	}
	}
?>