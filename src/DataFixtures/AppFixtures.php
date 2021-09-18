<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\Projet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\Constraints\Date;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder =$passwordEncoder;
    }

    public function load(ObjectManager $manager )
    {
        // Création d'un utilisateur Admin
       /* $admin = new User();
        $admin->setNom('admin');
        $admin->setPrenom('admin');
        $admin->setCivilite('Mr');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setDateNaissance( new \DateTime('01/11/1997'));
        $admin->setEmail('admin@admin.com');
        $admin->setPassword(
            $this->passwordEncoder->encodePassword(
                $admin,
                'Admin123'
            )
        );
        $admin->setIsVerified(true);
        $manager->persist($admin);
        $manager->flush();*/

        $projet = new Projet();
        $projet->setTitre('Application Marlier sa');
        $projet->setAnnee( new \DateTime('2020'));
        $projet->setTechnologie(['HTML', 'CSS', 'Boostrap', 'Angular', 'Symfony', 'ApiPlatform', 'Responsive', 'Sécurité', 'AWS', 'PhpSpreadsheet']);
        $projet->setDescription('Développement d\'une application sécurisé ayant un usage interne uniquement. Cette application propose
         une interface permettant de modifier le fichier excel recensant toutes les activités des employés de l\'entreprise durant un mois');
        $projet->setImages(['marlierSa.png','marlierSa2.png','marlierSa3.png']);
        $manager->persist($projet);
        $manager->flush();

        $projet = new Projet();
        $projet->setTitre('Site Vitrine/e-commerce');
        $projet->setAnnee( new \DateTime('2021'));
        $projet->setTechnologie(['HTML', 'CSS', 'Wordpress', 'WooCommerce', 'SEO', 'Deploiement Serveur', 'Responsive', 'Sécurité']);
        $projet->setDescription('Développement d\'un site vitrine pour la société Biomonde Le Creusot comportant également une partie e-commerce sur une vingtaine de produit.');
        $projet->setEnLigne('https://biomondelecreusot.com/');
        $projet->setImages(['biomonde.png','biomonde2.png','biomonde3.png']);
        $manager->persist($projet);
        $manager->flush();

        $projet = new Projet();
        $projet->setTitre('Site de vente de voiture d\'occasion');
        $projet->setAnnee( new \DateTime('2020'));
        $projet->setTechnologie(['HTML', 'CSS', 'Boostrap', 'Angular', 'Symfony', 'ApiPlatform', 'Responsive', 'Sécurité', 'Maquettage']);
        $projet->setDescription('Projet réalisé en cours de formation qui consiste au développement d\'un site de mis en relation entre vendeur de voiture d\'occasion et client.
         Le site possède un coté client qui présente toute les voitures et leurs informations et un back-office pour que les vendeurs gères leurs voitures.' );
        $projet->setImages(['businessCase.png','businessCase2.png','businessCase3.png']);
        $manager->persist($projet);
        $manager->flush();

        $projet = new Projet();
        $projet->setTitre('Site e-commerce');
        $projet->setAnnee( new \DateTime('2021'));
        $projet->setTechnologie(['HTML', 'CSS', 'Boostrap', 'Symfony', 'Twig', 'Responsive', 'Sécurité', 'Intégration']);
        $projet->setDescription('Projet personnel réalisé dans le but de découvrir en profondeur Symfony. Le site possède toutes les fonctionnalités d\'un site e-commerce classique.
            Intégration d\'un template pour le design.' );
        $projet->setImages(['caveauByards.png','caveauByards2.png','caveauByards3.png']);
        $manager->persist($projet);
        $manager->flush();

        $projet = new Projet();
        $projet->setTitre('Dashboard Supply France');
        $projet->setAnnee( new \DateTime('2021'));
        $projet->setTechnologie(['HTML', 'CSS', 'Boostrap', 'Angular', 'Sécurité', 'Intégration', 'NodeJs', 'Bot']);
        $projet->setDescription('Back office de gestion d\'utilisateurs et de leur rôle issus d\'un serveur Discord');
        $projet->setImages(['SupplyFrance.png','SupplyFrance2.png','SupplyFrance3.png','SupplyFrance4.png']);
        $manager->persist($projet);
        $manager->flush();

        $contact = new Contact();
        $contact->setEmail('test@test.com');
        $contact->setName('test');
        $contact->setDevis(true);
        $contact->setMessage('Salut je test');
        $manager->persist($contact);
        $manager->flush();
    }
}
