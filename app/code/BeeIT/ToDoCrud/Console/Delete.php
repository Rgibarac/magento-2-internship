<?php
namespace BeeIT\ToDoCrud\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use BeeIT\ToDoCrud\Model\ToDo\ToDoItemFactory as toDoItemFactory;

class Delete extends Command
{
    protected toDoItemFactory $toDoItemFactory;

    protected function configure()
    {
        $this->setName('crud:delete');
        $this->setDescription('Demo command line');

        parent::configure();
    }

    public function __construct(toDoItemFactory $toDoItemFactory, string $name = null)
    {
        $this->toDoItemFactory = $toDoItemFactory;
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $todoItem = $this->toDoItemFactory->create();
        $result = $todoItem->setId("48");
        $result->delete();
    }
}
