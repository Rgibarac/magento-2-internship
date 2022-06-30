<?php
namespace BeeIT\ToDoCrud\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use BeeIT\ToDoCrud\Model\ToDo\ToDoItemFactory as ToDoItemFactory;

class Edit extends Command
{
    protected ToDoItemFactory $toDoItemFactory;
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

            $result = $this->toDoItemFactory->create();
            $result->load($id);
            $resultData = $result->getData();

            $output->writeln("Do you want to mark this as completed? (y/n):");
            $handle = fopen ("php://stdin","r");
            do { $line = fgets($handle); } while ($line == '');
            fclose($handle);
            if (strcmp($line,"y") == 1){
                $resultData["completed"] = "1";
                $resultData["date_completed"] = strval(time());
                $result->addData($resultData);
                $result->save();
            }
            $output->writeln("Do you want to edit description? (y/n):");
            $handle = fopen ("php://stdin","r");
            do { $line = fgets($handle); } while ($line == '');
            fclose($handle);
            $output->writeln($line);
            if (strcmp($line,"y") == 1){
                $output->writeln("Please enter desired description:");
                $handle = fopen ("php://stdin","r");
            do { $line = fgets($handle); } while ($line == "");
                $resultData["description"] = $line;
                $result->addData($resultData);
                $result->save();
            }
        } else {
            $output->writeln("Please enter an id.");
        }
    }
}
