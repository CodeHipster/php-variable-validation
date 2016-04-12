<?php
    namespace Validation\validatorParts;
    
    require_once __DIR__ . "/../ValidatorPart.class.php";
    use Validation\ValidatorPart;

    /**
    ValidatorPart to validate if variable is equal or greater then minimum allowed.
    */
    class MinPart extends ValidatorPart{
        private $min;
        
        function __construct($min, $message = null){
            $this->min = $min;
            parent::__construct($message ?? "smaller then {$min}");
        }
        
        /**
        Validate if variable is equal or greater then minimum allowed.
        */
        public function validate_method($var){
            if($var < $this->min){
                return $this->fail_message;
            }else{
                return null;
            }
        }  
    }
?>