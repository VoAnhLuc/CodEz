<?php

    /*  
        This method use for check an array value. 
        If any value in array is empty, return true.
        The other cases return false.
    */
    function isAnyEmptyValue($arr)
    {
        foreach($arr as $value)
        {
            if (empty($value))
            {
                return true;
            }
        }
        return false;
    }