<?php
// Write a program to check whether the given string is a palindrome or not.
$str = "madam";

if ($str == strrev($str))
    echo "Palindrome";
else
    echo "Not Palindrome";
?>