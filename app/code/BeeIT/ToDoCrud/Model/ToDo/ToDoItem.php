<?php
namespace BeeIT\ToDoCrud\Model\ToDo;

use BeeIT\ToDoCrud\Model\ResourceModel\ToDo\ToDoItem as ToDoItemResourceModel;
use Magento\Framework\Model\AbstractModel;

class ToDoItem extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(ToDoItemResourceModel::class);
    }
}
