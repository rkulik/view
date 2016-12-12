<?php
namespace Rkulik\View;

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
    protected $file;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var Renderer
     */
    protected $renderer;

    /**
     * @param Renderer $renderer
     */
    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param string $file
     * @return View
     */
    public function make($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @param array $data
     * @return View
     */
    public function with(array $data)
    {
        $this->data = \array_merge($this->data, $data);

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @return string
     * @throws Exceptions\RenderException
     */
    private function render()
    {
        return $this->renderer->render($this->file, $this->data);
    }
}
