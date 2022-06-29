<?php
namespace BeeIT\ToDoCrud\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use BeeIT\ToDoCrud\Model\ToDo\ToDoItemFactory as toDoItemFactory;

class Delete extends Command
{
    protected toDoItemFactory $toDoItemFactory;
    const ID = 'id';

    protected function configure()
    {
        $options = [
			new InputOption(
				self::ID,
				null,
				InputOption::VALUE_REQUIRED,
				'Id'
			)
		];
        $this->setName('crud:delete');
        $this->setDescription('Deletes a row with the selected id.');
        $this->setDefinition($options);

        parent::configure();
    }

    public function __construct(toDoItemFactory $toDoItemFactory, string $name = null)
    {
        $this->toDoItemFactory = $toDoItemFactory;
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($id = $input->getOption(self::ID)) {
            $todoItem = $this->toDoItemFactory->create();
            $result = $todoItem->setId($id);
            $result->delete();
        } else {
            $output->writeln("Please enter an id.");
        }
    }
}
