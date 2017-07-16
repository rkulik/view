<?php

namespace Rkulik\View\Renderers;

use Exception;
use Rkulik\View\Exceptions\RenderException;
use Rkulik\View\Validators\ValidatorInterface;

/**
 * Class Renderer
 * @package Rkulik\View\Renderers
 *
 * @author René Kulik <info@renekulik.de>
 */
class Renderer implements RendererInterface
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param string $__file
     * @param array $__data
     * @return string
     * @throws RenderException
     */
    public function render(string $__file, array $__data = []): string
    {
        $this->validator->validate($__file);

        \ob_start();

        \extract($__data, EXTR_SKIP);

        try {
            include $__file;
        } catch (Exception $e) {
            \ob_end_clean();
            throw new RenderException($e);
        }

        return \trim(\ob_get_clean());
    }
}
