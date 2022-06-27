<?php

namespace BeeIT\ToDoCrud\Controller\Index;

use Magento\Framework\App\Action\Context;
use BeeIT\ToDoCrud\Model\ToDo\ToDoItemFactory as ToDoItemFactory;

class Edit extends \Magento\Framework\App\Action\Action
{
    protected ToDoItemFactory $ToDoItemFactory;

    public function __construct(Context $context, ToDoItemFactory $ToDoItemFactory)
    {
        $this->ToDoItemFactory = $ToDoItemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $Edit = $this->ToDoItemFactory->create();
        $result = $Edit->load("36");
        $resultData = $result->getData();
        $resultData["completed"]="1";
        $resultData["date_completed"]=strval(time());
        $result->addData($resultData);
        $result->setId("36");
        $result->save();
        die();
    }
}
