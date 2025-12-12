<?php

declare(strict_types=1);

namespace App\Tests\Unit\Model\Entity;

use App\Model\Entity\NumberOfRatingPerValue;
use App\Model\Entity\VideoGame;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\File\File;

final class VideoGameTest extends TestCase
{
    public function testConstructShouldInitializeCollections(): void
    {
        $videoGame = new VideoGame();

        self::assertCount(0, $videoGame->getReviews());
        self::assertInstanceOf(NumberOfRatingPerValue::class, $videoGame->getNumberOfRatingsPerValue());
    }

    public function testGetAndSetId(): void
    {
        $videoGame = new VideoGame();

        self::assertNull($videoGame->getId());
    }

    public function testGetAndSetTitle(): void
    {
        $videoGame = new VideoGame();
        $title = 'The Legend of Zelda';

        $videoGame->setTitle($title);

        self::assertSame($title, $videoGame->getTitle());
    }

    public function testGetAndSetSlug(): void
    {
        $videoGame = new VideoGame();
        $slug = 'the-legend-of-zelda';

        $videoGame->setSlug($slug);

        self::assertSame($slug, $videoGame->getSlug());
    }

    public function testGetAndSetImageFile(): void
    {
        $videoGame = new VideoGame();
        $file = $this->createMock(File::class);

        $videoGame->setImageFile($file);

        self::assertSame($file, $videoGame->getImageFile());
    }

    public function testGetImageFileReturnsNullByDefault(): void
    {
        $videoGame = new VideoGame();

        self::assertNull($videoGame->getImageFile());
    }

    public function testGetAndSetImageName(): void
    {
        $videoGame = new VideoGame();
        $imageName = 'zelda-cover.jpg';

        $videoGame->setImageName($imageName);

        self::assertSame($imageName, $videoGame->getImageName());
    }

    public function testGetAndSetImageSize(): void
    {
        $videoGame = new VideoGame();
        $imageSize = 1024000;

        $videoGame->setImageSize($imageSize);

        self::assertSame($imageSize, $videoGame->getImageSize());
    }

    public function testGetImageSizeReturnsNullByDefault(): void
    {
        $videoGame = new VideoGame();

        self::assertNull($videoGame->getImageSize());
    }

    public function testGetAndSetDescription(): void
    {
        $videoGame = new VideoGame();
        $description = 'An epic adventure game';

        $videoGame->setDescription($description);

        self::assertSame($description, $videoGame->getDescription());
    }

    public function testGetAndSetReleaseDate(): void
    {
        $videoGame = new VideoGame();
        $releaseDate = new \DateTimeImmutable('2023-05-12');

        $videoGame->setReleaseDate($releaseDate);

        self::assertSame($releaseDate, $videoGame->getReleaseDate());
    }


    public function testGetUpdatedAt(): void
    {
        $videoGame = new VideoGame();

        self::assertNull($videoGame->getUpdatedAt());
    }
}
