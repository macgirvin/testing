<?php
namespace src\Test5;

final class Xmlread
{

    protected $data = '';

    public function __construct($file)
    {
        libxml_use_internal_errors(true);
        $data = file_get_contents($file);
        if (strpos($data,'<?xml ') === false) {
            $data = "<?xml version='1.0' encoding='UTF-8' ?>\r\n" . $data;
        }
        $this->data = $data;
    }

    public function parse() {
        $results = [];
        $xml = simplexml_load_string($this->data);
        if ($xml === false) {
            foreach(libxml_get_errors() as $error) {
                echo $error->message . "\n";
            }
            throw new \Exception('unable to parse xml');
        }

        $json = json_encode($xml);
        $arr = json_decode($json,true);

        foreach($arr as $key => $value) {
            if (isset($value['uniqueID'])) {
                $results[$value['uniqueID']] = $key;
            } else {
                foreach ($value as $val) {
                    if (isset($val['uniqueID'])) {
                        $results[$val['uniqueID']] = $key;
                    }
                }
            }
        }
        return $results;
    }

}