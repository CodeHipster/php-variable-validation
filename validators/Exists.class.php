<?php
    namespace Validation\validators;
    
    require_once __DIR__ . "/../Validator.class.php";
    use Validation\Validator;
    
    require_once __DIR__ . "/../validatorparts/existspart.class.php";
    use Validation\ValidatorParts\ExistsPart;

    /**
    Validator to validate if variable exists.
    Uses message: "Exists"
    */
    class Exists extends Validator{
        
        function __construct($messages = null){
            $exists_part = new ExistsPart($messages["Exists"]);           
            parent::__construct($exists_part);
        }        
    }

?>