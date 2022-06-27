<?php

namespace BeeIT\ToDoCrud\Controller\Index;

use Magento\Framework\App\Action\Context;
use BeeIT\ToDoCrud\Model\ToDo\ToDoItemFactory as ToDoItemFactory;

class Delete extends \Magento\Framework\App\Action\Action
{
    protected ToDoItemFactory $ToDoItemFactory;

    public function __construct(Context $context, ToDoItemFactory $ToDoItemFactory)
    {
        $this->ToDoItemFactory = $ToDoItemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $Delete = $this->ToDoItemFactory->create();
        $result = $Delete->setId("27");
        $result->delete();
        die();
    }
}
