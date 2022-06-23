<?php
require_once('src/Test3/Merger.php');

use PHPUnit\Framework\TestCase;
use src\Test3\Merger;

class MergerTest extends TestCase
{
    /** @test */
    public function merger1()
    {
        $x = new Merger('MICHAEL', 'JORDAN');
        $result = $x->merge();
        echo $result . "\n";
        $this->assertEquals('MJIOCRHDAAENL', $result);

        $x = new Merger('abcdefg', 'hijklmnop');
        $result = $x->merge();
        echo $result . "\n";
        $this->assertEquals('ahbicjdkelfmgnop', $result);

        $x = new Merger('abcdefg', '');
        $result = $x->merge();
        echo $result . "\n";
        $this->assertEquals('abcdefg', $result);

        $x = new Merger('', 'lmnop');
        $result = $x->merge();
        echo $result . "\n";
        $this->assertEquals('lmnop', $result);

        $x = new Merger('', '');
        $result = $x->merge();
        echo $result . "\n";
        $this->assertEquals('', $result);

    }
}