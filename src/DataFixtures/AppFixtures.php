<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Categorie;
use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //Catégories
        $action = new Categorie();
        $action->setNom('action');
        $manager->persist($action);

        $drame = new Categorie();
        $drame->setNom('Drame');
        $manager->persist($drame);

        $comedie = new Categorie();
        $comedie->setNom('Comedie');
        $manager->persist($comedie);

        $romance = new Categorie();
        $romance->setNom('Romance');
        $manager->persist($romance);

        //Artistes
        $tom = new Artist();
        $tom->setFirstName('Tom');
        $tom->setlastName('Cruise');
        $tom->setDatenaissance(new \DateTime('1966-09-04'));
        $tom->setSexe('M');
        $manager->persist($tom);

        $keanu = new Artist();
        $keanu->setFirstName('keanu');
        $keanu->setlastName('Reeves');
        $keanu->setDatenaissance(new \DateTime('1969-10-04'));
        $keanu->setSexe('M');
        $manager->persist($keanu);

        $kate = new Artist();
        $kate->setFirstName('Kate');
        $kate->setlastName('Winslet');
        $kate->setDatenaissance(new \DateTime('1970-04-04'));
        $kate->setSexe('F');
        $manager->persist($kate);

        $leonardo = new Artist();
        $leonardo->setFirstName('Leonardo');
        $leonardo->setlastName('Dicaprio');
        $leonardo->setDatenaissance(new \DateTime('1968-02-04'));
        $leonardo->setSexe('M');
        $manager->persist($leonardo);

        $danzel = new Artist();
        $danzel->setFirstName('Danzel');
        $danzel->setlastName('Washington');
        $danzel->setDatenaissance(new \DateTime('1963-02-04'));
        $danzel->setSexe('M');
        $manager->persist($danzel);
        
        //Films
        $titanic = new Film;
        $titanic->setTitre('Titanic');
        $titanic->setDescription('Un film romantique');
        $titanic->setCategorie($romance);
        $titanic->addArtist($leonardo);
        $titanic->addArtist($kate);
        $manager->persist($titanic);

        $john = new Film;
        $john->setTitre('John Wick');
        $john->setDescription('Un film action');
        $john->setCategorie($action);
        $john->addArtist($keanu);
        $manager->persist($john);

        $avatar = new Film;
        $avatar->setTitre('Avatar');
        $avatar->setDescription('Un film comédie');
        $avatar->setCategorie($comedie);
        $avatar->addArtist($keanu);
        $manager->persist($avatar);

        $jfk = new Film;
        $jfk->setTitre('JFK');
        /*  $jfk->setDescription('Pas de description'); */
        $jfk->setCategorie($comedie);
        $jfk->addArtist($danzel);
        $manager->persist($jfk);

        $manager->flush();
    }
}
