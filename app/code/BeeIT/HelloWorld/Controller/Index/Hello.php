<?php
namespace BeeIT\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Controller\ResultFactory;
use Magento\Customer\Model\Session;

class Hello extends \Magento\Framework\App\Action\Action
{
    protected $customerSession;

    public function __construct(Context $context, Session $customerSession)
    {
        $this->customerSession = $customerSession;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $objectManager = ObjectManager::getInstance();
        $customerSession2 =$objectManager->get('Magento\Customer\Model\Session');
        $customerID2 = $customerSession2->getCustomerId();
        echo "Hello customer with the id of $customerID2.";
        echo "<br/>";
        $customerID = $this->customerSession->getCustomerId();
        $result->setContents( "Hello customer with the id of $customerID.");
        return $result;
    }
}
