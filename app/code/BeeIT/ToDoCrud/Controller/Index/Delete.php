<?php

namespace BeeIT\ToDoCrud\Controller\Index;

use Magento\Framework\App\Action\Context;
use BeeIT\ToDoCrud\Model\ToDo\ToDoItemFactory as toDoItemFactory;

class Delete extends \Magento\Framework\App\Action\Action
{
    protected toDoItemFactory $toDoItemFactory;

    public function __construct(Context $context, toDoItemFactory $toDoItemFactory)
    {
        $this->toDoItemFactory = $toDoItemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $model = $this->toDoItemFactory->create();
        $result = $model->setId("44");
        $result->delete();
        return $this->_redirect('todocrud/index/showall');
    }
}
