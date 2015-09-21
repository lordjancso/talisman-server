<?php

namespace AppBundle\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoggerServiceTest extends WebTestCase
{
    /**
     * @dataProvider positionAndRollProvider
     */
    public function testCreate($player, $action, $subjects)
    {
        $client = self::createClient();
        $container = $client->getContainer();

        $player = $container->get('doctrine.orm.entity_manager')->getReference('AppBundle:Player', $player);

        $log = $container->get('app.logger')->create($player, $action, $subjects);

        $this->assertEquals($log->getPlayer(), $player);
        $this->assertEquals($log->getAction(), $action);
        foreach ($log->getSubjects() as $subject) {
            if (is_object($subjects)) {
                $this->assertEquals($subject, $subjects->getId());
            } elseif (is_array($subjects)) {
                $this->assertTrue(in_array($subject, $subjects));
            } else {
                $this->assertEquals($subject, $subjects);
            }
        }
    }

    public function positionAndRollProvider()
    {
        $client = self::createClient();
        $container = $client->getContainer();

        $card = $container->get('doctrine.orm.entity_manager')->getReference('AppBundle:AdventureCard', 1);

        return array(
            array(
                'player' => 11,
                'action' => 'roll',
                'subjects' => 6,
            ),
            array(
                'player' => 11,
                'action' => 'roll',
                'subjects' => '80',
            ),
            array(
                'player' => 11,
                'action' => 'draw_adventure',
                'subjects' => array(8, 20),
            ),
            array(
                'player' => 11,
                'action' => 'draw_adventure',
                'subjects' => $card,
            ),
        );
    }
}
