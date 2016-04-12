<?php
    namespace Validation\validatorParts;
    
    require_once __DIR__ . "/../ValidatorPart.class.php";
    use Validation\ValidatorPart;

    /**
    ValidatorPart to validate if variable is equal or smaller then maximum allowed.
    */
    class MaxPart extends ValidatorPart{
        private $max;
        
        function __construct($max, $message = null){
            $this->max = $max;
            parent::__construct($message ?? "greater then {$max}");
        }
        
        /**
        Validate if variable is equal or smaller then maximum allowed.
        */
        public function validate_method($var){
            if($var > $this->max){
                return $this->fail_message;
            }else{
                return null;
            }
        }  
    }
?>