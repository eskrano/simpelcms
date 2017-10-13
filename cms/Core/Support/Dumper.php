<?php

namespace Cms\Core\Support;

class Dumper
{
    public function dump()
    {
        echo '<pre>';
        var_dump(func_get_args());
        echo '</pre>';

        return $this;
    }

    public function exit()
    {
        exit;
    }
}