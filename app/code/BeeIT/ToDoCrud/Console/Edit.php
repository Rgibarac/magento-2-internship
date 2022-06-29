<?php
namespace BeeIT\ToDoCrud\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use BeeIT\ToDoCrud\Model\ToDo\ToDoItemFactory as toDoItemFactory;

class Edit extends Command
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
        $this->setName('crud:edit');
        $this->setDescription('Changes the values of the row with the selected id to completed and sets completion time.');
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
            $result = $todoItem->load($id);
            $resultData = $result->getData();
            $resultData["completed"] = "1";
            $resultData["date_completed"] = strval(time());
            $result->addData($resultData);
            $result->save();
        } else {
            $output->writeln("Please enter an id.");
        }
    }
}
