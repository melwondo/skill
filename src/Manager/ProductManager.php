<?php


namespace App\Manager;


use App\Contract\ProductManagerInterface;
use App\Dto\CategoryFilterDto;
use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;

class ProductManager implements ProductManagerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $productRepository = $em->getRepository(Product::class);
        if (!$productRepository instanceof ProductRepository) {
            throw new \InvalidArgumentException(sprintf(
                'The repository class for "%s" must be "%s" and given "%s"! ' .
                'Maybe look the "repositoryClass" declaration on %s ?',
                Product::class,
                ProductRepository::class,
                get_class($productRepository),
                ProductRepository::class
            ));
        }
        $this->productRepository = $productRepository;
    }

    /**
     * @param CategoryFilterDto $categoryFilterDto
     * @return ArrayCollection
     */
    public function getProductByCategory(CategoryFilterDto $categoryFilterDto):Collection
    {
        return $this->productRepository->getProductByCategory($categoryFilterDto);
    }
}