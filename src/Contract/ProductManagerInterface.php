<?php


namespace App\Contract;


use App\Dto\CategoryFilterDto;
use Doctrine\Common\Collections\Collection;

interface ProductManagerInterface
{
    /**
     * @param CategoryFilterDto $categoryFilterDto
     * @return Collection
     */
    public function getProductByCategory(CategoryFilterDto $categoryFilterDto):Collection;
}