<?php
namespace GSV\OneClickBuy\Model\ResourceModel\Order;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use GSV\OneClickBuy\Model\Order as Model;
use GSV\OneClickBuy\Model\ResourceModel\Order as ResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'order_id';

    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
