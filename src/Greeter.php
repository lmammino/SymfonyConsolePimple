<?php

namespace LMammino\ConsoleApp;


use Symfony\Component\Yaml\Yaml;

class Greeter
{
    /**
     * @var string $file
     */
    protected $file;

    /**
     * @var array $greetings
     */
    protected $greetings;

    /**
     * Constructor
     *
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file;
        if (file_exists($file)) {
            $this->greetings = Yaml::parse(file_get_contents($file));
        } else {
            $this->greetings = array();
        }
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        file_put_contents($this->file, Yaml::dump($this->greetings));
    }

    /**
     * Builds the greeting for someone (you can yell on it if you want!)
     *
     * @param string $name
     * @param bool $yell wanna yell?
     * @return string
     */
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

    /**
     * Will tell you how many times you greet someone
     *
     * @param string $name
     * @return int
     */
    public function countGreetings($name)
    {
        $name = strtolower($name);
        if (!isset($this->greetings[$name])) {
            return 0;
        }

        return $this->greetings[$name];
    }
} 