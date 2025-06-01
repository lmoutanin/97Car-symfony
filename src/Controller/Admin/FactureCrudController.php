<?php

namespace App\Controller\Admin;

use Symfony\Component\PropertyAccess\PropertyAccess;
use App\Entity\Facture;
use App\Entity\TypeReparation;
use App\Form\FactureTypeReparationType;  

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class FactureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Facture::class;
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
            IdField::new('id')->hideOnForm(),
            DateField::new('date_facture', 'Date de la facture'),
            AssociationField::new('client')
                ->setFormTypeOption('placeholder', 'Choisissez un Client'),
            AssociationField::new('voiture')
                ->setFormTypeOption('placeholder', 'Choisissez une Voiture'),
            
            CollectionField::new('factureTypeReparations', 'Réparations')
                ->setEntryType(FactureTypeReparationType::class)
                ->allowAdd()
                ->allowDelete()
                ->setFormTypeOption('by_reference', false),
               
            IntegerField::new('montant')
                

            

        ];
    }
}
