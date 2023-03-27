<?php
// title H1
function titleH1($title)
{
    echo "<h1 class='text-3xl font-black text-center pb-6'>{$title}</h1>";
}

// debug array
function debug_array($arr)
{
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

// print error message
function errorMsg($name)
{
    global $error;
    if (isset($error[$name])) {
        echo $error[$name];
    }
}

// show value of input
function showInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}

// show value of input in update
function showUpdateInputValue($name, $str)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    } else {
        echo $str;
    }
}

// show value of select
function showSelectValue($name, $value)
{
    if (!(empty($_POST[$name])) && $_POST[$name] == $value) {
        echo "selected";
    }
}

function showUpdateSelectValue($name, $value, $storedValue)
{
    if (!(empty($_POST[$name])) && $_POST[$name] == $value) {
        echo "selected";
    } elseif (empty($_POST[$name])) {
        if ($storedValue == $value) {
            echo "selected";
        }
    }
}

function showRadioValue($name, $value)
{
    if (!isset($_POST[$name]) && $value == 1) {
        echo "checked";
    } elseif (!isset($_POST[$name])) {
        echo "";
    } elseif ($_POST[$name] == $value) {
        echo "checked";
    }
}

function showUpdateRadioValue($name, $value, $storedValue)
{
    if (isset($_POST[$name]) && $_POST[$name] == $value) {
        echo "checked";
    } elseif (!isset($_POST[$name])) {
        if ($value == $storedValue) {
            echo "checked";
        }
    }
}

// clean input
function cleanInput($string)
{
    return trim(htmlspecialchars($string));
}