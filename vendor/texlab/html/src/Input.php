<?php

namespace TexLab\Html;

class Input extends AbstractTag
{
    use ValueTrait, NameTrait;

    protected $type = " type='text'";
    protected $checked = '';

    public function setType(string $type)
    {
        if (in_array($type, [
            'text',
            'button',
            'submit',
            'reset',
            'password',
            'file',
            'checkbox',
            'hidden',
            'date'
        ])) {
            $this->type = " type='$type'";
        }
        return $this;
    }

    public function setChecked(string $value)
    {
        if ($value) {
            $this->checked = " checked='checked'";
        }
        return $this;
    }


    public function html()
    {
        if ($this->type == " type='checkbox'") {
            return "<input$this->type$this->value$this->name$this->style$this->class$this->id$this->checked><br>";
        } else {
            if ($this->type == " type='date'") {
                return "<input$this->type$this->value$this->name$this->style$this->class$this->id$this->checked>";
            } else {
                return "<input$this->type$this->value$this->name$this->style$this->class$this->id$this->checked>";
            }
        }

    }
}
