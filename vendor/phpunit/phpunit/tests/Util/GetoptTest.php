<?php

namespace MolliePrefix;

/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class Util_GetoptTest extends \MolliePrefix\PHPUnit_Framework_TestCase
{
    public function testItIncludeTheLongOptionsAfterTheArgument()
    {
        $args = ['command', 'myArgument', '--colors'];
        $actual = \MolliePrefix\PHPUnit_Util_Getopt::getopt($args, '', ['colors==']);
        $expected = [[['--colors', null]], ['myArgument']];
        $this->assertEquals($expected, $actual);
    }
    public function testItIncludeTheShortOptionsAfterTheArgument()
    {
        $args = ['command', 'myArgument', '-v'];
        $actual = \MolliePrefix\PHPUnit_Util_Getopt::getopt($args, 'v');
        $expected = [[['v', null]], ['myArgument']];
        $this->assertEquals($expected, $actual);
    }
}
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
\class_alias('MolliePrefix\\Util_GetoptTest', 'MolliePrefix\\Util_GetoptTest', \false);