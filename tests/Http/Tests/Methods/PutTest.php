<?php


namespace Http\Tests\Methods;

use Http\Methods\Put;

class PutTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test that the globalise method correctly creates the global $_PUT;
     */
    public function testGlobalise()
    {
        (new Put())->globalize();
        global $_PUT; // Unfortunately you have to manually bring it into 'global' scope.

        $this->assertTrue(isset($_PUT));
        $this->assertArrayHasKey("_PUT", get_defined_vars());
    }

    /*
     * Test the array access methods
     */
    public function testArrayAccess()
    {
        $requestBody = <<<REQUEST
boo
REQUEST;

        (new Put($requestBody))->globalize();
        global $_PUT;

        $this->setExpectedException('\ErrorException');

        $_PUT['joe'] = 'blogs';
    }

}
 