<?php

namespace BeeIT\ToDoCrud\Controller\Index;

use Magento\Framework\App\Action\Context;
use BeeIT\ToDoCrud\Model\ToDo\ToDoItemFactory as toDoItemFactory;

class Edit extends \Magento\Framework\App\Action\Action
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
        $result = $model->load("46");
        $resultData = $result->getData();
        $resultData["completed"]="1";
        $resultData["date_completed"]=strval(time());
        $result->addData($resultData);
        $result->save();
        return $this->_redirect('todocrud/index/showall');
    }
}
