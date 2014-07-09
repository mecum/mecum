<?php

/*
* This file is part of the Mecum package.
*
* (c) Rudy ONFROY <rudy@onfroy.net>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

namespace Mecum\Expand;

/**
 * ClosureFactoryInterface
 *
 * @package  Mecum\Expand
 * @author   Rudy ONFROY <rudy@onfroy.net>
 */
interface LibraryInterface
{
    public static function get($name);
    public static function getAll();
}
