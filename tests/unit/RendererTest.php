<?php
namespace Rkulik\View\Tests\Unit;

use Rkulik\View\Exceptions\FileNotFoundException;
use Rkulik\View\Exceptions\UnsupportedFormatException;
use Rkulik\View\Renderer;
use Rkulik\View\Validator;

/**
 * Class RendererTest
 * @package Rkulik\View\Tests\Unit
 *
 * @author René Kulik <info@renekulik.de>
 */
class RendererTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Renderer
     */
    private $renderer;

    /**
     * @var Validator|\PHPUnit_Framework_MockObject_MockObject
     */
    private $validator;

    /**
     *
     */
    public function setUp()
    {
        $this->validator = $this->getMockBuilder(Validator::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->renderer = new Renderer($this->validator);
    }

    /**
     * @expectedException \Rkulik\View\Exceptions\FileNotFoundException
     */
    public function testRenderThrowsFileNotFoundException()
    {
        $nonExistingFile = __DIR__ . '/nonExistingFile.php';

        $this->validator->expects($this->once())
            ->method('validateFile')
            ->with($this->identicalTo($nonExistingFile))
            ->will($this->throwException(new FileNotFoundException()));

        $this->renderer->render($nonExistingFile);
    }

    /**
     * @expectedException \Rkulik\View\Exceptions\UnsupportedFormatException
     */
    public function testRenderThrowsUnsupportedFormatException()
    {
        $invalidFile = __DIR__ . '/../mocks/invalidFile.txt';

        $this->validator->expects($this->once())
            ->method('validateFile')
            ->with($this->identicalTo($invalidFile))
            ->will($this->throwException(new UnsupportedFormatException()));

        $this->renderer->render($invalidFile);
    }

    /**
     * @throws \Rkulik\View\Exceptions\RenderException
     */
    public function testRenderFile()
    {
        $response = $this->renderer->render(__DIR__ . '/../mocks/validFile.php');
        $this->assertEquals('This is a valid file.', $response);
    }
}
