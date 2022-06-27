<?php

namespace BeeIT\ToDoCrud\Model\ResourceModel\ToDo;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ToDoItem extends  AbstractDb
{
    const MAIN_TABLE = 'beeit_todocrud_todoitem';
    const ID_FIELD_NAME = 'id';



    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
