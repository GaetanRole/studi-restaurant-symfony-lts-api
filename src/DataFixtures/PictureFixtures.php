<?php

namespace App\DataFixtures;

use App\Entity\{Picture, Restaurant};
use App\Service\Utils;
use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Exception;

class PictureFixtures extends Fixture implements DependentFixtureInterface
{
    /** @throws Exception */
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= RestaurantFixtures::RESTAURANT_NB_TUPLES; $i++) {
            /** @var Restaurant $restaurant */
            $restaurant = $this->getReference(
                RestaurantFixtures::RESTAURANT_REFERENCE . random_int(1, RestaurantFixtures::RESTAURANT_NB_TUPLES)
            );
            $title = "Article n°$i";

            $picture = (new Picture())
                ->setTitle($title)
                ->setSlug(Utils::slugify($title))
                ->setRestaurant($restaurant)
                ->setCreatedAt(new DateTimeImmutable());

            $manager->persist($picture);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [RestaurantFixtures::class];
    }
}
