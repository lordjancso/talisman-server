<?php

namespace AppBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatorTest extends WebTestCase
{
    /**
     * @dataProvider positionAndRollProvider
     */
    public function testGetPossibleDestinationsByRoll($position, $roll, $result)
    {
        $client = self::createClient();
        $container = $client->getContainer();

        $destinations = $container->get('app.move')->getPossibleDestinationsByRoll($position, $roll);

        $this->assertEquals(count($result), count($destinations));
        foreach ($destinations as $destination) {
            $this->assertTrue(in_array($destination, $result));
        }
    }

    public function positionAndRollProvider()
    {
        return array(
            array(
                'position' => 14,
                'roll' => 6,
                'result' => array(8, 20, 34, 38)
            ),
            array(
                'position' => 1,
                'roll' => 1,
                'result' => array(2, 24)
            ),
            array(
                'position' => 38,
                'roll' => 5,
                'result' => array(27, 19, 15, 33)
            )
        );
    }
}
