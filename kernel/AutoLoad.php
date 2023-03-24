<?php

require 'kernel/Constants.php';

final class AutoLoad
{
    public static function LoadKernelClasses($S_className)
    {
        $S_file = Constants::kernelRepertory() . "$S_className.php";
        return static::_load($S_file);
    }

    public static function loadClassesModel($S_className)
    {
        $S_file = Constants::directoryModel() . "$S_className.php";

        return static::_load($S_file);
    }

    public static function loadClassesException($S_className)
    {
        $S_file = Constants::directoryExceptions() . "$S_className.php";

        return static::_load($S_file);
    }

    public static function loadClassesView($S_className)
    {
        $S_file = Constants::directoryViews() . "$S_className.php";

        return static::_load($S_file);
    }

    public static function loadClassesController($S_className)
    {
        $S_file = Constants::directoryControllers() . "$S_className.php";

        return static::_load($S_file);
    }
    private static function _load($S_file)
    {
        if (is_readable($S_file)) {
            require $S_file;
        }
    }
}

spl_autoload_register('AutoLoad::LoadKernelClasses');
spl_autoload_register('AutoLoad::loadClassesException');
spl_autoload_register('AutoLoad::loadClassesModel');
spl_autoload_register('AutoLoad::loadClassesView');
spl_autoload_register('AutoLoad::loadClassesController');
