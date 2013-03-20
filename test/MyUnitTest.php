<?php
class MyUnitTest extends PHPUnit_Framework_TestCase
{
    public function testDummy()
    {
		$x = new Afro\MaClass();
        $this->assertEquals($x->hello(), "hello");
    }
}
?>