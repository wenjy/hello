<?php
/**
 * @author: jiangyi
 * @date: 下午2:36 2018/11/27
 */

namespace Hello\Tests\Unit;

use Hello\CsvFileIterator;
use Hello\Tests\TestCase;

class DataTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }

    /**
     * 数据提供器返回数组
     * @return array
     * @author jiangyi
     */
    public function additionProvider()
    {
        return [
            'adding zeros'  => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
        ];
    }

    /**
     * @dataProvider additionProviderIterator
     */
    public function testAddTwo($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }

    /**
     * 数据提供器返回 迭代器对象
     * @return CsvFileIterator
     * @author jiangyi
     */
    public function additionProviderIterator()
    {
        return new CsvFileIterator(STUBS_ROOT . '/files/data.csv');
    }
}
