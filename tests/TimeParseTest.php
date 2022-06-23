<?php
require_once('src/Test2/TimeParse.php');

use PHPUnit\Framework\TestCase;
use src\Test2\TimeParse;

class TimeParseTest extends TestCase
{
    /** @test */
    public function valid1()
    {
        $x = new TimeParse();
        $result = $x->to_date('The first Monday of October 2019');
        $this->assertEquals($result,'2019-10-07');
    }

    /** @test */
    public function valid2()
    {
        $x = new TimeParse();
        $result = $x->to_date('The third Tuesday of October 2019');
        $this->assertEquals($result,'2019-10-15');
    }

    /** @test */
    public function valid3()
    {
        $x = new TimeParse();
        $result = $x->to_date('The last Wednesday of October 2019');
        $this->assertEquals($result,'2019-10-30');
    }

    /** @test */
    public function notvalid1()
    {
        $x = new TimeParse();
        $result = $x->to_date('The first Frogday of October 2019');
        $this->assertFalse($result);
    }

    /** @test */
    public function notvalid2()
    {
        $x = new TimeParse();
        $result = $x->to_date('The quick brown fox jumped over the lazy dog.');
        $this->assertFalse($result);
    }




}