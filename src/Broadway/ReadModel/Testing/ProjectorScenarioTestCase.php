<?php

/*
 * This file is part of the broadway/broadway package.
 *
 * (c) Qandidate.com <opensource@qandidate.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Broadway\ReadModel\Testing;

use Broadway\Domain\DateTime;
use Broadway\ReadModel\InMemory\InMemoryRepository;
use Broadway\ReadModel\Projector;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Base test case that can be used to set up a projector scenario.
 */
abstract class ProjectorScenarioTestCase extends TestCase
{
    /**
     * @var Scenario
     */
    protected $scenario;
    private $dateTimeGenerator;

    public function setUp()
    {
        $this->dateTimeGenerator = new MockDateTimeGenerator(DateTime::now());
        $this->scenario          = $this->createScenario();
    }

    /**
     * @return Scenario
     */
    protected function createScenario()
    {
        $repository = new InMemoryRepository();

        return new Scenario($this, $repository, $this->createProjector($repository), $this->getDateTimeGenerator());
    }

    protected function getDateTimeGenerator()
    {
        return $this->dateTimeGenerator;
    }

    /**
     * @return Projector
     */
    abstract protected function createProjector(InMemoryRepository $repository);
}
