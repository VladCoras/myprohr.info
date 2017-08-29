<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function error_string($prefix = '', $suffix = '')
    {
        // No errrors, validation passes!
        if (count($this->_error_array) === 0)
        {
            return '';
        }

        $errors = array();

        foreach ($this->_error_array as $key => $val)
        {
            if ($val != '')
            {
                $errors[$key] = $val;
            }
        }

        return $errors;
    }
}