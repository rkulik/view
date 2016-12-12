<?php
namespace Rkulik\View;

use Exception;
use Rkulik\View\Exceptions\RenderException;

/**
 * Class Renderer
 * @package Rkulik\View\Renderer
 *
 * @author René Kulik <info@renekulik.de>
 */
class Renderer
{
    /**
     * @var Validator
     */
    protected $validator;

    /**
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param string $__file
     * @param array $__data
     * @return string
     * @throws RenderException
     * @throws \Rkulik\View\Exceptions\FileNotFoundException
     * @throws \Rkulik\View\Exceptions\UnsupportedFormatException
     */
    public function render($__file, array $__data = [])
    {
        $this->validator->validateFile($__file);

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
