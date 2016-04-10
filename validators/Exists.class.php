<?php
    namespace VariableValidation\validators;
    use VariableValidation\Validator;
    use VariableValidation\iValidatorPart;
    
    require_once "..\Validator.class.php";
    require_once "..\iValidatorPart.interface.php";

    /**
    Validator to validate if variable exists.
    */
    class Exists extends Validator implements iValidatorPart{
        
        function __construct(){            
            parent::__construct($this);
        }
        
        /**
        Validate if variable exists.
        */
        public function validate_method($var){            
            if(isset($var)){
                return null;
            }
            else{
                return "does not exist";
            }           
        }
    }

?>