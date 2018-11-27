<?php
/**
 * @author: jiangyi
 * @date: 下午3:12 2018/11/27
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

/**
 * 来自于数据供给器的参数将先于来自所依赖的测试的
 * Class DependencyAndDataProviderComboTest
 * @package Hello\Tests\Unit
 */
class DependencyAndDataProviderComboTest extends TestCase
{
    /**
     * 提供两次
     * @return array
     * @author jiangyi
     */
    public function provider()
    {
        return [['provider1'], ['provider2']];
    }

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
     * @dataProvider provider
     */
    public function testConsumer()
    {
        // ['provider1', 'first', 'second'] ['provider2', 'first', 'second']
        $assertParams = ['provider1', 'first', 'second'];
        $params = func_get_args();
        $params[0] == 'provider2' and $assertParams = ['provider2', 'first', 'second'];
        $this->assertEquals(
            $assertParams,
            $params
        );
    }

    /**
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testOne()
    {
        $this->assertEquals(
            ['first', 'second'],
            func_get_args()
        );
    }
}
