<?php

namespace Rkulik\View\Test;

use PHPUnit_Framework_TestCase;

/**
 * Class BaseTestCase
 * @package Rkulik\View\Test
 *
 * @author René Kulik <rene@kulik.io>
 */
abstract class BaseTestCase extends PHPUnit_Framework_TestCase
{
    private const MOCK_DIRECTORY = __DIR__ . DIRECTORY_SEPARATOR . 'mocks';
    protected const FILE_WHICH_IS_VALID = 'valid.php';
    protected const FILE_WITH_UNSUPPORTED_EXTENSION = 'unsupportedExtension.txt';
    protected const FILE_WHICH_DOES_NOT_EXIST = 'notExisting.php';
    protected const FILE_WHICH_THROWS_AN_EXCEPTION = 'throwsException.php';
    protected const FILE_ECHOS_DATA = 'echosData.php';

    /**
     * @param string $file
     * @return string
     */
    protected function getMockFilePath(string $file): string
    {
        return self::MOCK_DIRECTORY . DIRECTORY_SEPARATOR . $file;
    }
}
