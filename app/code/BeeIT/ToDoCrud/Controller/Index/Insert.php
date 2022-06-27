<?php

namespace BeeIT\ToDoCrud\Controller\Index;

use BeeIT\ToDoCrud\Model\ToDo\ToDoItemFactory as toDoFactory;
use Magento\Framework\App\Action\Context;

class Insert extends \Magento\Framework\App\Action\Action
{
    protected toDoFactory $toDoFactory;

    public function __construct(Context $context, toDoFactory $toDoFactory)
    {
        $this->toDoFactory = $toDoFactory;
        parent::__construct($context);
    }

    /**
     * @throws \Exception
     */
    public function execute()
    {
        $todo = $this->toDoFactory->create();
        $todo->addData(["description" => "beeit1", "creation_time" => time(), "update_time" => time(), "completed" => false]);
        $todo->save();
        return $this->_redirect('todocrud/index/showall');
    }
}
