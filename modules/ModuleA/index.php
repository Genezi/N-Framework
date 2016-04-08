<?php
require_once 'controller.php';

$controller = new ControllerModuleA();
$html = $controller->onEventHandler();
print $html;