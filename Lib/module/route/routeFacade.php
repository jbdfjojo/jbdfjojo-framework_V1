<?php
/**
 * Created by PhpStorm.
 * User: dafonseca
 * Date: 09/11/2016
 * Time: 12:33
 */

namespace Lib\module\route;


class routeFacade
{

    public static function __callStatic($name, $arguments)
    {
        $query = new route();
        return call_user_func_array([$query, $name], $arguments);
    }

}