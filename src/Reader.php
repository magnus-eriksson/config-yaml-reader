<?php namespace Maer\Config\Yaml;

use Maer\Config\Readers\ReaderInterface;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class Reader implements ReaderInterface
{
    public function read($file)
    {
        $content = [];
        $string  = file_get_contents($file);
        $content = Yaml::parse($string, Yaml::PARSE_EXCEPTION_ON_INVALID_TYPE);
        return is_array($content) ? $content : [];
    }
}
