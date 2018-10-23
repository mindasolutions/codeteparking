<?php 

// Composer Autoloader
require_once '../vendor/autoload.php';

require_once 'database.php';

require_once 'core/App.php';

require_once 'core/Controller.php';

define("BASE_URL", "/codete/"); // change it to main directory of script

$app = new App;