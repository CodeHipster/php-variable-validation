<?php

    require_once "../validators/IsNumeric.class.php";
    use Validation\validators\IsNumeric;
    require_once "../validators/Max.class.php";
    use Validation\validators\Max;
    require_once "../validators/InRange.class.php";
    use Validation\validators\InRange;
    require_once "../validators/Exists.class.php";
    use Validation\validators\Exists;
    require_once "../validators/Min.class.php";
    use Validation\validators\Min;
    require_once "../validators/KeyExists.class.php";
    use Validation\validators\KeyExists;


class ValidatorTests extends PHPUnit_Framework_TestCase
{
    private $custom_messages = array(
        "Exists"=>"Custom Exists message",
        "IsNumeric"=>"Custom IsNumeric message",
        "Max"=>"Custom Max message",
        "Min"=>"Custom Min message",
        "KeyExists"=>"Custom KeyExists message");
    
    function test_Exists_validate(){
        //arrange        
        $validator = new Exists();
        $validator_custom = new Exists($this->custom_messages);
        
        //act
        $default = $validator->validate(null);
        $null = $validator->validate("a string variable");
        $custom = $validator_custom->validate(null);        
        
        //assert
        $this->assertEquals('does not exist', $default);
        $this->assertEquals(null, $null);
        $this->assertEquals($this->custom_messages["Exists"], $custom);
    }
    
    public function test_IsNumeric_validate()
    {
        //arrange        
        $validator = new IsNumeric();
        $validator_custom = new IsNumeric($this->custom_messages);
        
        //act
        $default = $validator->validate("nah, not a number");
        $null = $validator->validate(68);
        $custom = $validator_custom->validate("nah, not a number");
        
        //assert
        $this->assertEquals('not numeric', $default);
        $this->assertEquals(null, $null);
        $this->assertEquals($this->custom_messages["IsNumeric"], $custom);
    }
    
    
    function test_InRange_validate(){
        //arrange        
        $max = 6;
        $min = 3;
        $validator = new InRange($min,$max);
        $validator_custom = new InRange($min,$max,$this->custom_messages);
        
        //act
        $default_greater = $validator->validate(9);
        $default_smaller = $validator->validate(2);
        $null = $validator->validate(4);
        $custom_greater = $validator_custom->validate(9);
        $custom_smaller = $validator_custom->validate(2);
        
        //assert
        $this->assertEquals("greater then {$max}", $default_greater);        
        $this->assertEquals("smaller then {$min}", $default_smaller);       
        $this->assertEquals(null, $result3);
        $this->assertEquals($this->custom_messages["Max"], $custom_greater);
        $this->assertEquals($this->custom_messages["Min"], $custom_smaller);
    }
    
    function test_Max_validate(){
        //arrange   
        $max = 6;     
        $validator = new Max($max);
        $validator_custom = new Max($max,$this->custom_messages);
        
        //act
        $default = $validator->validate(8);
        $null = $validator->validate(4);
        $custom = $validator_custom->validate(8);
        
        //assert
        $this->assertEquals("greater then {$max}", $default);
        $this->assertEquals(null, $null);
        $this->assertEquals($this->custom_messages["Max"], $custom);
    }
    
    function test_Min_validate(){
        //arrange   
        $min = 3;     
        $validator = new Min($min);
        $validator_custom = new Min($min,$this->custom_messages);
        
        //act
        $default = $validator->validate(2);
        $null = $validator->validate(4);
        $custom = $validator_custom->validate(2);
        
        //assert    
        $this->assertEquals("smaller then {$min}", $default);
        $this->assertEquals(null, $null);
        $this->assertEquals($this->custom_messages["Min"], $custom);
    }
    
    function test_KeyExists_validate(){
        //arrange   
        $map = array("test" => 1, "test2" => 2);     
        $validator = new KeyExists($map);
        $validator_custom = new KeyExists($map,$this->custom_messages);
        
        //act
        $default = $validator->validate("non existent key");
        $null = $validator->validate("test2");
        $custom = $validator_custom->validate("non existent key");
        
        //assert    
        $this->assertEquals("key does not exist", $default);
        $this->assertEquals(null, $null);
        $this->assertEquals($this->custom_messages["KeyExists"], $custom);
    }
}
?>