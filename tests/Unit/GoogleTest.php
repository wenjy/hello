<?php
/**
 * @author: jiangyi
 * @date: 下午9:24 2018/11/28
 */

namespace Hello\Tests\Unit;

use Hello\Tests\TestCase;

class GoogleTest extends TestCase
{
    /**
     * @throws \Exception
     * @throws \ReflectionException
     * @author jiangyi
     */
    public function testSearch()
    {
        $googleSearch = $this->getMockFromWsdl(
            STUBS_ROOT . '/files/GoogleSearch.wsdl',
            'GoogleSearch'
        );

        $directoryCategory = new \stdClass;
        $directoryCategory->fullViewableName = '';
        $directoryCategory->specialEncoding = '';

        $element = new \stdClass;
        $element->summary = '';
        $element->URL = 'https://phpunit.de/';
        $element->snippet = '...';
        $element->title = '<b>PHPUnit</b>';
        $element->cachedSize = '11k';
        $element->relatedInformationPresent = true;
        $element->hostName = 'phpunit.de';
        $element->directoryCategory = $directoryCategory;
        $element->directoryTitle = '';

        $result = new \stdClass;
        $result->documentFiltering = false;
        $result->searchComments = '';
        $result->estimatedTotalResultsCount = 3.9000;
        $result->estimateIsExact = false;
        $result->resultElements = [$element];
        $result->searchQuery = 'PHPUnit';
        $result->startIndex = 1;
        $result->endIndex = 1;
        $result->searchTips = '';
        $result->directoryCategories = [];
        $result->searchTime = 0.248822;

        $googleSearch->expects($this->any())
            ->method('doGoogleSearch')
            ->will($this->returnValue($result));
        /**
         * $googleSearch->doGoogleSearch() 将会返回上桩的结果，
         * web 服务的 doGoogleSearch() 方法不会被调用。
         */
        $this->assertEquals(
            $result,
            $googleSearch->doGoogleSearch(
                '00000000000000000000000000000000',
                'PHPUnit',
                0,
                1,
                false,
                '',
                false,
                '',
                '',
                ''
            )
        );
    }
}
