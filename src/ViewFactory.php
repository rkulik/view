<?php

namespace Rkulik\View;

use Rkulik\View\Renderers\Renderer;
use Rkulik\View\Validators\Validator;

/**
 * Class ViewFactory
 * @package Rkulik\View
 *
 * @author René Kulik <info@renekulik.de>
 */
class ViewFactory
{
    /**
     * @param string $file
     * @return View
     */
    public function make(string $file): View
    {
        return new View(new Renderer(new Validator()), $file);
    }
}
