<?php

    namespace VariableValidation\tests;
    use VariableValidation\validators\IsNumeric;
    use VariableValidation\validators\Max;
    use VariableValidation\validators\InRange;

    require_once "../validators/IsNumeric.class.php";
    require_once "../validators/Max.class.php";
    require_once "../validators/InRange.class.php";

    $numeric_validator = new IsNumeric();
    $max_validator = new Max(7);
    $in_range_validator = new InRange(3,6);

    var_dump($numeric_validator->validate("nah, not a number"));
    var_dump($max_validator->validate(8));
    var_dump($in_range_validator->validate(8));

?>