<?php

namespace Rkulik\View\Validators;

/**
 * Interface ValidatorInterface
 * @package Rkulik\View\Validators
 */
interface ValidatorInterface
{
    /**
     * @param string $file
     */
    public function validate(string $file): void;
}
