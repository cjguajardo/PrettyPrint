<?php

function autoload($nombre_clase)
{
  $ruta_archivo = str_replace('\\', '/', $nombre_clase) . '.php';

  require_once $ruta_archivo;
}

spl_autoload_register('autoload');
