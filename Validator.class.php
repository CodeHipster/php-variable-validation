<?php
    namespace Validation;
    
    require_once __DIR__ . "/iValidator.interface.php";    
    require_once __DIR__ . "/ValidatorPart.class.php";
    
    /**
    A Validator is composed of multiple iValidatorParts.
    */
    class Validator implements iValidator{        
        private $validation_parts = array();
                
        /**
        Provide the extra parts this validator consists of.
        In order of last depencency as first argument and
        root dependency as the last argument. 
        */
        function __construct(iValidatorPart ...$validator_parts){
            if(isset($validator_parts)){
                $this->validation_parts = $validator_parts;           
            }
        }
                
        /**
        Runs all validation parts in order.
        Root dependency is called as first.
        @var is the variable to validate.
        */        
        function validate($var){   
            $result;
            //how well does array_reserse perform? Maybe better to store the result?
            $parts = array_reverse($this->validation_parts);
            foreach ($parts as $validation_part) {
                $result = $validation_part->validate_method($var);
                if(is_null($result) == false){
                    return $result;
                }
            }
        }
        
        /**
        Return the parts this validator consists of.
        In order of last dependency first and root dependency at the end.
        */
        function get_parts(){
            return $this->validation_parts;
        }        
    }
?>