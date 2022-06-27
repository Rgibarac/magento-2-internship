<?php

namespace BeeIT\ToDoCrud\Controller\Index;

use BeeIT\ToDoCrud\Model\ToDo\ToDoItemFactory as ToDoFactory;
use Magento\Framework\App\Action\Context;

class Insert extends \Magento\Framework\App\Action\Action
{
    protected ToDoFactory $ToDoFactory;

    public function __construct(Context $context, ToDoFactory $ToDoFactory)
    {
        $this->ToDoFactory = $ToDoFactory;
        parent::__construct($context);
    }

    /**
     * @throws \Exception
     */
    public function execute()
    {
        $model = $this->ToDoFactory->create();
        $model->addData(["description" => "beeit1", "date_completed" => null, "creation_time" => time(), "update_time" => time(), "completed" => false]);
        $model->save();
        die();
    }
}
