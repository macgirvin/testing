<?php
require_once('src/Test5/Xmlread.php');

use PHPUnit\Framework\TestCase;
use src\Test5\Xmlread;

class XmlreadTest extends TestCase
{
    /** @test */
    public function xml1()
    {
        $xmlreader = new Xmlread('src/Test5/sample.xml');
        $results = $xmlreader->parse();

        print_r($results);

        $this->assertEquals(12, count($results));

        $xmlreader = new Xmlread('src/Test5/sample2.xml');
        $results = $xmlreader->parse();

        print_r($results);

        $this->assertEquals(1, count($results));

    }



}