<?php

namespace Rkulik\View\Renderers\Test;

use Rkulik\View\Renderers\Renderer;
use Rkulik\View\Test\BaseTestCase;
use Rkulik\View\Validators\ValidatorInterface;

/**
 * Class RendererTest
 * @package Rkulik\View\Renderers\Test
 *
 * @author René Kulik <rene@kulik.io>
 */
class RendererTest extends BaseTestCase
{
    /**
     * @var Renderer
     */
    private $renderer;

    /**
     *
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @var ValidatorInterface|\PHPUnit_Framework_MockObject_MockObject $validator */
        $validator = $this->createMock(ValidatorInterface::class);
        $this->renderer = new Renderer($validator);
    }

    /**
     * @expectedException \Rkulik\View\Exceptions\RenderException
     */
    public function testRenderFailsByException()
    {
        $this->renderer->render($this->getMockFilePath(self::FILE_WHICH_THROWS_AN_EXCEPTION));
    }

    /**
     * @throws \Rkulik\View\Exceptions\RenderException
     */
    public function testRenderFile(): void
    {
        $this->assertSame(
            'This is a valid file.',
            $this->renderer->render($this->getMockFilePath(self::FILE_WHICH_IS_VALID))
        );
    }
}
