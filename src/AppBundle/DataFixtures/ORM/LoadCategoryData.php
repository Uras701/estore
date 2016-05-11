<?php namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\ORM\Doctrine\Populator;

/**
 * Class LoadCategoryData
 *
 * @package AppBundle\DataFixtures\ORM
 */
class LoadCategoryData implements
    FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $populator = new Populator($faker, $manager);
        $populator->addEntity(Category::class,
            100,
            [
                'name' => function () use ($faker) {
                    return trim($faker->unique()->text(20), '.,');
                },
            ]);

        $populator->execute();
    }
}
