<?php
    namespace Validation\validators;
    
    require_once __DIR__ . "/Exists.class.php";    

    require_once __DIR__ . "/../Validator.class.php";
    use Validation\Validator;
    
    require_once __DIR__ . "/../validatorparts/notemptypart.class.php";
    use Validation\ValidatorParts\NotEmptyPart;

    /**
    Validator to validate if variable is not empty.
    Uses messages: "Exist" and "NotEmpty"
    */
    class NotEmpty extends Validator{
        
        function __construct($messages = null){
            $exists_validator = new Exists($messages);
            $not_empty_part = new NotEmptyPart($messages["NotEmpty"]);
            parent::__construct($not_empty_part, ...$exists_validator->get_parts());
        }
    }
?>