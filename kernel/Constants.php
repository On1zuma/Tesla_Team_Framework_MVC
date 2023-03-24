<?php


final class Constants
{
    // Constants relatided to paths

    public const DIRECTORY_VIEWS       = '/view/';

    public const DIRECTORY_MODEL       = '/model/';

    public const DIRECTORY_KERNEL      = '/kernel/';

    public const DIRECTORY_CONTROLLERS = '/controller/';

    public const DIRECTORY_EXCEPTIONS  = '/kernel/Exceptions/';


    public static function rootDirectory()
    {
        return realpath(__DIR__ . '/../');
    }

    public static function kernelRepertory()
    {
        return self::rootDirectory() . self::DIRECTORY_KERNEL;
    }

    public static function directoryViews()
    {
        return self::rootDirectory() . self::DIRECTORY_VIEWS;
    }

    public static function directoryModel()
    {
        return self::rootDirectory() . self::DIRECTORY_MODEL;
    }

    public static function directoryExceptions()
    {
        return self::rootDirectory() . self::DIRECTORY_EXCEPTIONS;
    }

    public static function directoryControllers()
    {
        return self::rootDirectory() . self::DIRECTORY_CONTROLLERS;
    }
}
