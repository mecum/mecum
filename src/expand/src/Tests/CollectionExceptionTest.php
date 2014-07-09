<?php
namespace Mecum\Expand\Tests;

use Mecum\Expand\Collection;

class CollectionExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionCode 210
     */
    public function test_set_exception()
    {
        $c = new Collection();
        $c->set(array(),function(){ return true; });
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionCode 220
     */
    public function test_get_exception()
    {
        $c = new Collection();
        $c->get(array());
    }
    
    /**
     * @expectedException LogicException
     * @expectedExceptionCode 221
     */
    public function test_get_exception2()
    {
        $c = new Collection();
        $c->get('notexists');  
    }
    
    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionCode 230
     */
    public function test_add_exception()
    {
        $c = new Collection();
        $c->add('');  
    }
    
}