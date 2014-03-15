<?php

$c = new Pimple();

$c['parameters'] = array(
    'greetings.file' => 'greetings.yaml'
);

$c['greeter'] = function($c) {
    return new \LMammino\ConsoleApp\Greeter($c['parameters']['greetings.file']);
};

$c['command.greet'] = function($c) {
    return new \LMammino\ConsoleApp\Command\GreetCommand($c['greeter']);
};

$c['commands'] = function($c) {
    return array(
        $c['command.greet']
    );
};

return $c;