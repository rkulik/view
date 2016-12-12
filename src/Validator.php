<?php
namespace Rkulik\View;

use Rkulik\View\Exceptions\FileNotFoundException;
use Rkulik\View\Exceptions\UnsupportedFormatException;

/**
 * Class Validator
 * @package Rkulik\View
 *
 * @author René Kulik <info@renekulik.de>
 */
class Validator
{
    const PHP_EXTENSION = 'php';

    /**
     * @param string $file
     * @throws FileNotFoundException
     * @throws UnsupportedFormatException
     */
    public function validateFile($file)
    {
        if (!\is_file($file)) {
            throw new FileNotFoundException();
        }

        $pathArray = \pathinfo($file);
        if (!isset($pathArray['extension']) || $pathArray['extension'] !== self::PHP_EXTENSION) {
            throw new UnsupportedFormatException();
        }
    }
}
