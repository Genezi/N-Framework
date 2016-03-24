<?php
$dir = str_replace("\\", "/", __DIR__);
$dir = str_replace("core/","", $dir."/");
$server = (substr($_SERVER['DOCUMENT_ROOT'], -1)=="/")?substr($_SERVER['DOCUMENT_ROOT'], 0,-1):$_SERVER['DOCUMENT_ROOT'];
$ruta = explode($server,$dir);
define("RUTA", $ruta[1]);

define("ROOT",$server.RUTA);