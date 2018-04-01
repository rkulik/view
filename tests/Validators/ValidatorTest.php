<?php

namespace Rkulik\View\Validators\Test;

use Rkulik\View\Test\BaseTestCase;
use Rkulik\View\Validators\Validator;

/**
 * Class ValidatorTest
 * @package Rkulik\View\Validators\Test
 *
 * @author René Kulik <rene@kulik.io>
 */
class ValidatorTest extends BaseTestCase
{
    /**
     * @var Validator
     */
    private $validator;

    /**
     *
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->validator = new Validator();
    }

    /**
     * @expectedException \Rkulik\View\Exceptions\FileNotFoundException
     * @throws \Rkulik\View\Exceptions\FileNotFoundException
     * @throws \Rkulik\View\Exceptions\UnsupportedFormatException
     */
    public function testValidateFailsByFileNotFound()
    {
        $this->validator->validate($this->getMockFilePath(self::FILE_WHICH_DOES_NOT_EXIST));
    }

    /**
     * @expectedException \Rkulik\View\Exceptions\UnsupportedFormatException
     * @throws \Rkulik\View\Exceptions\FileNotFoundException
     * @throws \Rkulik\View\Exceptions\UnsupportedFormatException
     */
    public function testValidateFailsByUnsupportedFormat()
    {
        $this->validator->validate($this->getMockFilePath(self::FILE_WITH_UNSUPPORTED_EXTENSION));
    }

    /**
     * @throws \Rkulik\View\Exceptions\FileNotFoundException
     * @throws \Rkulik\View\Exceptions\UnsupportedFormatException
     */
    public function testValidateDoesNotFail()
    {
        $this->validator->validate($this->getMockFilePath(self::FILE_WHICH_IS_VALID));
    }
}
