<?php
/**
 * @author: jiangyi
 * @date: 下午9:22 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class EqualsTest extends TestCase
{
    public function testByInt()
    {
        $this->assertEquals(1, 1);
    }

    public function testByString()
    {
        $this->assertEquals('bar', 'bar');
    }

    public function testThree()
    {
        $this->assertEquals("foo\nbar\nbaz\n", "foo\nbar\nbaz\n");
    }

    /**
     * 当两个浮点数 $expected 和 $actual 之间的差值（的绝对值）大于 $delta 时报告错误，
     * 错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testByFloat()
    {
        $this->assertEquals(1.0, 1.1, '', 0.2);
    }

    public function testByDOMDocument()
    {
        $expected = new \DOMDocument;
        $expected->loadXML('<bar><foo/></bar>');

        $actual = new \DOMDocument;
        $actual->loadXML('<bar><foo/></bar>');

        $this->assertEquals($expected, $actual);
    }

    public function testByClass()
    {
        $expected = new \stdClass;
        $expected->foo = 'foo';
        $expected->bar = 'bar';

        $actual = new \stdClass;
        $actual->foo = 'foo';
        $actual->bar = 'bar';

        $this->assertEquals($expected, $actual);
    }

    public function testByArray()
    {
        $this->assertEquals(['a', 'b', 'c'], ['a', 'b', 'c']);
    }
}
