<?php
    abstract class general{
        protected $pathController = '/app/control/';
        protected $pathModel = '/app/model/';
        protected $pathView = '/app/view/';
        protected $defaultController = 'site';
        protected $defaultAction = 'index';
        protected $commonFiles = '/core/Files/';
        public $jsDir  = '/__js/';
        public $cssDir = '/__css/';
        public $imgDir = '/__css/imgs/';
        public $systemName = 'Jaspion';

        public function pageError($value = ''){
            require_once(PATH_FILES.$this->commonFiles.'error.php');
        }
    }
?>