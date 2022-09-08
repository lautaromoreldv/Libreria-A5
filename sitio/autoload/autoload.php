<?php
    spl_autoload_register(function($clase) {
        $archivo = __DIR__.'./../clases/' .$clase. '.php';
        if(!file_exists($archivo)){
            return false;
        }
        require_once $archivo;
    });