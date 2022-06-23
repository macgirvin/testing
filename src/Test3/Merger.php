<?php
namespace src\Test3;

final class Merger
{
    private $word1;
    private $word2;

    public function __construct($word1, $word2)
    {
        $this->word1 = $word1;
        $this->word2 = $word2;
    }

    public function merge()
    {
        $output = '';

        if ($this->word1 && !$this->word2) {
            return $this->word1;
        }
        if ($this->word2 && !$this->word1) {
            return $this->word2;
        }
        if (! ($this->word1 && $this->word2)) {
            return $output;
        }

        $counter = 0;
        while (1) {
            $c1 = substr($this->word1, $counter, 1);
            $c2 = substr($this->word2, $counter, 1);
            if ($c1) {
                $output .= $c1;
            }
            if ($c2) {
                $output .= $c2;
            }
            if (!$c1 && !$c2) {
                break;
            }
            $counter ++;
        }

        return $output;
    }

}