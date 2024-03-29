<?php

if(!defined('helloFromMethod')) {
    function helloFromMethod() {
        return "Hello from Method!\n";
    }
}

echo helloFromMethod();
echo("Hello World!\n");