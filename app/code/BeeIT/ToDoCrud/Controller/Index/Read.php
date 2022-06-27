<?php

namespace BeeIT\ToDoCrud\Controller\Index;

use Magento\Framework\App\Action\Context;
use BeeIT\ToDoCrud\Model\ResourceModel\ToDo\ToDoItem\Collection as ToDoItemCollection;
use BeeIT\ToDoCrud\Model\ResourceModel\ToDo\ToDoItem\CollectionFactory as ToDoItemCollectionFactory;

class Read extends \Magento\Framework\App\Action\Action
{
    protected ToDoItemCollectionFactory $ToDoItemCollectionFactory;

    public function __construct(Context $context, ToDoItemCollectionFactory $ToDoItemCollectionFactory)
    {
        $this->ToDoItemCollectionFactory = $ToDoItemCollectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        /** @var ToDoItemCollection $ToDoItemCollection */
        $ToDoItemCollection = $this->ToDoItemCollectionFactory->create();
        $allItems = $ToDoItemCollection->getItems();
        foreach ($allItems as $item) {
            var_dump($item->getData());
            echo "<br/>";
        }
        die();

    }
}
