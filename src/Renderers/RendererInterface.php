<?php

namespace Rkulik\View\Renderers;

/**
 * Interface RendererInterface
 * @package Rkulik\View\Renderers
 */
interface RendererInterface
{
    /**
     * @param string $__file
     * @param array $__data
     * @return string
     */
    public function render(string $__file, array $__data = []): string;
}
