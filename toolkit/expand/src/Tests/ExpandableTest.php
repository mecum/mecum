<?php
namespace Mecum\Expand\Tests;

use Mecum\Expand\Expandable;
use Mecum\Expand\ExpandableInterface;

class ExpandableTest extends \PHPUnit_Framework_TestCase
{
    public function test_create()
    {
        $e = Expandable::Create();
        
        $this->assertEquals(true, ($e instanceof ExpandableInterface));  
        $this->assertEquals(true, ($e instanceof Expandable));
    }
    
    public function test_create_extension_set()
    {
        $e = Expandable::Create();
        
        $e->extensions()->set('extension',function(){ return true; });
    }
    
    public function test_create_extension_exists()
    {
        $e = Expandable::Create();
        
        $e->extensions()->set('extension',function(){ return true; });
        
        $this->assertEquals(true, $e->extensions()->exists('extension'));
        $this->assertEquals(false, $e->extensions()->exists('extension2'));        
    }
    
    public function test_create_extension_call()
    {
        $e = Expandable::Create();
        
        $e->extensions()->set('extension',function(){ return 'test'; });
        
        $this->assertEquals('test', $e->extension());       
    }
    
    public function test_clone()
    {
        $expandable = Expandable::Create();
        $expandable->extensions()
                        ->set('extension',function(){ return 'test'; });
        
        $expandable2 = clone $expandable;
        $expandable2->extensions()->set('extension2',function(){ return 'test'; });
        
        $expandable3 = Expandable::Create();
        
        $this->assertEquals(true, $expandable->extensions()->exists('extension'));
        $this->assertEquals(true, $expandable->extensions()->exists('extension2'));   
        
        $this->assertEquals(true, $expandable2->extensions()->exists('extension'));
        $this->assertEquals(true, $expandable2->extensions()->exists('extension2'));  
        
        $this->assertEquals(false, $expandable3->extensions()->exists('extension'));
        $this->assertEquals(false, $expandable3->extensions()->exists('extension2'));  
    }
}