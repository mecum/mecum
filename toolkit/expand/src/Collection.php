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
 * Collection of extensions
 *
 * @package  Mecum\Expand
 * @author   Rudy ONFROY <rudy@onfroy.net>
 */
class Collection extends \ArrayObject implements CollectionInterface
{
    const MSG_EXTENSION_NAME = 'The extension name must be a valid string';
    const MSG_NO_EXTENSION_TOGET = 'There is no extension with the given name(%s) to get';
    const MSG_NOT_ITERABLE = 'The extension collection must be iterable';

    /**
     *  Create a new collection
     *
     *  @return self
     */
    public static function create()
    {
        return new self();
    }

    /**
     *  Set a new extension
     *
     *  @param string $name
     *  @param \Closure $extension
     *
     *  @throws \InvalidArgumentException
     */
    public function set($name, \Closure $extension)
    {
        if (!is_string($name)) {
            throw new \InvalidArgumentException(self::MSG_EXTENSION_NAME, 210);
        }

        parent::offsetSet(strtolower($name), $extension);
        
        return $this;
    }

    /**
     *  Get a new extension method
     *
     *  @param string $name
     *
     *  @throws \InvalidArgumentException
     *  @throws \LogicException
     *
     *  @return \Closure
     */
    public function get($name)
    {
        if (!is_string($name)) {
            throw new \InvalidArgumentException(self::MSG_EXTENSION_NAME, 220);
        }
    
        if (!$this->offsetExists(strtolower($name))) {
            throw new \LogicException(sprintf(self::MSG_NO_EXTENSION_TOGET, $name), 221);
        }
        
        return parent::offsetGet(strtolower($name));
    }

    /**
     *  Add a list of extension
     *
     *  @param Traversable|array $collection
     *
     *  @throws \InvalidArgumentException
     *
     *  @return \Closure
     */
    public function add($collection)
    {
        if (!is_array($collection) and !($collection instanceof \Traversable)) {
            throw new \InvalidArgumentException(self::MSG_NOT_ITERABLE, 230);
        }
        
        foreach ($collection as $name => $closure) {
            $this->set($name, $closure);
        }
        
        return $this;
    }
    
    /**
     *  Check if an extension exists
     *
     *  @param string $name
     *
     *  @return bool
     */
    public function exists($name)
    {
        return parent::offsetExists(strtolower($name));
    }
    
    
    /**
     *  @deprecated
     *  @see self::exists()
     */
    public function offsetExists($name)
    {
        return $this->exists($name);
    }

    /**
     *  @deprecated
     *  @see self::set()
     */
    public function offsetSet($name, $extension)
    {
        return $this->set($name, $extension);
    }

    /**
     *  @deprecated
     *  @see self::get()
     */
    public function offsetGet($name)
    {
        return $this->get($name);
    }

    /**
     *  @deprecated
     *  @see self::add()
     */
    public function append($collection)
    {
        return $this->add($collection);
    }

    /**
     *  @deprecated
     *  @see self::add()
     */
    public function exchangeArray($collection)
    {
        return $this->add($collection);
    }
}
