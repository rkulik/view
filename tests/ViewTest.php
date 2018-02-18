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
class ViewTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var View
     */
    private $view;

    /**
     * @var RendererInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $renderer;

    /**
     * @var string
     */
    private $validFile;

    /**
     *
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->renderer = $this->createMock(RendererInterface::class);

        $this->validFile = __DIR__ . '/mocks/validFile.php';

        $this->view = new View($this->renderer, $this->validFile);
    }

    /**
     * @dataProvider withDataProvider
     * @param array $data
     */
    public function testWithReturnsView(array $data): void
    {
        $this->assertInstanceOf(View::class, $this->view->with($data));
    }

    /**
     *
     */
    public function testEchoingReturnsString(): void
    {
        $expected = 'This is a valid file.';

        $this->renderer->expects($this->once())
            ->method('render')
            ->with($this->identicalTo($this->validFile), $this->identicalTo([]))
            ->will($this->returnValue($expected));

        $this->assertSame($expected, (string)$this->view);
    }

    /**
     * @return array
     */
    public function withDataProvider(): array
    {
        return [
            [
                []
            ],
            [
                ['key' => 'value']
            ],
            [
                ['key1' => 'value1', 'key2' => 'value2']
            ],
        ];
    }
} 
