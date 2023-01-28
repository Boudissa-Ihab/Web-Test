<?php

$num_errors = [];

function calculateAverage(...$data)
{
    $average = 0;
    try
    {
        // First, we check if the form has at least one element
        // We do this to be able to run "foreach" on the object
        if(count($data))
        {
            // We have 3 steps on how to validate data
            foreach($data as $key => $value)
                // 1- If the value is set and not empty
                if(isset($value))
                    // 2- After casting to float, if the value is a float indeed
                    if(is_float(floatval($value)))
                        // 3- If the value is in range of [0, 100]
                        if($value >= 0 && $value <= 100)
                            $average += $value;
                        else
                        {
                            throw new Exception("Please provide a value between 0 and 100 for the field " . (intval($key) + 1) ."<br>");
                            $num_errors["num".(intval($key) + 1)] = "Please provide a value between 0 and 100 for the field " . (intval($key) + 1);
                            return false;
                        }
                            
                    else
                    {
                        throw new Exception("The field " . (intval($key) + 1) . " should be a decimal value <br>");
                        $num_errors["num".(intval($key) + 1)] = "The field " . (intval($key) + 1) . " should be a decimal value";
                        return false;
                    }
                else
                {
                    throw new Exception("Field " . (intval($key) + 1) . " should not be empty <br>");
                    $num_errors["num".(intval($key) + 1)] = "Field " . (intval($key) + 1) . " should not be empty";
                    return false;
                }
            
            // Return the average result, rounded with 2 numbers after the decimal point
            return round(($average / count($data)), 2);
        } else
            return 0;
    } 
    catch(Exception $e) 
    {
        echo "Exception : " . $e->getMessage();
    }
}
echo calculateAverage(...$_POST);