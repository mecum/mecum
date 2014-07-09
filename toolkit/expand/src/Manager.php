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
 * Collection
 *
 * Expandable collection that is useful to simplify and organise complex data treatments and manipulations.
 * It's can append data from every iterable object.
 *
 * @package  Mecum\Unify
 * @author   Rudy ONFROY <rudy@onfroy.net>
 */
class Manager implements ManagerInterface
{
    const MSG_NO_EXTENSION_TOCALL  = 'There is no extension with the given name(%s) to call';
    
    private $extensions;
  
    /**
     *  Create a new Manager
     *
     *  @return self
     */
    public static function create()
    {
        return new static();
    }
                        
    /**
     *  Constructor
     */
    public function __construct()
    {
        $this->extensions = Collection::create();
    }
    
    /**
     *  Add a new extension
     *
     *  @param string $name
     *  @param \Closure $closure
     *
     *  @return $this
     */
    public function set($name, \Closure $closure)
    {
        $this->extensions->set($name, $closure);
        
        return $this;
    }
    
    /**
     *  Add all closure in a iterable dataset as new extension method
     *
     *  @param \Mecum\Component\Expand\CollectionInterface $collection Collection of extension
     *
     *  @return $this
     */
    public function add(CollectionInterface $collection)
    {
        $this->extensions->add($collection);
        
        return $this;
    }
    
    /**
     *  Check if an extension method exists
     *
     *  @return bool
     */
    public function exists($name)
    {
        return $this->extensions->exists($name);
    }

    /**
     *  Using extensions
     *
     *  @param \Mecum\Component\Expand\ExpandableInterface $object
     *  @param string $name
     *  @param array $args
     *
     *  @throws \BadMethodCallException
     */
    public function call(ExpandableInterface $object, $name, array $args)
    {
        if (!$this::exists($name)) {
            throw new \BadMethodCallException(sprintf(self::MSG_NO_EXTENSION_TOCALL, $name), 110);
        }
        
        $closure = $this->extensions->get($name);
        
        return call_user_func_array(\Closure::bind($closure, $object, get_class($object)), $args);
    }
}
