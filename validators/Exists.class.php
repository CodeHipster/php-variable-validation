<?php
    namespace Validation\validators;
    
    require_once __DIR__ . "/../Validator.class.php";
    use Validation\Validator;
    
    require_once __DIR__ . "/../validatorparts/existspart.class.php";
    use Validation\ValidatorParts\ExistsPart;

    /**
    Validator to validate if variable exists.
    */
    class Exists extends Validator{
        
        function __construct($message = null){
            $exists_part = new ExistsPart($message);            
            parent::__construct($exists_part);
        }        
    }

?>