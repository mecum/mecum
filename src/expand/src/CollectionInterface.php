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
 * CollectionInterface
 *
 * @package  Mecum\Expand
 * @author   Rudy ONFROY <rudy@onfroy.net>
 */
interface CollectionInterface
{
    public function set($name, \Closure $extension);
    public function get($name);
    public function add($collection);
    public function exists($name);
}
