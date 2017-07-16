<?php

namespace Rkulik\View\Validators;

use Rkulik\View\Exceptions\FileNotFoundException;
use Rkulik\View\Exceptions\UnsupportedFormatException;

/**
 * Class Validator
 * @package Rkulik\View\Validators
 *
 * @author René Kulik <info@renekulik.de>
 */
class Validator implements ValidatorInterface
{
    public const PHP_EXTENSION = 'php';

    /**
     * @param string $file
     * @throws FileNotFoundException
     * @throws UnsupportedFormatException
     */
    public function validate(string $file): void
    {
        if (!\is_file($file)) {
            throw new FileNotFoundException();
        }

        $pathInfo = \pathinfo($file);
        if (!isset($pathInfo['extension']) || $pathInfo['extension'] !== self::PHP_EXTENSION) {
            throw new UnsupportedFormatException();
        }
    }
}
