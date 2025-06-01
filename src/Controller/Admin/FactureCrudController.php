<?php

namespace App\Controller\Admin;

use Symfony\Component\PropertyAccess\PropertyAccess;
use App\Entity\Facture;
use App\Entity\TypeReparation;
use App\Form\FactureTypeReparationType;  
use Doctrine\ORM\EntityManagerInterface;
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

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateField::new('date_facture', 'Date de la facture'),
            AssociationField::new('voiture')
                ->setFormTypeOption('placeholder', 'Sélectionnez une voiture'),

            // Le champ client n’est **pas affiché dans le formulaire**
            AssociationField::new('client')
                ->onlyOnIndex(), // visible uniquement dans la liste

            CollectionField::new('factureTypeReparations', 'Réparations')
                ->setEntryType(FactureTypeReparationType::class)
                ->allowAdd()
                ->allowDelete()
                ->setFormTypeOption('by_reference', false),

            MoneyField::new('montant')
                ->setCurrency('EUR')
                ->setStoredAsCents(false)
                ->setNumDecimals(0) // pour afficher 9€ au lieu de 9,00€
                ->onlyOnIndex(), // visible uniquement dans la liste
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Facture) return;

        // Déduire automatiquement le client depuis la voiture
        $voiture = $entityInstance->getVoiture();
        if ($voiture !== null && $voiture->getClient() !== null) {
            $entityInstance->setClient($voiture->getClient());
        }

        parent::persistEntity($entityManager, $entityInstance);
    }
}