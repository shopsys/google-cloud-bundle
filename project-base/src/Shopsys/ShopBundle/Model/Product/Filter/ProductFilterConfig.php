<?php

namespace Shopsys\ShopBundle\Model\Product\Filter;

use Shopsys\ShopBundle\Model\Product\Filter\PriceRange;

class ProductFilterConfig
{
    /**
     * @var \Shopsys\ShopBundle\Model\Product\Filter\ParameterFilterChoice[]
     */
    private $parameterChoices;

    /**
     * @var \Shopsys\ShopBundle\Model\Product\Flag\Flag[]
     */
    private $flagChoices;

    /**
     * @var \Shopsys\ShopBundle\Model\Product\Brand\Brand[]
     */
    private $brandChoices;

    /**
     * @var \Shopsys\ShopBundle\Model\Product\Filter\PriceRange
     */
    private $priceRange;

    /**
     * @param \Shopsys\ShopBundle\Model\Product\Filter\ParameterFilterChoice[] $parameterChoices
     * @param \Shopsys\ShopBundle\Model\Product\Flag\Flag[] $flagChoices
     * @param \Shopsys\ShopBundle\Model\Product\Brand\Brand[] $brandChoices
     * @param \Shopsys\ShopBundle\Model\Product\Filter\PriceRange $priceRange
     */
    public function __construct(
        array $parameterChoices,
        array $flagChoices,
        array $brandChoices,
        PriceRange $priceRange
    ) {
        $this->parameterChoices = $parameterChoices;
        $this->flagChoices = $flagChoices;
        $this->brandChoices = $brandChoices;
        $this->priceRange = $priceRange;
    }

    /**
     * @return \Shopsys\ShopBundle\Model\Product\Filter\ParameterFilterChoice[]
     */
    public function getParameterChoices()
    {
        return $this->parameterChoices;
    }

    /**
     * @return \Shopsys\ShopBundle\Model\Product\Flag\Flag[]
     */
    public function getFlagChoices()
    {
        return $this->flagChoices;
    }

    /**
     * @return \Shopsys\ShopBundle\Model\Product\Brand\Brand[]
     */
    public function getBrandChoices()
    {
        return $this->brandChoices;
    }

    /**
     * @return \Shopsys\ShopBundle\Model\Product\Filter\PriceRange
     */
    public function getPriceRange()
    {
        return $this->priceRange;
    }
}
