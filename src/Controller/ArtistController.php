<?php

namespace App\Controller;

use App\Entity\Artist;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArtistController extends AbstractController
{
    #[Route('/artist', name: 'app_artist', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $artists = $entityManager->getRepository(Artist::class)->findBy([], ['lastname' => 'ASC']);

        return $this->render('artist/index.html.twig', [
            'artists' => $artists,
        ]);
    }

    #[Route('/artist/{id}', name: 'app_artist_show', requirements: ['id' =>'\d+'], methods: ['GET'])]
    public function show(int $id, EntityManagerInterface $entityManager): Response
    {
        $artist = $entityManager->getRepository(Artist::class)->find($id);
        if(!$artist) {
            throw $this->createNotFoundException('Aucun artiste trouvé.');
        }

        return $this->render('artist/show.html.twig', [
            'artist' => $artist,
        ]);
    }


}
