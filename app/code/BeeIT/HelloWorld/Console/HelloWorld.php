<?php
namespace BeeIT\HelloWorld\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorld extends Command
{
   protected function configure()
   {
       $this->setName('hello:world');
       $this->setDescription('Demo command line');

       parent::configure();
   }
   protected function execute(InputInterface $input, OutputInterface $output)
   {
       $output->writeln("Hello World");
       $output->writeln(date("d/m/Y"));
   }
}
