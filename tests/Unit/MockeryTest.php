<?php
/**
 * @author: 文江义
 * @date: 14:48 2019/7/8
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class MockeryTest extends TestCase
{
    public function testShouldReceive()
    {
        $mock = \Mockery::mock('MyClass');
        // 单个方法，使用字符串
        $mock->shouldReceive('name_of_method');
        $this->assertNull($mock->name_of_method());

        // 多个方法，多参数
        $mock->shouldReceive('name_of_method_1', 'name_of_method_2');
        $this->assertNull($mock->name_of_method_1());
        $this->assertNull($mock->name_of_method_2());

        // 键值对指定 方法和返回值
        $mock->shouldReceive([
            'name_of_method_3' => 'return value 3',
            'name_of_method_4' => 'return value 4',
        ]);
        $this->assertEquals('return value 3', $mock->name_of_method_3());
        $this->assertEquals('return value 4', $mock->name_of_method_4());
    }

    public function testShouldNotReceive()
    {
        $mock = \Mockery::mock('MyClass');
        $mock->shouldNotReceive('name_of_method');
        $this->assertNull($mock->name_of_method());
    }

    public function testWith()
    {
        $arg1 = 1;
        $arg2 = 2;
        $mock = \Mockery::mock('MyClass');
        $mock->shouldReceive('name_of_method_1')
            ->with($arg1, $arg2);

        $mock->shouldReceive('name_of_method_2')
            ->withArgs([$arg1, $arg2]);

        // 必须和 with 保持一致 不然 throws a NoMatchingExpectationException
        $this->assertNull($mock->name_of_method_1(1, 2));
        $this->assertNull($mock->name_of_method_2(1, 2));

        // 匿名函数
        $mock->shouldReceive('foo')->withArgs(function ($arg) {
            if ($arg % 2 == 0) {
                return true;
            }
            return false;
        });

        $mock->foo(4); // matches the expectation
        //$mock->foo(3); // throws a NoMatchingExpectationException

        // 任意参数
        $mock->shouldReceive('name_of_method_3')
            ->withAnyArgs();

        $this->assertNull($mock->name_of_method_3(1, 2, 3));

        $object = new \stdClass();
        $mock->shouldReceive('name_of_method_4')
            ->with($object);

        $mock->name_of_method_4($object);

        // Hamcrest equivalent
        $mock->shouldReceive('name_of_method_5')
            ->with(\Hamcrest\Matchers::identicalTo($object));
        $mock->name_of_method_5($object);
    }

    public function testAndReturn()
    {
        $value1 = 1;
        $value2 = 2;
        $mock = \Mockery::mock('MyClass');
        $mock->shouldReceive('name_of_method')
            ->andReturn($value1, $value2);

        // 第一次返回 $value1 第二次返回 $value2 后面的返回最后一个
        $this->assertEquals(1, $mock->name_of_method());
        $this->assertEquals(2, $mock->name_of_method());
        $this->assertEquals(2, $mock->name_of_method());

        // 数组形式
        $mock->shouldReceive('name_of_method_1')
            ->andReturnValues([$value1, $value2]);
        $this->assertEquals(1, $mock->name_of_method_1());
        $this->assertEquals(2, $mock->name_of_method_1());

        // null
        $mock->shouldReceive('name_of_method_2')
            ->andReturnNull();
        $this->assertNull($mock->name_of_method_2());

        // 匿名函数返回
        $mock->shouldReceive('name_of_method_3')
            ->andReturnUsing(function () {
                return 1;
            });

        $this->assertEquals(1, $mock->name_of_method_3());
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage message
     */
    public function testAndThrow()
    {
        $mock = \Mockery::mock('MyClass');
        $mock->shouldReceive('name_of_method')
            ->andThrow(\Exception::class, 'message');

        $this->assertNull($mock->name_of_method());
    }

    public function testTimes()
    {
        $mock = \Mockery::mock('MyClass');
        $mock->shouldReceive('name_of_method')
            ->zeroOrMoreTimes();

        $this->assertNull($mock->name_of_method());

        $mock->shouldReceive('name_of_method_1')
            ->once();
        $this->assertNull($mock->name_of_method_1());
        $this->assertNull($mock->name_of_method_1());
    }
}
