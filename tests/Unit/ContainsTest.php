<?php
/**
 * @author: jiangyi
 * @date: 下午5:30 2018/11/29
 */

namespace Hello\Tests\Unit;

use Hello\Bar;
use Hello\Foo;
use Hello\Tests\TestCase;

class ContainsTest extends TestCase
{
    /**
     * 当 $needle 不是 $haystack``的元素时报告错误，错误讯息由 ``$message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertContains()
    {
        $this->assertContains(4, [1, 2, 3, 4, 5]);
        $this->assertContains('baZ', 'foobaZ');
        // 如果 $ignoreCase 为 true，测试将按大小写不敏感的方式进行。
        $this->assertContains('foo', 'FooBar', '', true);
    }

    public function testAssertNotContains()
    {
        $this->assertNotContains(4, [1, 2, 3, 5]);
    }

    /**
     * 当 $haystack 并非仅包含类型为 $type 的变量时报告错误，错误讯息由 $message 指定。
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertContainsOnly()
    {
        $this->assertContainsOnly('string', ['1', '2', '3']);
    }

    public function testAssertNotContainsOnly()
    {
        $this->assertNotContainsOnly('string', ['1', '2', 3]);
    }

    /**
     * 当 $haystack 并非仅包含类 $classname 的实例时报告错误，错误讯息由 $message 指定
     * @throws \Exception
     * @author jiangyi
     */
    public function testAssertContainsOnlyInstancesOf()
    {
        $this->assertContainsOnlyInstancesOf(
            Foo::class,
            [new Bar()]
        );
    }
}
