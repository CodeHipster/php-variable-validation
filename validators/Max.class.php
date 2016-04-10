<?php
    namespace VariableValidation\validators;
    use VariableValidation\Validator;
    use VariableValidation\iValidatorPart;

    require_once "..\Validator.class.php";
    require_once "..\iValidatorPart.interface.php";
    require_once "IsNumeric.class.php";

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