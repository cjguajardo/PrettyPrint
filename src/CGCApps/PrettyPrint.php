<?php

namespace CGCApps;

class PrettyPrint
{
  private $style = '';
  private $scripts = '';

  public function __construct()
  {
    //load style.css into $style
    $this->style = file_get_contents(__DIR__ . '/style.css');
    //load scripts.js into $scripts
    $this->scripts = file_get_contents(__DIR__ . '/scripts.js');
  }

  public function print()
  {
    //check if headers are already sent
    if (!headers_sent()) {
      header("Content-Type: text/html");
    }

    $data = "";
    $args = func_get_args();
    foreach ($args as $arg) {
      $data .= $this->processLine($arg);
    }

    echo "<style>$this->style</style>";
    echo "$data";
    echo "<script type='text/javascript'>$this->scripts</script>";
  }

  public function printAndDie()
  {
    $this->print(...func_get_args());
    die();
  }

  public function getLine($type, $value)
  {
    return "<span class='type'>$type</span>: <span class='value {$type}'>$value</span>";
  }

  public function getValue($arg)
  {
    $type = gettype($arg);
    if ($type == 'string') {
      $value = htmlspecialchars($arg);
      $value = "&quot;$value&quot;";
    } else {
      $value = $arg;
      if ($type === 'boolean') {
        $value = $value ? 'true' : 'false';
      } else if ($type === 'NULL') {
        $value = 'NULL';
      }
    }
    return $value;
  }

  public function processLine($arg, $key = null)
  {
    $data = '';
    $type = gettype($arg);
    $value = $this->getValue($arg);
    if ($type === 'object' || $type == 'array') {
      $id = md5(uniqid(rand()), false);
      $data .= "<div class='parent-block start' target-block='$id'>";
      if ($key && gettype($key) == 'string') {
        $data .= "[$key] ";
      }
      if ($type === 'array') {
        $items  = count($arg);
        $data .= "<span class='type array'>array($items)</span>";
      } else {
        $class = get_class($arg);
        $value = json_decode(json_encode($arg), true);
        $items = count($value);
        $data .= "<span class='type object'>object($class) ($items)</span>";
      }
      $data .= "<span class='key-open'>{</span>";
      $data .= "</div>";
      $data .= "<div class='children-block' id='$id'>";
      foreach ($value as $key => $value) {
        $data .=  $this->processLine($value, $key);
      }
      $data .= "</div>";
      $data .= "<div class='parent-block end'>}</div>";
    } else {
      $data .= "<div class='child'>";
      if ($key && gettype($key) == 'string') {
        $data .= "[$key] ";
      }
      $data .= $this->getLine($type, $value);
      $data .= '</div>';
    }

    return $data;
  }
}
