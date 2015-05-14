<?php
    require_once('General.php');

    class jaspion extends general{
        private $url;
        private $nameController;
        private $nameAction;
        private $controller;
        private $attribute = array();
                
        public function __construct($value){
            $this->url = $value;
            $str = explode('/',$this->url);
            $this->nameController = $str[0];
            $this->nameAction = (isset($str[1]) ? $str[1] : $this->defaultAction);

            /* Carrega arquivos comuns*/
            require_once(PATH_FILES.'/core/control.php');
            require_once(PATH_FILES.'/core/database.php');

            $this->loadModel($this->nameController);

            if($this->InstantClass()){
                $this->CatchAttribute($str);
                $this->CallAction();
            }
        }

        /* Carrega models*/
        private function loadModel($file){
            $path = PATH_FILES.$this->pathModel.$file.'.php';
            if(file_exists($path)){
                require_once($path);
                return true;
            }else{
                return false;
            }
        }
        
        /* Instância classe */
        private function InstantClass(){
            if(file_exists(PATH_FILES.$this->pathController.$this->nameController.'.php')){
                require_once(PATH_FILES.$this->pathController.$this->nameController.'.php');
                $this->controller = new $this->nameController();
                return true;
            }elseif(file_exists(PATH_FILES.$this->pathController.$this->defaultController.'.php')){
                require_once(PATH_FILES.$this->pathController.$this->defaultController.'.php');
                $this->controller = new $this->defaultController();
                return true;
            }else{
                print('Não encontrado!');
                return false;
            }
        }

        /* Carrega método correspondente a action informada na url */
        private function CallAction(){
            $action = $this->nameAction;
            if (count($this->attribute) > 0){
                $this->controller->$action($this->attribute);
            }else{
                $this->controller->$action();
            }
            
        }

        /* Gera atributos que são passados ao métodos das classes */
        private function CatchAttribute($value){
            if(count($value) > 2 ){
                $pos = 0;
                for($i = 2; $i < count($value); $i++){
                    $this->attribute[$pos] = $value[$i];
                    $pos++;
                }
            }
        }        
    }

?>