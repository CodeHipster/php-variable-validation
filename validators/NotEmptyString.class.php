<?php
    namespace Validation\validators;
    
    require_once __DIR__ . "/Exists.class.php";    

    require_once __DIR__ . "/../Validator.class.php";
    use Validation\Validator;
    
    require_once __DIR__ . "/../validatorparts/notemptystringpart.class.php";
    use Validation\ValidatorParts\NotEmptyStringPart;

    /**
    Validator to validate if variable is not empty.
    Uses messages: "Exist" and "NotEmptyString"
    */
    class NotEmptyString extends Validator{
        
        function __construct($messages = null){
            $exists_validator = new Exists($messages);
            $not_empty_string_part = new NotEmptyStringPart($messages["NotEmptyString"]);
            parent::__construct($not_empty_string_part, ...$exists_validator->get_parts());
        }
    }
?>