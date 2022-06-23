<?php
require_once('src/Test1/Repeater.php');

use PHPUnit\Framework\TestCase;
use src\Test1\Repeater;

final class RepeatsTest extends TestCase
{
    /** @test */
    public function wordsWithoutRepeats(): void
    {
        $x = new Repeater();
        $valid_words = [ 'documentarily', 'aftershock', 'countryside', 'six-year-old'];
        foreach ($valid_words as $word) {
            echo $word . "\n";
            $this->assertTrue($x->norepeats($word));
        }

        $invalid_words = [ 'Double-down', 'Euclidian', 'epidemic', 23, null];

        foreach ($invalid_words as $word) {
            echo $word . "\n";
            $this->assertFalse($x->norepeats($word));
        }
    }
}