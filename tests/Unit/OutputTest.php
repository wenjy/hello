<?php
/**
 * @author: jiangyi
 * @date: 下午4:50 2018/11/27
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class OutputTest extends TestCase
{
    public function testExpectFooActualFoo()
    {
        $this->expectOutputString('foo');
        print 'foo';
    }

    public function testExpectOutputRegex()
    {
        $this->expectOutputRegex('/[\d]/');
        echo 23111;
    }
}
