<?php
//TODO:
//Add tests
//Turn into composer package.
//Add messages
    namespace Validation;
    
    require_once __DIR__ . "\iValidator.interface.php";
    
    /**
    A Validator is composed of multiple iValidatorParts.
    */
    class Validator implements iValidator{        
        private $validation_parts = array();
        
        /**
        Provide the parts this validator consists of.
        */
        function __construct(iValidatorPart ...$validator_parts){ 
            if(isset($validator_parts)){
                $this->validation_parts = $validator_parts;           
            }
        }
                
        /**
        Runs all validation parts in order.
        @var is the variable to validate.
        */        
        function validate($var){   
            $result; 
            foreach ($this->validation_parts as $validation_part) {
                $result = $validation_part->validate_method($var);
                if(is_null($result) == false){
                    return $result;
                }
            }
        }
        
        /**
        Return the parts this validator consists of.
        */
        function get_parts(){
            return $this->validation_parts;
        }
    }