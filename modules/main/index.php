<?php
require_once 'Controller.php';

$controller = new Controller();
$html = $controller->onEventHandler();
print $html;