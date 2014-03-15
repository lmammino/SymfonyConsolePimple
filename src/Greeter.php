<?php

namespace LMammino\ConsoleApp;


use Symfony\Component\Yaml\Yaml;

class Greeter
{
    protected $file;

    protected $greetings;

    public function __construct($file)
    {
        $this->file = $file;
        if (file_exists($file)) {
            $this->greetings = Yaml::parse(file_get_contents($file));
        } else {
            $this->greetings = array();
        }
    }

    public function __destruct()
    {
        file_put_contents($this->file, Yaml::dump($this->greetings));
    }

    public function greet($name, $yell = false)
    {
        $output = sprintf('Hello %s', $name);
        if ($yell) {
            $output = strtoupper($output);
        }

        $name = strtolower($name);
        if(!isset($this->greetings[$name]))
        {
            $this->greetings[$name] = 1;
        } else {
            $this->greetings[$name]++;
        }

        return $output;
    }

    public function countGreetings($name)
    {
        $name = strtolower($name);
        if (!isset($this->greetings[$name])) {
            return 0;
        }

        return $this->greetings[$name];
    }
} 