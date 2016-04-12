PHP variable validation.
========================

Use provided validators or easily create your own.

Usage
-----

    <?php
        namespace YourNameSpace;
        
        require_once "vendor/CodeHipster/validation/validators/InRange.class.php";
        use Validation\validators\InRange;

        require_once "YourValidator.php";
        
        $custom_messages = array(
            "Exists"=>"Variable cannot be null.",
            "IsNumeric"=>"Variable is not a number",
            "Max"=>"Variable is greater than maximum",
            "Min"=>"Variable is smaller than minimum",
            "YourValidator"=>"Custom YourValidator message");

        $in_range_validator = new InRange(3, 6, $custom_messages);
        $your_validator = new YourValidator($custom_messages);

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

        require_once "vendor/CodeHipster/validation/Validator.class.php";
        use Validation\Validator;
        
        require_once "vendor/CodeHipster/validation/iValidatorPart.interface.php";
        use Validation\iValidatorPart;
        
        require_once "vendor/CodeHipster/validation/validators/Exists.class.php";
        use Validation\validators\Exists;
        
        require_once "vendor/CodeHipster/validation/ValidatorPart.class.php";
        use Validation\ValidatorPart;
            
        class YourValidatorPart extends ValidatorPart{
            
            function __construct($message = null){
                parent::__construct($message ?? "default message");
            }
            
            public function validate_method($var){
                if($var == "some_value"){
                    return $this->fail_message;
                }
                else{
                    return null;
                }           
            }
        }

        class YourValidator extends Validator {

            function __construct($messages = null){
                $exists_validator = new Exists($messages);
                $your_part = new YourValidatorPart($messages["YourValidator"]);
                parent::__construct($your_part, ...$exists_validator->get_parts());
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

> Will be in packagist shortly
