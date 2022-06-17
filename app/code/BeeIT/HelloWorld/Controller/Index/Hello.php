<?php
namespace BeeIT\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Hello implements HttpGetActionInterface
{

    public function execute()
    {
        echo "Hello World";
    }
}
