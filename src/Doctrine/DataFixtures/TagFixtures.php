<?php

namespace App\Doctrine\DataFixtures;

use App\Model\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use function array_fill_callback;

/**
 * @codeCoverageIgnore
 */

final class TagFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /** @var Tag[] $tags */
        $tags = [];

        for ($i = 0; $i < 25; $i++) {
            $tag = (new Tag())
                ->setName(sprintf('Tag %d', $i));

            $manager->persist($tag);
            $tags[] = $tag;
        }

        $manager->flush();
    }
}
