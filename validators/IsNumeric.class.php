<?php
    namespace Validation\validators;
    
    require_once __DIR__ . "/Exists.class.php";    

    require_once __DIR__ . "/../Validator.class.php";
    use Validation\Validator;
    
    require_once __DIR__ . "/../validatorparts/isnumericpart.class.php";
    use Validation\ValidatorParts\IsNumericPart;

    /**
    Validator to validate if variable is numeric.
    Uses messages: "Exist" and "IsNumeric"
    */
    class IsNumeric extends Validator{
        
        function __construct($messages = null){
            $exists_validator = new Exists($messages);
            $is_numeric_part = new IsNumericPart($messages["IsNumeric"]);
            parent::__construct($is_numeric_part, ...$exists_validator->get_parts());
        }
    }
?>