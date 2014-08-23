<?php
// Define path to public directory
defined('APPLICATION_PUBLIC')
    || define('APPLICATION_PUBLIC', realpath(dirname(__FILE__) . '/public'));

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/application'));

// Define path to application directory
defined('SCHIEBEN_HELPERS_PATH')
    || define('SCHIEBEN_HELPERS_PATH', realpath(dirname(__FILE__) . '/library/Schieben/View/Helpers'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();