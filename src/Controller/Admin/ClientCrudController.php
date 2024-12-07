<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;


class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom')->setRequired(true),
            TextField::new('prenom')->setRequired(true),
            TextField::new('telephone')->setRequired(true),
            EmailField::new('mel')->setRequired(true),
            TextField::new('adresse')->setRequired(true),
            IntegerField::new('code_postal')->setRequired(true),
            TextField::new('ville')->setRequired(true)
        ];
    }
}
