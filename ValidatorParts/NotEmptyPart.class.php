<?php
    namespace Validation\validatorParts;
    
    require_once __DIR__ . "/../ValidatorPart.class.php";
    use Validation\ValidatorPart;

    /**
    ValidatorPart to validate if variable is not empty.
    */
    class NotEmptyPart extends ValidatorPart{
        
        function __construct($message = null){
            parent::__construct($message ?? "empty");
        }
        
        /**
        Validate if variable is not empty.
        */
        public function validate_method($var){
            if(empty($var)){
                return $this->fail_message;
            }else{
                return null;
            }
        } 
    }
?>