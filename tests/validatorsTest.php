<?php

    use Validation\validators\IsNumeric;
    use Validation\validators\Max;
    use Validation\validators\InRange;
    use Validation\validators\Exists;
    use Validation\validators\Min;

    require_once "../validators/IsNumeric.class.php";
    require_once "../validators/Max.class.php";
    require_once "../validators/InRange.class.php";
    require_once "../validators/Min.class.php";
    require_once "../validators/Exists.class.php";

class ValidatorTests extends PHPUnit_Framework_TestCase
{
    
    function test_Exists_validate(){
        //arrange        
        $validator = new Exists();
        
        //act
        $result = $validator->validate(null);
        $result2 = $validator->validate("a string variable");
        
        //assert
        $this->assertEquals('does not exist', $result);
        $this->assertEquals(null, $result2);        
    }
    
    public function test_IsNumeric_validate()
    {
        //arrange        
        $validator = new IsNumeric();
        
        //act
        $result = $validator->validate("nah, not a number");
        $result2 = $validator->validate(68);
        
        //assert
        $this->assertEquals('not numeric', $result);
        $this->assertEquals(null, $result2);
    }
    
    
    function test_InRange_validate(){
        //arrange        
        $max = 6;
        $min = 3;
        $validator = new InRange($min,$max);
        
        //act
        $result = $validator->validate(9);
        $result2 = $validator->validate(2);
        $result3 = $validator->validate(4);
        
        //assert
        $this->assertEquals("greater then {$max}", $result);        
        $this->assertEquals("smaller then {$min}", $result2);       
        $this->assertEquals(null, $result3);        
    }
    
    function test_Max_validate(){
        //arrange   
        $max = 6;     
        $validator = new Max($max);
        
        //act
        $result = $validator->validate(8);
        $result2 = $validator->validate(4);
        
        //assert
        $this->assertEquals("greater then {$max}", $result);
        $this->assertEquals(null, $result2);        
    }
    
    function test_Min_validate(){
        //arrange   
        $min = 3;     
        $validator = new Min($min);
        
        //act
        $result = $validator->validate(2);
        $result2 = $validator->validate(4);
        
        //assert    
        $this->assertEquals("smaller then {$min}", $result);
        $this->assertEquals(null, $result2);            
    }    
}
?>