<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\Product;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DashboardController
 * @package App\Controller\Admin
 * @Security("is_granted('ROLE_ADMIN')")
 */
class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();
        return $this->redirect($routeBuilder->setController(ProductCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Skill Dashboard');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToCrud('Product', 'fab fa-product-hunt', Product::class),
            MenuItem::linkToCrud('Category', 'fa fa-tags', Category::class),
            MenuItem::linkToCrud('Order', 'fas fa-shipping-fast', Order::class),
            MenuItem::linkToCrud('OrderItem', 'fas fa-barcode ', OrderItem::class),
            MenuItem::linkToCrud('User', 'fa fa-user', User::class),
        ];
    }
}
