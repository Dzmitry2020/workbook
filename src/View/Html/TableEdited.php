<?php

namespace View\Html;

use TexLab\Html\Table;

class TableEdited extends Table
{
    protected $type;

    public function setControllerType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    public function setHeaders(array $headers)
    {
        parent::setHeaders($headers);
        $this->headers .= "\t<th></th>\n\t<th></th>\n";
        return $this;
    }

    public function data(array $data)
    {
        $str = "";

        foreach ($data as $row) {
            $str .= "\t<tr>\n";
            foreach ($row as $key => $cell) {
                if ($key == 'Driver') {
                    if ($cell) {
                        $str .= "\t\t<td>✅</td>\n";
                    } else {
                        $str .= "\t\t<td>⛔</td>\n";
                    }
                } else {
                    $str .= "\t\t<td>$cell</td>\n";
                }
            }
<<<<<<< Updated upstream

            $str .= "\t\t<td><a href='?action=del&type=$this->type&id=$row[id]'>❌</a></td>\n";
=======
            $str_a = "<a onclick='return confirm(\"Удалить запись из базы данных?\")' href='?action=del&type=$this->type&id=$row[id]'>🗑️</a>";
            $str .= "\t\t<td>$str_a</td>\n";
>>>>>>> Stashed changes
            $str .= "\t\t<td><a href='?action=showedit&type=$this->type&id=$row[id]'>✏</a></td>\n";
            $str .= "\t</tr>\n";
        }
        $this->data = $str;
        return $this;
    }
}
