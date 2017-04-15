<?php
namespace Rkulik\View;

/**
 * Class ViewTest
 * @package Rkulik\View\Tests\Unit
 *
 * @author René Kulik <info@renekulik.de>
 */
class ViewTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var View
     */
    private $view;

    /**
     * @var Renderer|\PHPUnit_Framework_MockObject_MockObject
     */
    private $renderer;

    /**
     * @var string
     */
    private $validFile;

    /**
     *
     */
    public function setUp()
    {
        $this->renderer = $this->getMockBuilder(Renderer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->validFile = __DIR__ . '/../mocks/validFile.php';

        $this->view = new View($this->renderer);
    }

    /**
     *
     */
    public function testMakeReturnsView()
    {
        $response = $this->view->make($this->validFile);
        $this->assertInstanceOf(View::class, $response);
    }

    /**
     *
     */
    public function testWithReturnsView()
    {
        $response = $this->view->with([]);
        $this->assertInstanceOf(View::class, $response);
    }

    /**
     *
     */
    public function testEchoingReturnsString()
    {
        $expected = 'This is a valid file.';

        $this->renderer->expects($this->once())
            ->method('render')
            ->with($this->identicalTo($this->validFile), $this->identicalTo([]))
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, (string)$this->view->make($this->validFile));
    }
} 
