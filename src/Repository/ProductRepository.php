<?php

namespace App\Repository;

use App\Dto\CategoryFilterDto;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @param CategoryFilterDto $categoryFilterDto
     * @return ArrayCollection
     */
    public function getProductByCategory(CategoryFilterDto $categoryFilterDto)
    {
        $query = $this->createQueryBuilder('e')
            ->select('e')
            ->andWhere('e.category = :category')
            ->setParameters(array(
                'category' => $categoryFilterDto->getName()
            ));
        return new ArrayCollection($query->getQuery()->getResult());
    }
}
