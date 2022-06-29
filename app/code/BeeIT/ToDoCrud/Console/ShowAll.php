<?php
namespace BeeIT\ToDoCrud\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use BeeIT\ToDoCrud\Model\ResourceModel\ToDo\ToDoItem\Collection as toDoItemCollection;
use BeeIT\ToDoCrud\Model\ResourceModel\ToDo\ToDoItem\CollectionFactory as toDoItemCollectionFactory;

class ShowAll extends Command
{
    protected toDoItemCollectionFactory $toDoItemCollectionFactory;

    protected function configure()
    {
        $this->setName('crud:showAll');
        $this->setDescription('Shows all values from beeit_todocrud_todoitem table.');

        parent::configure();
    }

    public function __construct(toDoItemCollectionFactory $toDoItemCollectionFactory, string $name = null)
    {
        $this->toDoItemCollectionFactory = $toDoItemCollectionFactory;
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var ToDoItemCollection $ToDoItemCollection */
        $toDoItemCollection = $this->toDoItemCollectionFactory->create();
        $toDoItemCollection->setPageSize(50);
        $allItems = $toDoItemCollection->getItems();
            foreach ($allItems as $item) {
                $output->writeln(implode(' ', $item->getData()));
                $output->writeln(" ");
            }
    }
}
