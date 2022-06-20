<?php

namespace BeeIT\HelloWorld\Plugin;

use Magento\Catalog\Block\Product\ProductList\Toolbar;

class AddBestSellersToToolbarAvailableOrders
{
    public function aroundGetAvailableOrders(Toolbar $subject, callable $proceed)
    {
        $result = $proceed();
        $result['best sellers - plugin'] = 'Best Sellers - Plugin';
        return $result;
    }
}
