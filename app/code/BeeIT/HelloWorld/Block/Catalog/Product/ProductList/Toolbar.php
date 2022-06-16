<?php
namespace BeeIT\HelloWorld\Block\Catalog\Product\ProductList;

class Toolbar extends \Magento\Catalog\Block\Product\ProductList\Toolbar
{
    /**
     * Retrieve available Order fields list
     *
     * @return array
     */
    public function getAvailableOrders()
    {
        $this->loadAvailableOrders();
        return $this->_availableOrder;
    }

    /**
     * Load Available Orders
     *
     * @return \Magento\Catalog\Block\Product\ProductList\Toolbar
     */
    private function loadAvailableOrders()
    {
        if ($this->_availableOrder === null) {
            $this->_availableOrder = $this->_catalogConfig->getAttributeUsedForSortByArray();
        }
        $this->_availableOrder['bestsellers'] = 'Best SellersSS';
        return $this;
    }
}
