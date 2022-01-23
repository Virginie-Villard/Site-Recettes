<?php

/**
 * Print a html human readable value for debug
 * @param $value
 * @return void
 */
function debug($value)
{
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

