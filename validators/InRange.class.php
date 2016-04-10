<?php
    namespace VariableValidation\validators;
    use VariableValidation\Validator;
    use VariableValidation\iValidatorPart;

    require_once "..\Validator.class.php";
    require_once "..\iValidatorPart.interface.php";
    require_once "Max.class.php";
    require_once "Min.class.php";    

    /**
    Validator to check if variable is within range.
    */
    class InRange extends Validator{
        
        /**
        Min is minimum allowed value.
        Max is maximum allowed value.
        */
        function __construct($min,$max){            
            $min_validator = new Min($min);
            $max_validator = new Max($max);
            parent::__construct(...array_merge($min_validator->get_parts()
                ,$max_validator->get_parts()));
        }      
    }
    
   ?>