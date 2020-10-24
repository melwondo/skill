<?php


namespace App\Manager;


use App\Contract\CategoryManagerInterface;
use App\Dto\CategoryFilterDto;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;

class CategoryManager implements CategoryManagerInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $categoryRepository = $em->getRepository(Category::class);
        if (!$categoryRepository instanceof CategoryRepository) {
            throw new \InvalidArgumentException(sprintf(
                'The repository class for "%s" must be "%s" and given "%s"! ' .
                'Maybe look the "repositoryClass" declaration on %s ?',
                Category::class,
                CategoryRepository::class,
                get_class($categoryRepository),
                CategoryRepository::class
            ));
        }
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * {@inheritDoc}
     */
    public function getProductByCategory(CategoryFilterDto $categoryFilterDto): Collection
    {
        return $this->categoryRepository->getProductByCategory($categoryFilterDto);
    }
}