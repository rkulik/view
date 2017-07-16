<?php

namespace Rkulik\View\Renderers\Test;

use Rkulik\View\Exceptions\FileNotFoundException;
use Rkulik\View\Exceptions\UnsupportedFormatException;
use Rkulik\View\Renderers\Renderer;
use Rkulik\View\Validators\ValidatorInterface;

/**
 * Class RendererTest
 * @package Rkulik\View\Renderers\Test
 *
 * @author René Kulik <info@renekulik.de>
 */
class RendererTest extends \PHPUnit_Framework_TestCase
{
    private const VALID_FILE = __DIR__ . '/../mocks/validFile.php';
    private const INVALID_FILE = __DIR__ . '/../mocks/invalidFile.php';
    private const NON_EXISTING_FILE = 'nonExistingFile.php';

    /**
     * @var Renderer
     */
    private $renderer;

    /**
     * @var ValidatorInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $validator;

    /**
     * @var string
     */
    private $validFile;

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

        $this->validFile = self::VALID_FILE;
        $this->invalidFile = self::INVALID_FILE;
        $this->nonExistingFile = self::NON_EXISTING_FILE;

        $this->validator = $this->createMock(ValidatorInterface::class);

        $this->renderer = new Renderer($this->validator);
    }

    /**
     * @dataProvider renderDataProvider
     * @param string $exception
     * @param string $file
     */
    public function testRenderThrowsException(string $exception, $file): void
    {
        $this->expectException($exception);

        $this->validator->expects($this->once())
            ->method('validate')
            ->with($this->identicalTo($file))
            ->will($this->throwException(new $exception()));

        $this->renderer->render($file);

    }

    /**
     *
     */
    public function testRenderFile(): void
    {
        $this->assertSame('This is a valid file.', $this->renderer->render($this->validFile));
    }

    /**
     * @return array
     */
    public function renderDataProvider(): array
    {
        return [
            [FileNotFoundException::class, self::NON_EXISTING_FILE],
            [UnsupportedFormatException::class, self::INVALID_FILE],
        ];
    }
}
