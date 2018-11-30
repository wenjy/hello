<?php
/**
 * @author: jiangyi
 * @date: 下午5:23 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\SomeClass;
use Hello\Tests\TestCase;

class ClassHasStaticAttributeTest extends TestCase
{
    /**
     * 当 $className::attributeName 不存在时报告错误，错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertClassHasStaticAttribute()
    {
        $this->assertClassHasStaticAttribute('staticId', SomeClass::class);
    }

    public function testAssertClassNotHasStaticAttribute()
    {
        $this->assertClassNotHasStaticAttribute('staticId', \stdClass::class);
    }
}
