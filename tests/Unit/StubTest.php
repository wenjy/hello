<?php
/**
 * @author: jiangyi
 * @date: 下午3:32 2018/11/28
 */

namespace Hello\Tests\Unit;

use Hello\SomeClass;
use Hello\Tests\TestCase;

class StubTest extends TestCase
{
    /**
     * 使用可用于配置生成的测试替身类的仿件生成器 API
     * @throws \Exception
     * @throws \ReflectionException
     * @author jiangyi
     */
    public function testStub()
    {
        // 为 SomeClass 类创建桩件。
        $stub = $this->createMock(SomeClass::class);

        // 配置桩件。
        $stub->method('doSomething')
            ->willReturn('foo');

        // 现在调用 $stub->doSomething() 将返回 'foo'。
        $this->assertEquals('foo', $stub->doSomething());
    }

    /**
     * 对某个方法的调用上桩，返回参数之一
     */
    public function testReturnArgumentStub()
    {
        // 为 SomeClass 类创建桩件。
        $stub = $this->createMock(SomeClass::class);

        // 配置桩件。
        $stub->method('doSomething')
            ->will($this->returnArgument(0));

        // $stub->doSomething('foo') 返回 'foo'
        $this->assertEquals('foo', $stub->doSomething('foo'));

        // $stub->doSomething('bar') 返回 'bar'
        $this->assertEquals('bar', $stub->doSomething('bar'));
    }

    /**
     * 返回对桩件对象的引用
     * @throws \Exception
     * @throws \ReflectionException
     * @author jiangyi
     */
    public function testReturnSelf()
    {
        // 为 SomeClass 类创建桩件。
        $stub = $this->createMock(SomeClass::class);

        // 配置桩件。
        $stub->method('doSomething')
            ->will($this->returnSelf());

        // $stub->doSomething() 返回 $stub
        $this->assertSame($stub, $stub->doSomething());
    }

    /**
     * 按照映射确定返回值，根据预定义的参数清单来返回不同的值
     * @throws \Exception
     * @throws \ReflectionException
     * @author jiangyi
     */
    public function testReturnValueMapStub()
    {
        // 为 SomeClass 类创建桩件。
        $stub = $this->createMock(SomeClass::class);

        // 创建从参数到返回值的映射。
        $map = [
            ['a', 'b', 'c', 'd', 'i'],
            ['e', 'f', 'g', 'h'],
        ];

        // 配置桩件。
        $stub->method('doSomething')
            ->will($this->returnValueMap($map));

        // $stub->doSomething() 根据提供的参数返回不同的值。
        $this->assertEquals('i', $stub->doSomething('a', 'b', 'c', 'd'));
        $this->assertEquals('h', $stub->doSomething('e', 'f', 'g'));
    }

    /**
     * 由回调生成返回值
     * @throws \Exception
     * @throws \ReflectionException
     * @author jiangyi
     */
    public function testReturnCallbackStub()
    {
        // 为 SomeClass 类创建桩件。
        $stub = $this->createMock(SomeClass::class);

        // 配置桩件。
        $stub->method('doSomething')
            ->will($this->returnCallback('str_rot13'));

        // $stub->doSomething($argument) 返回 str_rot13($argument)
        $this->assertEquals('fbzrguvat', $stub->doSomething('something'));
    }
}
