<?php

namespace BeeIT\ToDoCrud\Controller\Index;

use Magento\Framework\App\Action\Context;
use BeeIT\ToDoCrud\Model\ResourceModel\ToDo\ToDoItem\Collection as toDoItemCollection;
use BeeIT\ToDoCrud\Model\ResourceModel\ToDo\ToDoItem\CollectionFactory as toDoItemCollectionFactory;

class ShowAll extends \Magento\Framework\App\Action\Action
{
    protected toDoItemCollectionFactory $toDoItemCollectionFactory;

    public function __construct(Context $context, toDoItemCollectionFactory $toDoItemCollectionFactory)
    {
        $this->toDoItemCollectionFactory = $toDoItemCollectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        /** @var toDoItemCollection $toDoItemCollection */
        $toDoItemCollection = $this->toDoItemCollectionFactory->create();
        $allItems = $toDoItemCollection->getItems();
        foreach ($allItems as $item) {
            var_dump($item->getData());
            echo "<br/>";
        }
    }
}
