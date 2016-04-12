<?php
    namespace Validation\validatorParts;
    
    require_once __DIR__ . "/../ValidatorPart.class.php";
    use Validation\ValidatorPart;

    /**
    ValidatorPart to validate if variable exists.
    */
    class ExistsPart extends ValidatorPart{
        
        function __construct($message = null){
            parent::__construct($message ?? "does not exist");
        }
        
        /**
        Validate if variable exists.
        */
        public function validate_method($var){            
            if(isset($var)){
                return null;
            }
            else{
                return $this->fail_message;
            }           
        }
    }

?>