# view

Lightweight PHP view-renderer.

- [Requirements](#requirements)
- [Install](#install)
- [Usage](#usage)
- [Testing](#testing)
- [Changelog](#changelog)
- [Contributing](#contributing)
- [Security](#security)
- [Credits](#credits)
- [License](#license)

## Requirements

This package requires PHP 7.1 or higher.

## Install

Via composer

``` bash
$ composer require rkulik/view
```

## Usage

Initialize view factory and render `template.php`:

``` php
<?php

require 'vendor/autoload.php';

$viewFactory = new \Rkulik\View\ViewFactory();

$helloWorld = 'Hello, World!';

echo $viewFactory->make('template.php')->with(compact('helloWorld'));
```

Handle `data` inside `template.php`:

``` php
<?php

echo '<h1>' . $helloWorld . '</h1>';
```

## Testing

``` bash
$ composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email rene@kulik.io instead of using the issue tracker.

## Credits

- [René Kulik](https://github.com/rkulik)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
