<?php
namespace src\Test2;

use \DateTime;

final class TimeParse
{
    public function __construct($tz = 'Australia/Sydney')
    {
        // A timezone needs to be set.
        date_default_timezone_set($tz);
    }

    public function to_date($string)
    {
        // DateTime parser doesn't do too badly at this task,
        // but doesn't like the word "The". There are probably other words it
        // doesn't like.

        // So I'm going to create an allowed wordlist and extend it to
        // include numbers, and the word 'of' which is required, as the default
        // behaviour is 'before' in its absence.

        if (! $string) {
            throw new \Exception('invalid string');
        }

        $allowed = [ 'first', 'second', 'third', 'fourth', 'fifth', 'last',
            'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday',
            'sunday', 'january', 'february', 'march', 'april', 'may', 'june',
            'july', 'august', 'september', 'october', 'november', 'december',
            'of'];

        // Check for acceptable input

        $arr = explode(' ', $string);

        for ($x = 0; $x < count($arr); $x ++) {
            $isvalid = false;
            foreach ($allowed as $acceptable) {
                if (strcasecmp($arr[$x],$acceptable) === 0
                        || intval($arr[$x])) {
                    $isvalid = true;
                    break;
                }
            }
            if (!$isvalid) {
                unset($arr[$x]);
            }
        }

        $newstring = implode(' ',$arr);

        // This will throw an expection on bad input.
        try {
            $d = new DateTime($newstring);
        } catch (\Exception $e) {
            return false;
        }
        return $d->format('Y-m-d');
    }

}