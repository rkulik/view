<?php

namespace Rkulik\View\Test;

use Rkulik\View\View;
use Rkulik\View\ViewFactory;

/**
 * Class ViewFactoryTest
 * @package Rkulik\View\Test
 *
 * @author René Kulik <rene@kulik.io>
 */
class ViewFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ViewFactory
     */
    private $viewFactory;

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

        $this->validFile = __DIR__ . '/mocks/validFile.php';

        $this->viewFactory = new ViewFactory();
    }

    /**
     *
     */
    public function testMake(): void
    {
        $this->assertInstanceOf(View::class, $this->viewFactory->make($this->validFile));
    }
}
