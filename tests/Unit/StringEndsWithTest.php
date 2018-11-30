<?php
/**
 * @author: jiangyi
 * @date: 上午10:01 2018/11/30
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class StringEndsWithTest extends TestCase
{
    public function testAssertStringEndsWith()
    {
        $this->assertStringEndsWith('suffix', 'foosuffix');
        $this->assertStringEndsNotWith('suffix', 'foosuffi');
    }

    public function testAssertStringStartsWith()
    {
        $this->assertStringStartsWith('prefix', 'prefixfoo');
        $this->assertStringStartsNotWith('prefix', 'refixfoo');
    }
}
