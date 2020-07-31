<?php

namespace Controller;

use View\View;

abstract class AbstractController
{
    protected View $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    protected function redirect(string $location)
    {
        header("Location: $location");
    }

    protected function getClassName(): string
    {
        preg_match(
            '/(.*)Controller$/',
            (new \ReflectionClass(get_class($this)))->getShortName(),
            $match
        );
        return strtolower($match[1]);
    }
}
