<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Repository\RestaurantRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/restaurant', name: 'app_api_restaurant_')]
class RestaurantController extends AbstractController
{
    public function __construct(private EntityManagerInterface $manager, private RestaurantRepository $repository)
    {
    }

    #[Route(methods: 'POST')]
    public function new(): Response
    {
        $restaurant = new Restaurant();
        $restaurant->setName('Quai Antique');
        $restaurant->setDescription('Cette qualité et ce goût par le chef Arnaud MICHANT.');
        $restaurant->setCreatedAt(new DateTimeImmutable());

        // Tell Doctrine you want to (eventually) save the restaurant (no queries yet)
        $this->manager->persist($restaurant);
        // Actually executes the queries (i.e. the INSERT query)
        $this->manager->flush();

        return $this->json(
            ['message' => "Restaurant resource created with {$restaurant->getId()} id"],
            Response::HTTP_CREATED,
        );
    }

    #[Route('/{id}', name: 'show', methods: 'GET')]
    public function show(int $id): Response
    {
        $restaurant = $this->repository->findOneBy(['id' => $id]);

        if (!$restaurant) {
            throw $this->createNotFoundException("No Restaurant found for {$id} id");
        }

        return $this->json(
            ['message' => "A Restaurant was found : {$restaurant->getName()} for {$restaurant->getId()} id"]
        );
    }

    #[Route('/{id}', name: 'edit', methods: 'PUT')]
    public function edit(int $id): Response
    {
        $restaurant = $this->repository->findOneBy(['id' => $id]);

        if (!$restaurant) {
            throw $this->createNotFoundException("No Restaurant found for {$id} id");
        }

        $restaurant->setName('Restaurant name updated');
        $this->manager->flush();

        return $this->redirectToRoute('app_api_restaurant_show', ['id' => $restaurant->getId()]);
    }

    #[Route('/{id}', name: 'delete', methods: 'DELETE')]
    public function delete(int $id): Response
    {
        $restaurant = $this->repository->findOneBy(['id' => $id]);

        if (!$restaurant) {
            throw $this->createNotFoundException("No Restaurant found for {$id} id");
        }

        $this->manager->remove($restaurant);
        $this->manager->flush();

        return $this->json(['message' => "Restaurant resource deleted"], Response::HTTP_NO_CONTENT);
    }
}
