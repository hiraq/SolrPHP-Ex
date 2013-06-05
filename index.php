<?php

/*
 * main
 */
define('ROOT',__DIR__);
define('DS',DIRECTORY_SEPARATOR);
define('LIB',ROOT.DS.'lib'.DS);
define('INC',ROOT.DS.'includes'.DS);
define('CONFIG',ROOT.DS.'configs'.DS);

/*
 * paths
 */
define('PATH_CORE',LIB.'Core'.DS);

//error level
define('DEBUG_LEVEL',1);

/*
 * check php version
 * only run at php version >= 5.3
 */
$phpVersion = floatval(PHP_VERSION);
if ($phpVersion < 5.3) {
    echo 'This example application need php version at least 5.3';
} elseif (!class_exists('Redis')) {
    echo 'Please install php extension for redis - https://github.com/nicolasff/phpredis';
} else {
    
    /*
     * load core apps
     */
    require_once(PATH_CORE.'Debug.php'); 
    require_once(PATH_CORE.'Import.php');
    require_once(PATH_CORE.'Request.php');
    require_once(PATH_CORE.'Response.php');    
    require_once(PATH_CORE.'Assets.php');    
    require_once(PATH_CORE.'Config.php');    
    require_once(PATH_CORE.'Exception/PageException.php');
    require_once(PATH_CORE.'Exception/SystemException.php');       
    
    $debug = new \Core\Debug();
    $debug->init();
    
    /*
     * run apps
     */
    $request = new \Core\Request();
    $request->setupGlobalUri();    
    
    /*
     * give response
     */
    try {
        
        $response = new \Core\Response($request);
        $response->listen();                          
        
    }catch(\Core\Exception\PageException $e) {//page not found
        echo '<h1>'.$e->getMessage().'</h1>';
    }catch(\Core\Exception\SystemException $e) {//system error
        echo '<h1>System error: '.$e->getMessage().'</h1>';
    }catch(Exception $e) {
        echo '<h1>Exception: '.$e->getMessage().'</h1>';
    }
    
}