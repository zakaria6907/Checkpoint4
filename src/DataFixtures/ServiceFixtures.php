<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServiceFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {   
        $services = [
            ['Electrician', 'https://fingerlakesyouthapprenticeship.org/wp-content/uploads/2020/05/electrician.jpg'],
            ['Plumber', 'https://nationaltoday.com/wp-content/uploads/2022/07/7-Fix-a-Leak-Week-1200x834.jpg'],
            ['Carpenter', 'https://img.freepik.com/free-photo/carpenter-cutting-mdf-board-inside-workshop_23-2149451074.jpg?w=2000'],
            ['Mason', 'https://www.yourfreecareertest.com/wp-content/uploads/2017/12/what_does_a_masonry_helper_do.jpg'],
            ['Painter', 'https://www.washingtonpost.com/resizer/vRC4pEUJTRUH50whR2g9awsWc2I=/arc-anglerfish-washpost-prod-washpost/public/A724RBEN2AI6PHCTNILJX2YJKM.jpg'],
            ['Roofer', 'https://kaseinsurance.com/wp-content/uploads/2021/07/image4.jpg'],
            ['Welder', 'https://s3.envato.com/files/279849431/MB__3643_mostostalMB2019.jpg'],
            ['HVAC technician', 'https://www.neit.edu/wp-content/uploads/2021/06/How-to-be-HVAC-Technician-scaled.jpg'],
            ['Tile installer', 'https://www.capelasurfaces.com/wp-content/uploads/2020/02/tile-installation-expertise.jpg'],
            ['Landscaper', 'https://greenthumb.ca/wp-content/uploads/2018/02/shutterstock_287707931-1.jpg'],
            ['Drywaller', 'https://www.workbc.ca/sites/default/files/styles/hero_image/public/NTI5NzE_NtuZRSvibUy2eedx-7284-NOC.jpg?itok=j2L9oC6u'],
            ['Glazier', 'https://www.laborfinders.com/media/wgfmcojj/testfile.jpg?width=738&height=440&v=1d90dbae51c8530&format=webp&quality=80'],
            ['Flooring installer', 'https://www.fcimag.com/ext/resources/Issues/2017/the-flooring-contractor/summer-2017/installing-hardwood.jpg?1553703757'],
            ['Concrete finisher', 'https://www.workforcewindsoressex.com/wp-content/uploads/2019/02/4-1024x780.jpg'],
            ['Insulation installer', 'https://pricewiseinsulation.com.au/wp-content/uploads/2019/04/factors-to-consider-when-thinking-of-becoming-an-insulation-installer-blog.jpg'],
            ['Scaffolder', 'https://scaffmag.com/wp-content/uploads/2018/05/3104857_Generic-workers-Godiva-Group-scaffolders-safety-.jpg'],
            ['Surveyor', 'https://www.workbc.ca/sites/default/files/styles/hero_image/public/NTI5NzE_7xf1kHABIYoYubB1-2154-NOC.jpg?itok=KVKPvA5p'],
            ['Architect', 'https://storage.letudiant.fr/fme/job_card/153/architecte-fiche-metier-letudiant-230113031841.jpg'],
            ['Structural engineer', 'https://images.squarespace-cdn.com/content/v1/5ce308835deffa0001e9c364/1580906240699-IVBHM58DEGGYSHPX5TP3/Construction+concepts%2C+Engineer+and+Architect+working+at+Construction+Site+with+blueprint'],
        ];
        
        foreach ($services as $service) {

         $professional = new Service();
             $professional->setName($service[0]);
             $professional->setphoto($service[1]);
             $manager->persist($professional);
             if ($service[0] === 'Electrician') {
                $this->addReference('service_electrician', $professional);
            }
        }

        $manager->flush();
    }
}
