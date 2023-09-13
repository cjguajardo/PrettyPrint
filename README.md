## README

This project includes a PHP class named `PrettyPrint` that can be used to print data in a visually appealing way. The class has the following methods:

- `print()`: Prints the data in a visually appealing way.
- `printAndDie()`: Prints the data in a visually appealing way and terminates the script.

To use the `PrettyPrint` class, you can create an instance of the class and call the `print()` or `printAndDie()` method with the data you want to print. The class will format the data and print it in a visually appealing way.

### Dependencies

This project does not have any external dependencies.

### Installation

You can install this project via Composer by adding the following to your `composer.json` file:

```json
{
  "require": {
    "cgcapps/pretty-print": "^1.0"
  }
}
```

Then run `composer install`.

### Usage

To use the `PrettyPrint` class, you can create an instance of the class and call the `print()` or `printAndDie()` method with the data you want to print. For example:

```php
use CGCApps\PrettyPrint;

$pp = new PrettyPrint();
$pp->print($data);
// or
$pp->printAndDie($data);
```

This will print the data in a visually appealing way.

### License

This project is licensed under the MIT License. Please see the `LICENSE` file for more information.

## README

This project includes a PHP class named `PrettyPrint` that can be used to print data in a visually appealing way. The class has the following methods:

- `print()`: Prints the data in a visually appealing way.
- `printAndDie()`: Prints the data in a visually appealing way and terminates the script.

To use the `PrettyPrint` class, you can create an instance of the class and call the `print()` or `printAndDie()` method with the data you want to print. The class will format the data and print it in a visually appealing way.

### Dependencies

This project does not have any external dependencies.

### Installation

You can install this project via Composer by adding the following to your `composer.json` file:

```json
{
  "require": {
    "cgcapps/pretty-print": "^1.0"
  }
}
```

Then run `composer install`.

### Usage

To use the `PrettyPrint` class, you can create an instance of the class and call the `print()` or `printAndDie()` method with the data you want to print. For example:

```php
use CGCApps\PrettyPrint;

$pp = new PrettyPrint();
$pp->print($data);
```

This will print the data in a visually appealing way.

![App Screenshot](https://github.com/cjguajardo/PrettyPrint/blob/main/assets/pretty-print.gif)
![App Screenshot](https://github.com/cjguajardo/PrettyPrint/blob/main/assets/pretty-print.png)

### License

This project is licensed under the MIT License. Please see the `LICENSE` file for more information.
