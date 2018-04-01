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
class ViewFactoryTest extends BaseTestCase
{
    /**
     * @var ViewFactory
     */
    private $viewFactory;

    /**
     *
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->viewFactory = new ViewFactory();
    }

    /**
     *
     */
    public function testMake(): void
    {
        $this->assertInstanceOf(
            View::class,
            $this->viewFactory->make($this->getMockFilePath(self::FILE_WHICH_IS_VALID))
        );
    }
}
