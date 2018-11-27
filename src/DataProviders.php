<?php

namespace Hello;

/**
 * @author: jiangyi
 * @date: 下午1:50 2018/11/27
 */

class DataProviders
{
    public static function throwException()
    {
        throw new MessageException('test', 100);
    }
}
