<?php
/**
 * @author: jiangyi
 * @date: 下午2:30 2018/11/27
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

/**
 * 多重依赖测试
 * Class MultipleDependenciesTest
 * @package Hello\Tests\Unit
 */
class MultipleDependenciesTest extends TestCase
{
    public function testProducerFirst()
    {
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer()
    {
        $this->assertEquals(
            ['first', 'second'],
            func_get_args()
        );
    }
}
