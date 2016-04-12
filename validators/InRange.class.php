<?php
    namespace Validation\validators;
    
    require_once __DIR__ . "/Max.class.php";
    require_once __DIR__ . "/Min.class.php";

    require_once __DIR__ . "/../Validator.class.php";
    use Validation\Validator;

    /**
    Validator to check if variable is within range.
    Uses messages: "Exists","IsNumeric","Min", "Max"
    */
    class InRange extends Validator{
        
        /**
        Min is minimum allowed value.
        Max is maximum allowed value.
        */
        function __construct($min,$max, $messages = null){
            $min_validator = new Min($min, $messages);
            $max_validator = new Max($max, $messages);
            parent::__construct(...$min_validator->get_parts()
                ,...$max_validator->get_parts());
        }
    }
?>