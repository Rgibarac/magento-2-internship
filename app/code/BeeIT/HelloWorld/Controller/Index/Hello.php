<?php

namespace BeeIT\HelloWorld\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Controller\ResultFactory;
use Magento\Customer\Model\Session;

class Hello implements HttpGetActionInterface
{
    protected Session $customerSession;
    protected ResultFactory $resultFactory;

    public function __construct(Session $customerSession, ResultFactory $resultFactory)
    {
        $this->customerSession = $customerSession;
        $this->resultFactory = $resultFactory;
    }

    public function execute()
    {
        $result = $this->resultFactory->create(ResultFactory::TYPE_RAW);
        $objectManager = ObjectManager::getInstance();
        $customerSession2 = $objectManager->get('Magento\Customer\Model\Session');
        $customerID2 = $customerSession2->getCustomerId();
        $customerID = $this->customerSession->getCustomerId();
        if ($customerID === null) {
            $result->setContents("You are not currently logged in.");
        } else {
            $result->setContents("Hello customer with the id of $customerID. <br/> Hello customer with the id of $customerID2.");
        }
        return $result;
    }
}
