<?php
namespace Mecum\Expand\Tests;

use Mecum\Expand\Collection;

class CollectionTest extends \PHPUnit_Framework_TestCase
{
    public function test_set_exists()
    {
        $c = new Collection();
        $c->set('extension',function(){ return true; });
        
        $this->assertEquals(true, $c->exists('extension'));  
        $this->assertEquals(false, $c->exists('extension2'));  
    }
    
    public function test_set_get()
    {
        $c = new Collection();
        $c->set('extension',function(){ return true; });
        
        $closure = $c->get('extension');
        
        $this->assertEquals(true, $closure());  
    }
    
    public function test_add_get()
    {
        $c = new Collection();
        
        $c->add([
            'extension1' =>function(){ return true; },
            'extension2' =>function(){ return true; }            
        ]);
        
        $closure1 = $c->get('extension1');
        $closure2 = $c->get('extension2');
        
        $this->assertEquals(true, $closure1());  
        $this->assertEquals(true, $closure2());     
    }
    
    
}