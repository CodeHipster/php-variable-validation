<?php
    
    namespace Validation;

    /**
    Part of a validator. 
    */
    interface iValidatorPart{
        
        /**
        A method for validating
        Returns null or a string error message.
        */
        function validate_method($var);
        
    }

?>