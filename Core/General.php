<?php
    abstract class General{
        protected $pathController = '/App/Control/';
        protected $pathModel = '/App/Model/Model/';
        protected $pathView = '/App/View/';
        protected $defaultController = 'Index';
        protected $defaultAction = 'Index';
        protected $commonFiles = '/Core/Files/';
        public $path = 'uahca uahca uahca';
        public $systemName = 'Jaspion';

        public function formatValues($value){
        	if (!is_numeric($value)) {
        		return '"'.$value.'"';
        	}else{
        		return $value;
        	}
        }
    }
?>