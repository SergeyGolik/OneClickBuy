<?php
namespace GSV\OneClickBuy\Model;

use Magento\Framework\Model\AbstractModel;

class Order extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('GSV\OneClickBuy\Model\ResourceModel\Order');
    }
}
