<?php
    namespace Validation\validatorParts;
    
    require_once __DIR__ . "/../ValidatorPart.class.php";
    use Validation\ValidatorPart;

    /**
    ValidatorPart to validate if variable is not an empty string.
    */
    class NotEmptyStringPart extends ValidatorPart{
        
        function __construct($message = null){
            parent::__construct($message ?? "empty string");
        }
        
        /**
        Validate if variable is not an empty string.
        */
        public function validate_method($var){
            if($var === ""){
                return $this->fail_message;
            }else{
                return null;
            }
        } 
    }
?>