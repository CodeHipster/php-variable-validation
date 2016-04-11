<?php
    namespace Validation\validators;
    use Validation\Validator;
    use Validation\iValidatorPart;

    require_once __DIR__ . "\..\Validator.class.php";
    require_once __DIR__ . "\..\iValidatorPart.interface.php";
    require_once __DIR__ . "\Max.class.php";
    require_once __DIR__ . "\Min.class.php";    

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