<?php
    namespace Validation\validators;
    use Validation\Validator;
    use Validation\iValidatorPart;

    require_once __DIR__ . "\..\Validator.class.php";
    require_once __DIR__ . "\..\iValidatorPart.interface.php";
    require_once __DIR__ . "\IsNumeric.class.php";

    /**
    Validator to validate a minimum value.
    */
    class Min extends Validator implements iValidatorPart{
        
        private $min;
        
        /**
        Min is minimum allowed value.
        */
        function __construct($min){
            $this->min = $min;
            
            $is_numeric_validator = new IsNumeric();
            parent::__construct($this,...$is_numeric_validator->get_parts());
        }
        
        /**
        Validate if variable is equal or greater then minimum allowed.
        */
        public function validate_method($var){
            if($var < $this->min){
                return "smaller then {$this->min}";
            }else{
                return null;
            }
        }        
    }
    
   ?>