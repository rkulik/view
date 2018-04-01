<?php

namespace Rkulik\View\Test;

use Rkulik\View\Renderers\RendererInterface;
use Rkulik\View\View;

/**
 * Class ViewTest
 * @package Rkulik\View\Test
 *
 * @author René Kulik <rene@kulik.io>
 */
class ViewTest extends BaseTestCase
{
    /**
     * @var RendererInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $renderer;

    /**
     *
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->renderer = $this->createMock(RendererInterface::class);
    }

    /**
     *
     */
    public function testWith(): void
    {
        $view = new View($this->renderer, $this->getMockFilePath(self::FILE_WHICH_IS_VALID));
        $this->assertInstanceOf(View::class, $view->with([]));
    }

    /**
     *
     */
    public function testBasicRendering(): void
    {
        $view = new View($this->renderer, $this->getMockFilePath(self::FILE_WHICH_IS_VALID));
        $expected = \file_get_contents($this->getMockFilePath(self::FILE_WHICH_IS_VALID));

        $this->renderer->expects($this->once())
            ->method('render')
            ->with($this->identicalTo($this->getMockFilePath(self::FILE_WHICH_IS_VALID)), $this->identicalTo([]))
            ->will($this->returnValue($expected));

        $this->assertSame($expected, (string)$view);
    }

    /**
     *
     */
    public function testRenderingData(): void
    {
        $fileEchoingData = $this->getMockFilePath(self::FILE_ECHOS_DATA);
        $view = new View($this->renderer, $fileEchoingData);
        $data = $expected = 'Hello, World!';

        $this->renderer->expects($this->once())
            ->method('render')
            ->with($this->identicalTo($fileEchoingData), $this->identicalTo(\compact('data')))
            ->will($this->returnValue($expected));

        $this->assertSame($expected, (string)$view->with(\compact('data')));
    }
} 
