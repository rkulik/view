<?php
namespace Rkulik\View\Test;

use Rkulik\View\Validator;

/**
 * Class ValidatorTest
 * @package Rkulik\ViewTests\Unit
 *
 * @author René Kulik <info@renekulik.de>
 */
class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Validator
     */
    private $validator;

    /**
     *
     */
    public function setUp()
    {
        $this->validator = new Validator();
    }

    /**
     * @expectedException \Rkulik\View\Exceptions\FileNotFoundException
     */
    public function testValidateFileThrowsFileNotFoundException()
    {
        $this->validator->validateFile(__DIR__ . '/nonExistingFile.php');
    }

    /**
     * @expectedException \Rkulik\View\Exceptions\UnsupportedFormatException
     */
    public function testValidateFileThrowsUnsupportedFormatException()
    {
        $this->validator->validateFile(__DIR__ . '/mocks/invalidFile.txt');
    }
}
