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
 * ExpandableTrait
 *
 * Add to a class the power to be extended dynamically.
 *
 * @package  Mecum\Expand
 * @author   Rudy ONFROY <rudy@onfroy.net>
 */
trait ExpandableTrait
{
   /**
    * @var ManagerInterface $extensions The extension manager instance
    */
    protected $extensions;
    
    /**
     *  Constructor
     *
     *  @param \Mecum\Component\ManagerInterface $em
     */
    public function __construct(ManagerInterface $em)
    {
        $this->extensions = $em;
    }
    
    /**
     *  Create a new extensible object
     *
     *  @param \Mecum\Component\ManagerInterface $em
     *
     *  @return self 
     */
    public static function create(ManagerInterface $em = null)
    {
        return new static($em ?: Manager::create());
    }
    
    /**
     *  Get the extension manager
     *
     *  @return \Mecum\Component\ManagerInterface
     */
    public function extensions()
    {
        return  $this->extensions;
    }
 
    /**
     * Using extensions
     *
     * @param string $name Extension name
     * @param array $args Arguments of the extension
     */
    public function __call($name, array $args)
    {
        return $this->extensions->call($this, $name, $args);
    }
}
