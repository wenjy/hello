<?php
/**
 * @author: jiangyi
 * @date: 下午4:08 2018/11/27
 */

namespace Hello;

use Throwable;

class MessageException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
