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
 * ExtensionManagerInterface
 *
 * @package  Mecum\Expand
 * @author   Rudy ONFROY <rudy@onfroy.net>
 */
interface ManagerInterface
{
    public function set($name, \Closure $closure);
    public function add(CollectionInterface $collection);
    public function exists($name);
    public function call(ExpandableInterface $object, $name, array $args);
}
