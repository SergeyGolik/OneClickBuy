<?php
namespace GSV\OneClickBuy\Block;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class OneClickBuy extends Template
{
    private $productRepository;

    public function __construct(
        Context $context,
        ProductRepositoryInterface $productRepository,
        array $data = []
    ) {
        $this->productRepository = $productRepository;
        parent::__construct($context, $data);
    }

    public function getProduct()
    {
        return $this->productRepository->getById($this->getRequest()->getParam('id'));
    }
}
