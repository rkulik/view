# view

Simple PHP view-renderer.

## Requirements

PHP 5.6+

## Installation

Via composer:

``` bash
$ composer require rkulik/view:dev-master
```

## Usage

Initialize classes and render `template.php`:

```php
<?php
require 'vendor/autoload.php';

use Rkulik\View\Renderer;
use Rkulik\View\Validator;
use Rkulik\View\View;

$renderer = new Renderer(new Validator);
$view = new View($renderer);

$data = 'example string';

echo $view->make('template.php')->with(compact('data'));
```

Handle `data` inside `template.php`:

```php
<?php

echo $data;
```