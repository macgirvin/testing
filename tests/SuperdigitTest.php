<?php
require_once('src/Test4/Superdigit.php');

use PHPUnit\Framework\TestCase;
use src\Test4\Superdigit;

class SuperdigitTest extends TestCase
{
    /** @test */
    public function super1()
    {
        $x = new Superdigit(4);
        $result = $x->execute();
        $this->assertEquals(4, $result);

        $x = new Superdigit(18);
        $result = $x->execute();
        $this->assertEquals(9, $result);

        $x = new Superdigit(258);
        $result = $x->execute();
        $this->assertEquals(6, $result);

        $x = new Superdigit(412345);
        $result = $x->execute();
        $this->assertEquals(1, $result);

        $x = new Superdigit(0);
        $result = $x->execute();
        $this->assertEquals(0, $result);

        $x = new Superdigit(-62);
        $result = $x->execute();
        $this->assertEquals(0, $result);

    }
}