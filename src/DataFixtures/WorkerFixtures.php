<?php

namespace App\DataFixtures;

use App\Entity\Workers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory ;

class WorkerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create();

        $electricianService = $this->getReference('service_electrician');

        for ($i = 0; $i < 20; $i ++){
            $worker = new Workers();
            $worker->setFirstname($faker->firstName());
            $worker->setLastname($faker->lastName());
            $worker->setCity($faker->randomElement(['Lyon','Paris']));
            $worker->setPrise($faker->numberBetween(30, 60));
            $worker->setExperience($faker->numberBetween(1, 25));
            $worker->setNumberPhone($faker->phoneNumber());
            $worker->setPhoto($faker->randomElement(['https://www.familyhandyman.com/wp-content/uploads/2022/11/FHM-pro-electrician-GettyImages-1263444017-JVedit.jpg','https://www.leecompany.com/wp-content/uploads/2022/06/Avoid-Mistakes-When-Hiring-an-Electrician-1280x960.jpg','https://www.ajselectrical.ca/wp-content/uploads/2021/03/Commercial-Electrician-Working.jpg','https://www.workbc.ca/sites/default/files/styles/hero_image/public/NTI5NzE_te5iGGnHfezEnQ32-7243-NOC.jpg?itok=ltCbTGQ3','https://austincareerinstitute.edu/wp-content/uploads/2023/01/electrical-tech-scaled.jpg']));
            $worker->setService($electricianService);
            $manager->persist($worker);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ServiceFixtures::class,
        ];
    }
}
