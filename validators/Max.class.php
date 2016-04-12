<?php
    namespace Validation\validators;
    
    require_once __DIR__ . "/IsNumeric.class.php";

    require_once __DIR__ . "/../Validator.class.php";
    use Validation\Validator;
    
    require_once __DIR__ . "/../validatorparts/maxpart.class.php";
    use Validation\ValidatorParts\MaxPart;

    /**
    Validator to validate a maximum value.
    */
    class Max extends Validator{
        
        /**
        Max is maximum allowed value.
        Uses messages: "Exists","IsNumeric","Max"
        */
        function __construct($max, $messages = null){
            
            $is_numeric_validator = new IsNumeric($messages);
            $max_part = new MaxPart($max, $messages["Max"]);
            parent::__construct($max_part, ...$is_numeric_validator->get_parts());
        }       
    }
    
   ?>