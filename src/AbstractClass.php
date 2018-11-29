<?php
/**
 * @author: jiangyi
 * @date: 下午9:17 2018/11/28
 */

namespace Hello;

abstract class AbstractClass
{
    public function concreteMethod()
    {
        return $this->abstractMethod();
    }

    abstract public function abstractMethod();
}
