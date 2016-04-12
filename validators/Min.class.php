<?php
    namespace Validation\validators;

    require_once __DIR__ . "/IsNumeric.class.php";
    
    require_once __DIR__ . "/../Validator.class.php";
    use Validation\Validator;

    require_once __DIR__ . "/../validatorparts/minpart.class.php";
    use Validation\ValidatorParts\MinPart;

    /**
    Validator to validate a minimum value.
    Uses messages: "Exists","IsNumeric","Min"
    */
    class Min extends Validator{
        
        /**
        Min is minimum allowed value.
        */
        function __construct($min, $messages = null){
            $is_numeric_validator = new IsNumeric($messages);
            $min_part = new MinPart($min, $messages["Min"]);
            parent::__construct($min_part,...$is_numeric_validator->get_parts());
        }
    }
?>