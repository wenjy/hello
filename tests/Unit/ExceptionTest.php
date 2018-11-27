<?php
/**
 * @author: jiangyi
 * @date: 下午3:57 2018/11/27
 */

namespace Hello\Tests\Unit;

use Hello\DataProviders;
use Hello\Tests\TestCase;

class ExceptionTest extends TestCase
{
    /**
     * @expectedException Hello\MessageException
     */
    public function testException()
    {
        DataProviders::throwException();
    }
}
