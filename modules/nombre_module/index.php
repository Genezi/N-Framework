<?php
require_once 'controller.php';

$controller = new Controller();
$html = $controller->onEventHandler();
print $html;