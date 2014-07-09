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
 * Expand
 *
 * Class which can be extended dynamically.
 * You can inherit from it to easily implement all methods of the expand interface. 
 *
 * @package  Mecum\Expand
 * @author   Rudy ONFROY <rudy@onfroy.net>
 */
class Expandable implements ExpandableInterface
{
    use ExpandableTrait;
}
