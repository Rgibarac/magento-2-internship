<?php
namespace BeeIT\ToDoCrud\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use BeeIT\ToDoCrud\Model\ToDo\ToDoItemFactory as ToDoFactory;

class Insert extends Command
{
    protected toDoFactory $toDoFactory;
    const DESCRIPTION = 'description';

    protected function configure()
    {
        $options = [
			new InputOption(
				self::DESCRIPTION,
				null,
				InputOption::VALUE_REQUIRED,
				'Description'
			)
		];
        $this->setName('crud:insert');
        $this->setDescription('Inserts a new row into beeit_todocrud_todoitem table with entered description.');
        $this->setDefinition($options);

        parent::configure();
    }

    public function __construct(toDoFactory $toDoFactory, string $name = null)
    {
        $this->toDoFactory = $toDoFactory;
        parent::__construct($name);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($description = $input->getOption(self::DESCRIPTION)) {
            $result = $this->toDoFactory->create();
            $result->addData(["description" => $description, "creation_time" => time(), "update_time" => time(), "completed" => false]);
            $result->save();
        } else {
            $output->writeln("Please enter a description.");
        }
    }
}
