<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Exception;
use Faker;

class RestaurantFixtures extends Fixture
{
    /** @throws Exception */
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) {
            $restaurant = (new Restaurant())
                ->setName($faker->company())
                ->setDescription($faker->text())
                ->setAmOpeningTime([])
                ->setPmOpeningTime([])
                ->setMaxGuest(random_int(10,50))
                ->setCreatedAt(new DateTimeImmutable());

            $manager->persist($restaurant);
            $this->addReference("restaurant" . $i, $restaurant);
        }

        $manager->flush();
    }
}
