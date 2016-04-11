<?php
    namespace Validation\validators;
    use Validation\Validator;
    use Validation\iValidatorPart;
    
    require_once __DIR__ . "\..\Validator.class.php";
    require_once __DIR__ . "\..\iValidatorPart.interface.php";

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