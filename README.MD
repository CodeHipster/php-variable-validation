PHP variable validation.
========================

Use provided validators or easily create your own.

Usage
-----

    <?php
        namespace YourNameSpace;
        
        use Validation\validators\InRange;

        require_once "vendor/CodeHipster/validation/validators/InRange.class.php";
        require_once "YourValidator.php";

        $in_range_validator = new InRange(3,6);
        $your_validator = new YourValidator();

        var_dump($in_range_validator->validate(8));
        var_dump($your_validator->validate("some_value"));
    ?>
    
Custom validator
----------------

A validator is composed of one or more parts.
Extend the Validator class or create your implementation of an iValidator

A part is just a validation method.
Usually you can just extend Validator and implement an iValidatorPart. 

    <?php
        namespace YourNameSpace;
        use Validation\Validator;
        use Validation\iValidatorPart;
        use Validation\validators\Exists;

        require_once "vendor/CodeHipster/validation/Validator.class.php";
        require_once "vendor/CodeHipster/validation/iValidatorPart.interface.php";
        require_once "vendor/CodeHipster/validation/validators/Exists.class.php";

        class YourValidator extends Validator implements iValidatorPart{

            function __construct(){
                $exists_validator = new Exists();
                parent::__construct($this,...$exists_validator->get_parts());
            }

            public function validate_method($var){
                if($var == "some_value"){
                    return "your error message.";
                }else{
                    null;
                }
            }
        }
    ?>
    
Install with composer
---------------------
composer: https://getcomposer.org/
 
composer.json:

    {
        "repositories": [
            {
                "type": "vcs",
                "url": "https://github.com/CodeHipster/php-variable-validation"
            }
        ],
        "require": {
            "CodeHipster/validation": "v1.*"
        }
    }

> will be in packagist shortly
