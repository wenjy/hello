<?php
/**
 * @author: jiangyi
 * @date: 上午9:42 2018/11/30
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class RegExpTest extends TestCase
{
    public function testAssertRegExp()
    {
        $this->assertRegExp('/foo/', 'barfoo');
    }
}
