<?php
    namespace Validation\validators;
    use Validation\Validator;
    use Validation\iValidatorPart;

    require_once __DIR__ . "\..\Validator.class.php";
    require_once __DIR__ . "\..\iValidatorPart.interface.php";
    require_once __DIR__ . "\IsNumeric.class.php";

    /**
    Validator to validate a maximum value.
    */
    class Max extends Validator implements iValidatorPart{
        
        private $max;
        
        /**
        Max is maximum allowed value.
        */
        function __construct($max){
            $this->max = $max;
            
            $is_numeric_validator = new IsNumeric(); 
            parent::__construct($this, ...$is_numeric_validator->get_parts());
        }
        
        /**
        Validate if variable is equal or smaller then maximum allowed.
        */
        public function validate_method($var){
            if($var > $this->max){
                return "greater then {$this->max}";
            }else{
                return null;
            }
        }        
    }
    
   ?>