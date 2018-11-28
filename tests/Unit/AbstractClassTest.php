<?php
/**
 * @author: jiangyi
 * @date: 下午9:17 2018/11/28
 */

namespace Hello\Tests\Unit;

use Hello\AbstractClass;
use Hello\Tests\TestCase;

class AbstractClassTest extends TestCase
{
    /**
     * getMockForAbstractClass() 方法返回一个抽象类的仿件对象。
     * 给定抽象类的所有抽象方法将都被模仿。这样就能对抽象类的具体方法进行测试。
     * @throws \Exception
     * @throws \ReflectionException
     * @author jiangyi
     */
    public function testConcreteMethod()
    {
        $stub = $this->getMockForAbstractClass(AbstractClass::class);

        $stub->expects($this->any())
            ->method('abstractMethod')
            ->will($this->returnValue(true));

        $this->assertTrue($stub->concreteMethod());
    }
}
