<?php
/**
 * Created by PhpStorm.
 * User: wap62
 * Date: 05/02/19
 * Time: 14:12
 */

namespace App\Entity;


class PropertySearch
{
    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @var int|null
     */
    private $minSurface;

    /**
     *@return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param intnull $maxPrice
     * @return PropertySearch
     */
    public function setMaxPrice(int $maxPrice): PropertySearch
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    /**
     * @param int|null $minsurface
     * @return PropertySearch
     */
    public function setMinSurface(?int $minSurface): PropertySearch
    {
        $this->minSurface = $minSurface;
        return $this;
    }
}