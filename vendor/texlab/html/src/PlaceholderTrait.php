<?php

namespace TexLab\Html;

trait PlaceholderTrait
{
    protected string $placeholder = '';

    /**
     * @param string $placeholder
     * @return $this
     */
    public function setPlaceholder(string $placeholder)
    {
        $this->placeholder = " placeholder='" . addslashes($placeholder) . "'";
        return $this;
    }
}
