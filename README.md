# view

Simple PHP view-renderer.

## Requirements

PHP 7.1+

## Installation

Via composer:

``` bash
$ composer require rkulik/view:dev-master
```

## Usage

Initialize view factory and render `template.php`:

```php
<?php
require 'vendor/autoload.php';

$viewFactory = new \Rkulik\View\ViewFactory();

$data = 'example string';

echo $viewFactory->make('template.php')->with(compact('data'));
```

Handle `data` inside `template.php`:

```php
<?php

echo $data;
```
