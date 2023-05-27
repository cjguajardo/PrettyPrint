<?php

require_once __DIR__ . '/autoload.php';

use CGCApps\PrettyPrint;

class CustomClass
{
  public $english = 10;
  public $maths = 20;
}

$dt = new DateTime("1984-02-23");
$obj = new stdClass();
$obj->name = 'James';
$obj->age = 3;

$pp = new PrettyPrint();
$data = [
  'name' => 'John Doe',
  'age' => 39,
  'address' => [
    'street' => '123 Main St',
    'city' => 'Anytown',
    'state' => 'CA',
    'zip' => 12345
  ],
  'birthday' => $dt,
  'children' => [
    [
      'name' => 'Jane Doe',
      'age' => 10,
      'studies' => [
        'subject' => 'Maths',
        'marks' => [
          'term1' => json_decode(json_encode([
            'english' => 10,
            'maths' => 20
          ])),
          'term2' => new CustomClass()
        ]
      ]
    ],
    $obj
  ],
  'married' => true,
  'height' => 100.5,
  'weight' => 85.5,
  'car' => null
];
$pp->print($data);

// echo "<hr><pre>";
// var_dump($data);
// echo "</pre>";
