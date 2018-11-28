<?php
/**
 * @author: jiangyi
 * @date: 下午5:26 2018/11/28
 */

namespace Hello;

class Observer
{
    public function update($argument)
    {
        // 做点什么。
    }

    public function reportError($errorCode, $errorMessage, Subject $subject)
    {
        // 做点什么。
    }
}
