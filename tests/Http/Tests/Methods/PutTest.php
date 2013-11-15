<?php


namespace Http\Tests\Methods;

use Http\Methods\Put;

class PutTest extends \PHPUnit_Framework_TestCase
{
    /*
     * Test the array writing
     */
    public function testArrayWrite()
    {
        $requestBody = <<<REQUEST
boo
REQUEST;

        (new Put($requestBody))->globalize();
        global $_PUT;

        $this->setExpectedException('\ErrorException');

        $_PUT['joe'] = 'blogs';
    }

    /*
     * Test reading array access
     */
    public function testArrayRead()
    {
        $requestBody = json_encode(array("key"=>"value"));

        (new Put($requestBody))->globalize();
        global $_PUT;

        $this->assertEquals("value", $_PUT->asArray()['key']);
        
        $this->assertEquals("value", (new Put($requestBody))->offsetGet("key"));
    }
    
    /**
     * Test array offset unsets
     */
    public function testArrayRemove()
    {
        $requestBody = json_encode(array("key"=>"value"));
        (new Put($requestBody))->globalize();
        global $_PUT;

        $this->setExpectedException('\ErrorException');

        unset($_PUT['joe']);
    }
}
