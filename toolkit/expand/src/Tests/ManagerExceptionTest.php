<?php
namespace Mecum\Expand\Tests;

use Mecum\Expand\Manager;
use Mecum\Expand\Collection;
use Mecum\Expand\Expandable;

class ManagerExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException BadMethodCallException
     * @expectedExceptionCode 110
     */
    public function test_call()
    {
        $em = Manager::Create();
        
        $this->assertEquals(true, ($em->call(Expandable::create(),'extension',[])));  
    }       
    
}