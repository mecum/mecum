<?php
namespace Mecum\Expand\Tests;

use Mecum\Expand\Manager;
use Mecum\Expand\ManagerInterface;
use Mecum\Expand\Collection;
use Mecum\Expand\Expandable;


class ManagerTest extends \PHPUnit_Framework_TestCase
{
    public function test_create()
    {
        $m = Manager::Create();
       
        $this->assertEquals(true, ($m instanceof ManagerInterface));  
        $this->assertEquals(true, ($m instanceof Manager));  
    }
    
    /**
     * @depends test_create
     */
    public function test_set()
    {
        Manager::Create()->set('extension',function(){return true;});
    }   
    
    /**
     * @depends test_create
     */
    public function test_add()
    {
        Manager::Create()->add(Collection::create());
    }   
    
    /**
     * @depends test_set
     */
    public function test_exists()
    {
        $m = Manager::Create()->set('extension',function(){return true;});
        
        $this->assertEquals(true, $m->exists('extension'));  
        $this->assertEquals(false, $m->exists('extension2'));          
    }   
    
    /**
     * @depends test_set
     * @depends test_exists
     */
    public function test_set_call()
    {
        $m = Manager::Create()->set('extension',function(){return true;});
        
        $this->assertEquals(true, ($m->call(Expandable::create(),'extension',[])));  
    }       
    
}