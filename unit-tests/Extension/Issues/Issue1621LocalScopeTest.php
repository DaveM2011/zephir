<?php

/*
 +--------------------------------------------------------------------------+
 | Zephir                                                                   |
 | Copyright (c) 2013-present Zephir Team (https://zephir-lang.com/)        |
 |                                                                          |
 | This source file is subject the MIT license, that is bundled with this   |
 | package in the file LICENSE, and is available through the world-wide-web |
 | at the following url: http://zephir-lang.com/license.html                |
 +--------------------------------------------------------------------------+
*/

namespace Extension\Issues;

use \Test\Issues\Issue1621;

/**
 * Tests for Zephir issue #1621
 * Local variable values overwrite global variables
 * when require statement is used (the required file can be empty).
 *
 * @author   AlexNDRmac <AlexNDR@phalconphp.com>
 * @license  MIT http://zephir-lang.com/license.html
 * @link     https://github.com/phalcon/zephir/issues/1621
 */
class Issue1621LocalScopeTest extends \PHPUnit_Framework_TestCase
{
    /** @var Issue1621 $test */
    private $test;

    public function setUp()
    {
        $this->test = new \Test\Issues\Issue1621();
    }

    public function tearDown()
    {
        $this->test = null;
    }

    public function testIssueInitalScript()
    {
        $param1 = 1;

        $actual = $this->test->render('mira2.php', ['param1' => 2]);

        $this->assertSame(1, $param1);
    }
}
