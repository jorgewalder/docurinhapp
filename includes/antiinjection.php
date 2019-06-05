<?php
function antiinjection($str)
{
    global $link;
    return !is_numeric($str) ? mysqli_real_escape_string ( $link , $str ) : $str;
}
