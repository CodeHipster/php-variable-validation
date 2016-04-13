<?php
    namespace Validation\validatorParts;
    
    require_once __DIR__ . "/../ValidatorPart.class.php";
    use Validation\ValidatorPart;

    /**
    ValidatorPart to validate if variable exists.
    */
    class KeyExistsPart extends ValidatorPart{
        private $map;
        
        function __construct(array $map, $message = null){
            parent::__construct($message ?? "key does not exist");
            $this->map = $map;
        }
        
        /**
        Validate if variable exists.
        */
        public function validate_method($var){            
            if(isset($this->map[$var])){
                return null;
            }
            else{
                return $this->fail_message;
            }           
        }
    }

?>