<?php
namespace BeeIT\HelloWorld\Plugin;

use Magento\Catalog\Block\Product\ProductList\Toolbar;

class AddBestSellersToToolbarAvailableOrders
{
    public function afterGetAvailableOrders(Toolbar $subject, $result)
    {
       $result['bestsellers'] = 'Best Sellers';
       return $result;

    }
}
