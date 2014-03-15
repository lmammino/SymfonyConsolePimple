<?php

namespace LMammino\ConsoleApp\Command;


use LMammino\ConsoleApp\Greeter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GreetCommand extends Command
{
    /**
     * @var \LMammino\ConsoleApp\Greeter $greeter
     */
    protected $greeter;

    /**
     * Constructor
     *
     * @param Greeter $greeter
     */
    public function __construct(Greeter $greeter)
    {
        parent::__construct();
        $this->greeter = $greeter;
    }

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this->setName('greet')
            ->setDescription('Greet someone')
            ->addArgument('name', InputArgument::OPTIONAL, 'The name of the one you want to greet', 'World')
            ->addOption('yell', 'Y', InputOption::VALUE_NONE, 'If set will scream out the greeting. Use with caution!');
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $yell = $input->getOption('yell');

        $output->writeln($this->greeter->greet($name, $yell));
        if (1 === ($count = $this->greeter->countGreetings($name))){
            $output->writeln('(First time!)');
        } else {
            $output->writeln(sprintf('(%d times)', $count));
        }
    }


} 