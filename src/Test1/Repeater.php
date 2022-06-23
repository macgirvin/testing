<?php
namespace src\Test1;

final class Repeater
{
    public function norepeats($word)
    {
        // We are only checking characters and not punctuation
        // according to the example text. The regex will need to be extended
        // if Unicode or numbers are allowed.

        if (! ($word && is_string($word))) {
            return false;
        }
        $arr = count_chars(preg_replace('/[^a-zA-z]/','', $word), 1);
        foreach ($arr as $key => $value) {
            if ($value > 1) {
                return false;
            }
        }
        return true;
    }

}