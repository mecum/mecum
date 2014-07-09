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
 * ExpandInterface
 *
 * @package  Mecum\Expand
 * @author   Rudy ONFROY <rudy@onfroy.net>
 */
interface ExpandableInterface
{
    public static function create(ManagerInterface $em);
    public function __construct(ManagerInterface $em);
    public function extensions();
    public function __call($name, array $args);
}
