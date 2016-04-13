<?php
    namespace Validation\validators;
    
    require_once __DIR__ . "/Exists.class.php";   
    
    require_once __DIR__ . "/../Validator.class.php";
    use Validation\Validator;
    
    require_once __DIR__ . "/../validatorparts/keyexistspart.class.php";
    use Validation\ValidatorParts\KeyExistsPart;

    /**
    Validator to validate if key exists in given array.
    Uses messages: "Exists", "KeyExists"
    */
    class KeyExists extends Validator{
        
        function __construct(array $map, $messages = null){
            $exists_validator = new Exists($messages);
            $key_exists_part = new KeyExistsPart($map, $messages["KeyExists"]);           
            parent::__construct($key_exists_part, ...$exists_validator->get_parts());
        }        
    }

?>