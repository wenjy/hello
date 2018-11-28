<?php
/**
 * @author: jiangyi
 * @date: 下午5:33 2018/11/28
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class FooTest extends TestCase
{
    /**
     * 测试某个方法将会以特定参数被调用二次
     * @author jiangyi
     */
    public function testFunctionCalledTwoTimesWithSpecificArguments()
    {
        $mock = $this->getMockBuilder(\stdClass::class)
            ->setMethods(['set'])
            ->getMock();

        $mock->expects($this->exactly(2))
            ->method('set')
            ->withConsecutive(
                [$this->equalTo('foo'), $this->greaterThan(0)],
                [$this->equalTo('bar'), $this->greaterThan(0)]
            );

        $mock->set('foo', 21);
        $mock->set('bar', 48);
    }

    /**
     * 测试某个方法将会被调用一次，并且以某个特定对象作为参数。
     * @author jiangyi
     */
    public function testIdenticalObjectPassed()
    {
        $expectedObject = new \stdClass;

        $mock = $this->getMockBuilder(\stdClass::class)
            ->setMethods(['foo'])
            ->getMock();

        $mock->expects($this->once())
            ->method('foo')
            ->with($this->identicalTo($expectedObject));

        $mock->foo($expectedObject);
    }
}
