<?php

namespace App\Controller;

use App\Contract\ProductManagerInterface;
use App\Dto\CategoryFilterDto;
use App\Entity\Product;
use App\Form\CategoryFilterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param Request $request
     * @param ProductManagerInterface $productManager
     * @return Response
     */
    public function index(
        Request $request,
        ProductManagerInterface $productManager
    ): Response
    {
        $dto = new CategoryFilterDto();
        $form = $this->createForm(CategoryFilterType::class,$dto);
        $form->handleRequest($request);

        /** @var Product $products */
        $products = $productManager->getProductByCategory($dto);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'filterForm' => $form->createView(),
            'products' => $products,
            'category' => $dto->getName()
        ]);
    }
}
