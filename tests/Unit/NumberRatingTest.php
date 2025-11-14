<?php

declare(strict_types=1);

namespace App\Tests\Unit;

use App\Model\Entity\NumberOfRatingPerValue;
use PHPUnit\Framework\TestCase;

final class NumberRatingTest extends TestCase
{
    public function testStartsAtZero(): void
    {
        $n = new NumberOfRatingPerValue();

        self::assertSame(0, $n->getNumberOfOne());
        self::assertSame(0, $n->getNumberOfTwo());
        self::assertSame(0, $n->getNumberOfThree());
        self::assertSame(0, $n->getNumberOfFour());
        self::assertSame(0, $n->getNumberOfFive());
    }

    public function testEachIncreaseIncrementsExactlyOnce(): void
    {
        $n = new NumberOfRatingPerValue();

        $n->increaseOne();
        $n->increaseTwo();
        $n->increaseThree();
        $n->increaseFour();
        $n->increaseFive();

        self::assertSame(1, $n->getNumberOfOne());
        self::assertSame(1, $n->getNumberOfTwo());
        self::assertSame(1, $n->getNumberOfThree());
        self::assertSame(1, $n->getNumberOfFour());
        self::assertSame(1, $n->getNumberOfFive());
    }

    /**
     * @dataProvider provideMultiIncrements
     */
    public function testMultipleIncrements(int $one, int $two, int $three, int $four, int $five): void
    {
        $n = new NumberOfRatingPerValue();

        for ($i = 0; $i < $one; $i++) {
            $n->increaseOne();
        }
        for ($i = 0; $i < $two; $i++) {
            $n->increaseTwo();
        }
        for ($i = 0; $i < $three; $i++) {
            $n->increaseThree();
        }
        for ($i = 0; $i < $four; $i++) {
            $n->increaseFour();
        }
        for ($i = 0; $i < $five; $i++) {
            $n->increaseFive();
        }

        self::assertSame($one,   $n->getNumberOfOne());
        self::assertSame($two,   $n->getNumberOfTwo());
        self::assertSame($three, $n->getNumberOfThree());
        self::assertSame($four,  $n->getNumberOfFour());
        self::assertSame($five,  $n->getNumberOfFive());
    }

    public static function provideMultiIncrements(): iterable
    {
        yield 'all zeros' => [0, 0, 0, 0, 0];
        yield 'simple mix' => [1, 2, 0, 3, 1];
        yield 'bigger counts' => [5, 4, 3, 2, 1];
    }

    public function testClearResetsAllCounters(): void
    {
        $n = new NumberOfRatingPerValue();

        // on incrémente un peu
        $n->increaseOne();
        $n->increaseTwo();
        $n->increaseThree();
        $n->increaseFour();
        $n->increaseFive();

        // puis on remet à zéro
        $n->clear();

        self::assertSame(0, $n->getNumberOfOne());
        self::assertSame(0, $n->getNumberOfTwo());
        self::assertSame(0, $n->getNumberOfThree());
        self::assertSame(0, $n->getNumberOfFour());
        self::assertSame(0, $n->getNumberOfFive());
    }
}
