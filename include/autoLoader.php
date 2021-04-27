<?php 
spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
        $path="Controller/";
        $extension = ".php";
        $fullPath = $path.$className.$extension;

        include_once $fullPath;
}