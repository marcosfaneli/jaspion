<?php
	require_once('General.php');
	Class control extends general{
        protected $nameView;
        
        public function __construct(){
            $this->nameView = get_class($this);
            $this->jsDir  = PATH_FILES.$this->jsDir;
            $this->cssDir = PATH_FILES.$this->cssDir;
            $this->imgDir = PATH_FILES.$this->imgDir;
        }

		protected function makeJson($value){
    		$objJson = json_encode($value);
			return $objJson;
    	}

    	protected function load($value = ''){
            if($value == ''){
                $value = 'index';
            }
            if(file_exists(PATH_FILES.$this->pathView.$this->nameView.'/'.$value.'.php')){
    	       require_once(PATH_FILES.$this->pathView.$this->nameView.'/'.$value.'.php');
            }else{
                $this->pageError(PATH_FILES.$this->pathView.$this->nameView.'/'.$value.'.php');
            }
    	}
	}
?>