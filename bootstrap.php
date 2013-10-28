<?php

// Define default directories
define("ROOT_PATH", dirname(__FILE__));
define("ADMIN_BASE", ROOT_PATH . '/');

define("LIB_BASE", ADMIN_BASE . 'libs/');
define("LOGS_BASE", ADMIN_BASE . 'logs/');

// Include our auto-loader
require_once(ADMIN_BASE . 'autoload.php');