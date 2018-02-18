<?php

namespace Rkulik\View\Validators\Test;

use Rkulik\View\Exceptions\FileNotFoundException;
use Rkulik\View\Exceptions\UnsupportedFormatException;
use Rkulik\View\Validators\Validator;

/**
 * Class ValidatorTest
 * @package Rkulik\View\Validators\Test
 *
 * @author René Kulik <rene@kulik.io>
 */
class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    private const INVALID_FILE = __DIR__ . '/../mocks/invalidFile.txt';
    private const NON_EXISTING_FILE = 'nonExistingFile.php';

    /**
     * @var Validator
     */
    private $validator;

    /**
     * @var string
     */
    private $invalidFile;

    /**
     * @var string
     */
    private $nonExistingFile;

    /**
     *
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->invalidFile = self::INVALID_FILE;
        $this->nonExistingFile = self::NON_EXISTING_FILE;

        $this->validator = new Validator();
    }

    /**
     * @dataProvider validateDataProvider
     * @param string $exception
     * @param string $file
     */
    public function testValidateThrowsException(string $exception, string $file): void
    {
        $this->expectException($exception);

        $this->validator->validate($file);
    }

    /**
     * @return array
     */
    public function validateDataProvider(): array
    {
        return [
            [FileNotFoundException::class, self::NON_EXISTING_FILE],
            [UnsupportedFormatException::class, self::INVALID_FILE],
        ];
    }
}
