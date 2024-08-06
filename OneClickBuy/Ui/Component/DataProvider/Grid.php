<?php
namespace GSV\OneClickBuy\Ui\Component\DataProvider;

use Magento\Ui\DataProvider\AbstractDataProvider;

use GSV\OneClickBuy\Model\ResourceModel\Order\CollectionFactory;

class Grid extends AbstractDataProvider
{
    protected $name;

    protected $primaryFieldName;

    protected $requestFieldName;

    protected $meta = [];

    protected $data = [];

    protected $collection;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->name = $name;
        $this->primaryFieldName = $primaryFieldName;
        $this->requestFieldName = $requestFieldName;
        $this->meta = $meta;
        $this->data = $data;
        parent::__construct(
            $name,
            $primaryFieldName,
            $requestFieldName,
            $meta,
            $data
        );

        $this->collection = $collectionFactory->create();
    }

    public function getData()
    {
        return $this->collection->toArray();
    }
}
