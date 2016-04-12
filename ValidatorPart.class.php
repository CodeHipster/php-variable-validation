<?php

namespace Validation;
    
    require_once __DIR__ . "./iValidatorPart.interface.php";
    
    /**
    A Validator is composed of multiple iValidatorParts including itself..
    */
    abstract class ValidatorPart implements iValidatorPart{
        
        protected $fail_message; 
        
        function __construct($message){
            $this->set_message($message);
        }
        
        /**
        A method for validating
        Returns null or a string error message.
        */
        abstract function validate_method($var);        
        
        /**
        Set the fail message for this validator part.
        */
        function set_message($message){
            $this->fail_message = $message;
        }        
    }
?>