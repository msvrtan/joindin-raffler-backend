<?php

namespace App\Tests\Entity;

use App\Entity\JoindInEvent;
use DateTime;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Entity\JoindInEvent
 * @group todo
 */
class JoindInEventTest extends TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var int */
    private $id;
    /** @var string */
    private $name;
    /** @var MockInterface|DateTime */
    private $date;
    /** @var JoindInEvent */
    private $joindInEvent;

    public function setUp(): void
    {
        $this->id           = 1;
        $this->name         = 'name';
        $this->date         = Mockery::mock(DateTime::class);
        $this->joindInEvent = new JoindInEvent($this->id, $this->name, $this->date);
    }

    public function testSetName(): void
    {
        self::markTestSkipped('Skipping');
    }

    public function testSetDate(): void
    {
        self::markTestSkipped('Skipping');
    }

    public function testGetId(): void
    {
        self::assertEquals($this->id, $this->joindInEvent->getId());
    }

    public function testGetName(): void
    {
        self::assertEquals($this->name, $this->joindInEvent->getName());
    }

    public function testGetDate(): void
    {
        self::assertEquals($this->date, $this->joindInEvent->getDate());
    }

    public function testGetTalks(): void
    {
        self::markTestSkipped('Skipping');
    }

    public function testAddTalk(): void
    {
        self::markTestSkipped('Skipping');
    }

    public function testJsonSerialize(): void
    {
        self::markTestSkipped('Skipping');
    }
}
