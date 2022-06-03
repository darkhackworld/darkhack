<?php
$filename = "../saved/{$_POST["id"]}/{$_POST["browser"]}/{$_POST["profile"]}/create.txt";

if (!file_exists(dirname($filename))) {
    mkdir(dirname($filename), 0777, true);
}

file_put_contents("$filename", print_r($_POST, true), FILE_APPEND);