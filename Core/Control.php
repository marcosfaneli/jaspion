<?php
	require_once('General.php');
	Class control extends General{
		protected function makeJson($value){
    		$objJson = json_encode($value);
			print($objJson);
    	}

    	protected function load($value){
    		require_once(PATH_FILES.$this->pathView.'/'.$value.'/'.$value.'.php');
    	}

    	public function pageError(){
    		require_once(PATH_FILES.$this->commonFiles.'error.php');
    	}
	}
?>