<?php

namespace Rkulik\View;

use Rkulik\View\Renderers\RendererInterface;

/**
 * Class View
 * @package Rkulik\View
 *
 * @author René Kulik <info@renekulik.de>
 */
class View
{
    /**
     * @var string
     */
    private $file;

    /**
     * @var array
     */
    private $data;

    /**
     * @var RendererInterface
     */
    private $renderer;

    /**
     * @param RendererInterface $renderer
     * @param string $file
     * @param array $data
     */
    public function __construct(RendererInterface $renderer, string $file, array $data = [])
    {
        $this->renderer = $renderer;
        $this->file = $file;
        $this->data = $data;
    }

    /**
     * @param array $data
     * @return View
     */
    public function with(array $data): self
    {
        $this->data = \array_merge($this->data, $data);

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->render();
    }

    /**
     * @return string
     */
    private function render(): string
    {
        return $this->renderer->render($this->file, $this->data);
    }
}
