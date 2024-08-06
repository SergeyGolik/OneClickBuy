<?php
namespace GSV\OneClickBuy\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use GSV\OneClickBuy\Model\OrderFactory;

class Order extends Action
{
    private $resultJsonFactory;
    private $orderFactory;

    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        OrderFactory $orderFactory
    ) {
        $this->resultJsonFactory = $resultJsonFactory;
        $this->orderFactory = $orderFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        $post = $this->getRequest()->getPostValue();

        if (!$post || !isset($post['product_sku']) || !isset($post['phone'])) {
            return $result->setData(['success' => false, 'message' => 'Invalid request.']);
        }

        try {
            $order = $this->orderFactory->create();
            $order->setData([
                'sku' => $post['product_sku'],
                'phone' => $post['phone']
            ]);
            $order->save();

            return $result->setData(['success' => true, 'message' => 'Order received.']);
        } catch (\Exception $e) {
            return $result->setData(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
