<?php
/**
 * @author: jiangyi
 * @date: 下午9:14 2018/11/28
 */

namespace Hello\Tests\Unit;

use Hello\AbstractTrait;
use Hello\Tests\TestCase;

class TraitClassTest extends TestCase
{
    /**
     * getMockForTrait() 方法返回一个使用了特定特质(trait)的仿件对象。
     * 给定特质的所有抽象方法将都被模仿。这样就能对特质的具体方法进行测试
     * @throws \Exception
     * @throws \ReflectionException
     * @author jiangyi
     */
    public function testConcreteMethod()
    {
        $mock = $this->getMockForTrait(AbstractTrait::class);

        $mock->expects($this->any())
            ->method('abstractMethod')
            ->will($this->returnValue(true));

        $this->assertTrue($mock->concreteMethod());
    }
}
