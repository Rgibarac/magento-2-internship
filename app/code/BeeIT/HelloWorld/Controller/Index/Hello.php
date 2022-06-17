<?php
namespace BeeIT\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\HTTP\PhpEnvironment\Request;
use Magento\Customer\Model\Session;

class Hello extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $customerSession;

    public function __construct(Context $context, Session $customerSession)
    {
        $this->customerSession = $customerSession;
        parent::__construct($context);
    }

    public function execute()
    {
    echo "hello world";
    }
}
