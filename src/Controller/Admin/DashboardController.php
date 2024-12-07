<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Client;
use App\Entity\Facture;
use App\Entity\TypeReparation;
use App\Entity\Voiture;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;



class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
      
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(ClientCrudController::class)->generateUrl();
     
           return $this->redirect($url);
        
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('App');
    }

    public function configureMenuItems(): iterable
    {

        yield MenuItem::linkToCrud('Client', 'fa-solid fa-user', Client::class);
        yield MenuItem::linkToCrud('Voiture', 'fa-solid fa-car', Voiture::class);
        yield MenuItem::linkToCrud('Facture', 'fa-solid fa-file-lines', Facture::class);
        yield MenuItem::linkToCrud('TypeReparation', 'fa-solid fa-screwdriver-wrench', TypeReparation::class);
    }
}
