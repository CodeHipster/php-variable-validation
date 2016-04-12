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
        
        /**
        Set the error message for this validator part.
        */
        function set_message($error_message);        
    }

?>