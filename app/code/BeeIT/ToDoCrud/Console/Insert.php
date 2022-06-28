<?php
namespace BeeIT\ToDoCrud\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use BeeIT\ToDoCrud\Model\ToDo\ToDoItemFactory as ToDoFactory;

class Insert extends Command
{
    protected toDoFactory $toDoFactory;

    protected function configure()
    {
        $this->setName('crud:insert');
        $this->setDescription('Demo command line');

        parent::configure();
    }

    public function __construct(toDoFactory $toDoFactory, string $name = null)
    {
        $this->toDoFactory = $toDoFactory;
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $todo = $this->toDoFactory->create();
        $todo->addData(["description" => "beeit1", "creation_time" => time(), "update_time" => time(), "completed" => false]);
        $todo->save();
    }
}
