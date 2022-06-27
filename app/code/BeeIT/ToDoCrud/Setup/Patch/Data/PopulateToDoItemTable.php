<?php

namespace BeeIT\ToDoCrud\Setup\Patch\Data;

use BeeIT\ToDoCrud\Model\ResourceModel\ToDo\ToDoItem as ToDoItemResourceModel;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\Patch\PatchInterface;

class PopulateToDoItemTable implements DataPatchInterface
{

    protected $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }

    public static function getDependencies()
    {
        return [];
    }

    public function getAliases()
    {
        return [];
    }

    public function apply()
    {
        $setup = $this->moduleDataSetup;
        $setup->startSetup();

        $table = $setup->getTable(ToDoItemResourceModel::MAIN_TABLE);
        $setup->getConnection()->insert($table, ["id" => 1, "description" => "beeit1", "date_completed" => 1655801001, "creation_time" => 1655801001, "update_time" => 1655801001, "completed" => true]);

        $setup->endSetup();
    }
}
