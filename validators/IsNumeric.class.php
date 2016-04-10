<?php
    namespace Validation\validators;
    use Validation\Validator;
    use Validation\iValidatorPart;

    require_once "..\Validator.class.php";
    require_once "..\iValidatorPart.interface.php";
    require_once "Exists.class.php";

    /**
    Validator to validate if variable is numeric.
    */
    class IsNumeric extends Validator implements iValidatorPart{
        
        function __construct(array $messages = null){
            $exists_validator = new Exists();
            parent::__construct($this,...$exists_validator->get_parts());
        }
        
        /**
        Validate if variable is numeric.
        */
        public function validate_method($var){
            if(is_numeric($var)){
                return null;
            }else{
                return "not numeric";
            }
        }        
    }
    
   ?>