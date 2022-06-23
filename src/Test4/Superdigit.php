<?php
namespace src\Test4;

final class Superdigit
{
    protected $number = 0;

    public function __construct($number)
    {
        if ((int) $number > 0) {
            $this->number = (int) $number;
        }
    }

    public function execute() {
        return $this->add($this->number);
    }

    public function add($num)
    {
        $sum = 0;
        $string = strval($num);
        for ($x = 0; $x < strlen($string); $x ++) {
            $sum += (int) substr($string,$x,1);
        }
        if ($sum >= 10) {
            $sum = $this->add($sum);
        }

        return $sum;
    }
}