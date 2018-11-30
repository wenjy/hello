<?php
/**
 * @author: jiangyi
 * @date: 下午5:16 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\SomeClass;
use Hello\Tests\TestCase;

class ClassHasAttributeTest extends TestCase
{
    /**
     * 当 $className::attributeName 不存在时报告错误，错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertClassHasAttribute()
    {
        $this->assertClassHasAttribute('id', SomeClass::class);
    }

    public function testAssertClassNotHasAttribute()
    {
        $this->assertClassNotHasAttribute('foo', \stdClass::class);
    }
}
