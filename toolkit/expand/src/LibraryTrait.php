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
 * ExtensionTrait
 *
 * Implementation of the extension library interface
 *
 * @package  Mecum\Expand
 * @author   Rudy ONFROY <rudy@onfroy.net>
 */
trait LibraryTrait
{
   /**
    * @var self $instance The object instance
    */
    protected static $instance = [];
    
   /**
    * @var array $extensions The collection of extensions
    */
    private $extensions = null;
    
    /**
     *  Get an extension
     *
     *  @param string $name
     *
     *  @return \Closure
     */
    public static function get($name)
    {
        $class = get_called_class();
    
        if (!isset(self::$instance[$class])) {
            self::$instance[$class] = new static();
        }
        
        return self::$instance[$class]->getExtensions()->get($name);
    }
    
    /**
     *  Get all extension
     *
     *  @return \Mecum\Component\Expand\ExtensionCollection
     */
    public static function getAll()
    {
        $class = get_called_class();
        
        if (!isset(self::$instance[$class])) {
            self::$instance[$class] = new static();
        }
        
        return self::$instance[$class]->getExtensions();
    }
    
    /**
     *  Get the extension collection
     *
     *  @return \Mecum\Component\Expand\ExtensionCollection
     */
    public function getExtensions()
    {
        if (is_null($this->extensions)) {
            $this->extensions = new Collection();
        }
        
        return $this->extensions;
    }
    
    /**
     *  Set a new extension
     *
     *  @access protected
     *  @param \Closure $extension
     *
     *  @return $this
     */
    protected function set($name, \Closure $extension)
    {
        $this->getExtensions()->set($name, $extension);
        
        return $this;
    }
}
