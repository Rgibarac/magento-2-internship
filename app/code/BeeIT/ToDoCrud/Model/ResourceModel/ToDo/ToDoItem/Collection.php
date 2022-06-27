<?php
namespace BeeIT\ToDoCrud\Model\ResourceModel\ToDo\ToDoItem;

use BeeIT\ToDoCrud\Model\ToDo\ToDoItem as ToDoItemModel;
use BeeIT\ToDoCrud\Model\ResourceModel\ToDo\ToDoItem as ToDoModelResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(ToDoItemModel::class,ToDoModelResourceModel::class);
    }

}
