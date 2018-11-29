<?php
/**
 * @author: jiangyi
 * @date: 下午5:27 2018/11/28
 */

namespace Hello\Tests\Unit;

use Hello\Observer;
use Hello\Subject;

class SubjectTest
{
    /**
     * 测试某个方法会以特定参数被调用一次
     * @author jiangyi
     */
    public function testObserversAreUpdated()
    {
        // 为 Observer 类建立仿件对象，只模仿 update() 方法。
        $observer = $this->getMockBuilder(Observer::class)
            ->setMethods(['update'])
            ->getMock();

        // 建立预期状况：update() 方法将会被调用一次，
        // 并且将以字符串 'something' 为参数。
        $observer->expects($this->once())
            ->method('update')
            ->with($this->equalTo('something'));

        // 创建 Subject 对象，并将模仿的 Observer 对象连接其上。
        $subject = new Subject('My subject');
        $subject->attach($observer);

        // 在 $subject 对象上调用 doSomething() 方法，
        // 预期将以字符串 'something' 为参数调用
        // Observer 仿件对象的 update() 方法。
        $subject->doSomething();
    }

    /**
     * 测试某个方法将会以特定数量的参数进行调用，并且对各个参数以多种方式进行约束
     * @author jiangyi
     */
    public function testErrorReported()
    {
        // 为 Observer 类建立仿件，对 reportError() 方法进行模仿
        $observer = $this->getMockBuilder(Observer::class)
            ->setMethods(['reportError'])
            ->getMock();

        $observer->expects($this->once())
            ->method('reportError')
            ->with(
                $this->greaterThan(0),
                $this->stringContains('Something'),
                $this->anything()
            );

        $subject = new Subject('My subject');
        $subject->attach($observer);

        // doSomethingBad() 方法应当会通过（observer的）reportError()方法
        // 向 observer 报告错误。
        $subject->doSomethingBad();
    }

    /**
     * callback() 约束用来进行更加复杂的参数校验。此约束的唯一参数是一个 PHP 回调项(callback)。
     * 此 PHP 回调项接受需要校验的参数作为其唯一参数，并应当在参数通过校验时返回 true，否则返回 false
     * @author jiangyi
     */
    public function testErrorReportedTwo()
    {
        // 为 Observer 类建立仿件，模仿 reportError() 方法
        $observer = $this->getMockBuilder(Observer::class)
            ->setMethods(['reportError'])
            ->getMock();

        $observer->expects($this->once())
            ->method('reportError')
            ->with(
                $this->greaterThan(0),
                $this->stringContains('Something'),
                $this->callback(function ($subject) {
                    return is_callable([$subject, 'getName']) && $subject->getName() == 'My subject';
                })
            );

        $subject = new Subject('My subject');
        $subject->attach($observer);

        // doSomethingBad() 方法应当会通过（observer的）reportError()方法
        // 向 observer 报告错误。
        $subject->doSomethingBad();
    }

    public function testObserversAreUpdatedTwo()
    {
        $subject = new Subject('My subject');

        // 为 Observer 类建立预言(prophecy)。
        $observer = $this->prophesize(Observer::class);

        // 建立预期状况：update() 方法将会被调用一次，
        // 并且将以字符串 'something' 为参数。
        $observer->update('something')->shouldBeCalled();

        // 揭示预言，并将仿件对象链接到主体上。
        $subject->attach($observer->reveal());

        // 在 $subject 对象上调用 doSomething() 方法，
        // 预期将以字符串 'something' 为参数调用
        // Observer 仿件对象的 update() 方法。
        $subject->doSomething();
    }
}
