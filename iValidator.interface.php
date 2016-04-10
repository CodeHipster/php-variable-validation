<?php

    namespace Validation;

    /**
    Validator is composed of parts and is able to validate the parts.
    */
    interface iValidator{
                
        /**
        return error message or null.
        */
        public function validate($var);
        
        /**
        return iValidatorParts this validator consists of.
        */
        public function get_parts();
    }

?>