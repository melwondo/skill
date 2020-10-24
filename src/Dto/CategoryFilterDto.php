<?php


namespace App\Dto;


use App\Entity\Category;

class CategoryFilterDto
{
    /**
     * @var Category
     */
    private $name;

    /**
     * @return Category
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param Category $name
     * @return CategoryFilterDto
     */
    public function setName(Category $name):CategoryFilterDto
    {
        $this->name = $name;
        return $this;
    }
}