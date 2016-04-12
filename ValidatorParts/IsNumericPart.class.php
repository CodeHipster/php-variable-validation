<?php
    namespace Validation\validatorParts;
    
    require_once __DIR__ . "/../ValidatorPart.class.php";
    use Validation\ValidatorPart;

    /**
    ValidatorPart to validate if variable is numeric.
    */
    class IsNumericPart extends ValidatorPart{
        
        function __construct($message = null){
            parent::__construct($message ?? "not numeric");
        }
        
        /**
        Validate if variable is numeric.
        */
        public function validate_method($var){
            if(is_numeric($var)){
                return null;
            }else{
                return $this->fail_message;
            }
        } 
    }
?>