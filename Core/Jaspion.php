<?php
    require_once('General.php');

    class Jaspion extends General{
        private $url;
        private $nameController;
        private $nameAction;
        private $controller;
        private $attribute = array();
        
        public function __construct($value){
            $this->url = $value;
            $str = explode('/',$this->url);
            $this->nameController = $str[0];
            $this->nameAction = $str[1];
            
            if($this->InstantClass()){
                $this->CatchAttribute($str);
                $this->CallAction();
            }
        }

        /* Carrega models*/
        private function __autoload(){
            $path = PATH_FILES.$this->pathModel.$this->nameController.'.php';
            if(file_exists($path)){
                require_once($path);
                $this->controller = new $this->nameController();
                return true;
            }else{
                return false;
            }
        }
        
        /* Instância classe */
        private function InstantClass(){
            if(!file_exists(PATH_FILES.$this->pathController.$this->nameController.'.php')){
                print('Não encontrado!');
                return false;
            }else{
                $path = PATH_FILES.$this->pathController.$this->nameController.'.php';
                if(file_exists($path)){
                    require_once($path);
                    $this->controller = new $this->nameController();
                    return true;
                }else{
                    return false;
                }
            }
        }

        /* Carrega método correspondente a action informada na url */
        private function CallAction(){
            $action = $this->nameAction;
            $this->controller->$action($this->attribute);
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