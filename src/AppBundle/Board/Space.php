<?php

namespace AppBundle\Board;

class Space
{
    /**
     * The fields of the board and its connections.
     *
     * @var array
     */
    private static $graph = array(
        1 => array(
            'connections' => array(2, 24),
            'name' => 'City',
            'description' => 'Visit the Enchantress - Roll 1 Die<br/>1, Turned into a Toad.<br/>2, Lose 1 Strength.<br/>3, Lose 1 Craft.<br/>4, Gain 1 Craft.<br/>5, Gain 1 Strength.<br/>6, Gain 1 Spell.<br/><br/>Visit the Doctor - Heal up to 2 lives at the cost of 1 gold each.<br/><br/>Visit the Alchemist - Discard any number of Objects you have and gain 1 gold for each.',
        ),
        2 => array(
            'connections' => array(1, 3),
            'draw' => 1,
            'name' => 'Fields',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        3 => array(
            'connections' => array(2, 4),
            'draw' => 1,
            'name' => 'Hills',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        4 => array(
            'connections' => array(3, 5),
            'draw' => 1,
            'name' => 'Plains',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        5 => array(
            'connections' => array(4, 6),
            'draw' => 1,
            'name' => 'Woods',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        6 => array(
            'connections' => array(5, 7),
            'draw' => 1,
            'name' => 'Plains',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        7 => array(
            'connections' => array(6, 8),
            'name' => 'Tavern',
            'description' => 'ROLL 1 DIE<br/>1, Get drunk and collapse in a corner; miss 1 turn.<br/>2, Get tipsy and fight a farmer with Strength 3.<br/>3, Gamble and lose 1 gold.<br/>4, Gamble and win 1 gold.<br/>5, A wizard offers to teleport you to any other space in this Region as you next move.<br/>6, A boatman offers to ferry you to the Temple as your next move.',
        ),
        8 => array(
            'connections' => array(7, 9),
            'draw' => 1,
            'name' => 'Fields',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        9 => array(
            'connections' => array(8, 10),
            'draw' => 2,
            'name' => 'Ruins',
            'description' => 'If there are any Cards already in this space, draw only enough to take the total to 2 Cards.',
        ),
        10 => array(
            'connections' => array(9, 11),
            'draw' => 1,
            'name' => 'Plains',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        11 => array(
            'connections' => array(10, 12),
            'name' => 'Forest',
            'description' => 'ROLL 1 DIE<br/><br/>1, Attacked by a brigand with Strength 4.<br/>2-3, Lost; lose your next turn.<br/>4-5, Safe.<br/>6, A ranger guides you out, gain 1 Craft.',
        ),
        12 => array(
            'connections' => array(11, 13),
            'draw' => 1,
            'name' => 'Fields',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        13 => array(
            'connections' => array(12, 14),
            'name' => 'Village',
            'description' => 'Visit the Blacksmith - Purchase any, if available -<br/>Helmet - 2 gold<br/>Sword - 2 gold<br/>Axe - 3 gold<br/>Shield - 3 gold<br/>Armour - 4 gold<br/><br/>Visit the Healer - heal up to your life value at the cost of 1 gold each.<br/><br/>Visit the Mystic - Roll 1 Die;<br/>1, Become evil.<br/>2-3, Ignored.<br/>4, Become good.<br/>5, Gain 1 Craft.<br/>6, Gain 1 Spell.',
        ),
        14 => array(
            'connections' => array(13, 15),
            'draw' => 1,
            'name' => 'Fields',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        15 => array(
            'connections' => array(14, 16),
            'name' => 'Graveyard',
            'description' => 'BASED ON ALIGNMENT<br/>Good: Lose one life.<br/>Neutral: Replenish fate up to your fate value at the cost of one gold each.<br/>Evil: Either replenish fate up to your fate value for free, or pray by rolling one die. 1-4, Ignored. 5, Gain 1 fate. 6, Gain 1 Spell.',
        ),
        16 => array(
            'connections' => array(15, 17),
            'draw' => 1,
            'name' => 'Woods',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        17 => array(
            'connections' => array(16, 18, 36),
            'name' => 'Sentinel',
            'description' => 'Do not draw a Card if there is already one in this space.<br/><br/>If you are crossing to the Middle Region, do not draw a card. Instead, you must first defeat the Sentinel with Strength 9. Do not fight the Sentinel when crossing from the Middle Region.',
        ),
        18 => array(
            'connections' => array(17, 19),
            'draw' => 1,
            'name' => 'Hills',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        19 => array(
            'connections' => array(18, 20),
            'name' => 'Chapel',
            'description' => 'BASED ON ALIGNMENT<br/>Evil: Lose on life.<br/>Neutral: Heal up to your life value at the cost of one gold each.<br/>Good: Either heal up to your life value for free, or pray by rolling 1 die: 1-4, Ignored. 5, Gain 1 life. 6, Gain 1 Spell.',
        ),
        20 => array(
            'connections' => array(19, 21),
            'draw' => 1,
            'name' => 'Fields',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        21 => array(
            'connections' => array(20, 22),
            'name' => 'Crags',
            'description' => 'ROLL 1 DIE<br/><br/>1, Attacked by a Spirit with Craft 4.<br/>2-3, Lost; lose your next turn.<br/>4-5, Safe; no effect.<br/>6, A barbarian leads you out; gain 1 Strength',
        ),
        22 => array(
            'connections' => array(21, 23),
            'draw' => 1,
            'name' => 'Plains',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        23 => array(
            'connections' => array(22, 24),
            'draw' => 1,
            'name' => 'Woods',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        24 => array(
            'connections' => array(1, 23),
            'draw' => 1,
            'name' => 'Fields',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        25 => array(
            'connections' => array(26, 40),
            'name' => 'Warlock\'s Cave',
            'description' => 'YOU MAY ROLL 1 DIE TO ACCEPT A QUEST<br/>1, Take 1 life from another character.<br/>2, Kill 1 Enemy.<br/>3, Discard 1 Follower.<br/>4, Discard 1 Magic Object.<br/>5, Discard 3 gold.<br/>6, Discard 2 gold.<br/><br/>When you complete the quest, the Warlock immediately teleports you back here and gives you a Talisman, if available, as your reward.',
        ),
        26 => array(
            'connections' => array(25, 27),
            'draw' => 1,
            'name' => 'Desert',
            'description' => 'Lose 1 Life and draw 1 Card.',
        ),
        27 => array(
            'connections' => array(26, 28),
            'draw' => 2,
            'name' => 'Oasis',
            'description' => 'If there are any Cards already in this space, draw only enough to take the total to 2 Cards.',
        ),
        28 => array(
            'connections' => array(27, 29),
            'draw' => 1,
            'name' => 'Desert',
            'description' => 'Lose 1 Life and draw 1 Card.',
        ),
        29 => array(
            'connections' => array(28, 30),
            'name' => 'Temple',
            'description' => 'PRAY: ROLL 2 DICE<br/><br/>2, Lose 2 lives.<br/>3, Lose 1 life.<br/>4, Lose 1 Follower.<br/>5, Enslaved - stay here until you roll a 4, 5 or 6 for your move.<br/>6, Gain 1 Strength.<br/>7, Gain 1 Craft.<br/>8-9, Gain 1 Spell.<br/>10, Gain a Talisman.<br/>11, Gain 2 fate.<br/>12, Gain 2 lives.',
        ),
        30 => array(
            'connections' => array(29, 31),
            'draw' => 1,
            'name' => 'Woods',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        31 => array(
            'connections' => array(30, 32),
            'draw' => 1,
            'name' => 'Runes',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        32 => array(
            'connections' => array(31, 33),
            'name' => 'Castle',
            'description' => 'ROYAL DOCTOR<br/><br/>Heal up to your life value at the cost of one gold each.<br/><br/>If you are accompanied by the Prince or Princess, he will heal you for free.',
        ),
        33 => array(
            'connections' => array(32, 34, 45),
            'draw' => 1,
            'name' => 'Portal of Power',
            'description' => 'Do not draw a card if there is already one in this space. If you are crossing to the Plain of Peril, do not draw a card. Instead, you must first use Craft to pick the lock or Strength to force it. Choose which ability you are using and roll two dice. If the total is equal to or less than your chosen ability, move to the Plain of Peril. If it is higher, remain here and lose one from that ability.',
        ),
        34 => array(
            'connections' => array(33, 35),
            'name' => 'Black Knight',
            'description' => 'Either pay one gold or lose one life.',
        ),
        35 => array(
            'connections' => array(34, 36),
            'draw' => 3,
            'name' => 'Hidden Valley',
            'description' => 'If there are any Cards already in this space, draw only enough to take the total to 3 Cards.',
        ),
        36 => array(
            'connections' => array(17, 35, 37),
            'draw' => 1,
            'name' => 'Hills',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        37 => array(
            'connections' => array(36, 38),
            'draw' => 1,
            'name' => 'Cursed Glade',
            'description' => 'Do not draw a Card if there is already one in this space.<br/><br/>Strength and Craft derived from Objects and Magic Objects do not count on this space, nor may you use Magic Objects or cast Spells.',
        ),
        38 => array(
            'connections' => array(37, 39),
            'draw' => 1,
            'name' => 'Runes',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        39 => array(
            'connections' => array(38, 40),
            'name' => 'Chasm',
            'description' => 'Roll one die for yourself, and one for each of your Followers. If a 1 or 2 is rolled for yourself, lose 1 life. If a 1 or 2 is rolled for a Follower, it is killed.',
        ),
        40 => array(
            'connections' => array(25, 39),
            'draw' => 1,
            'name' => 'Runes',
            'description' => 'Do not draw a Card if there is already one in this space.',
        ),
        41 => array(
            'connections' => array(42, 48, 49),
            'name' => 'Valley of Fire',
            'description' => 'YOU MUST HAVE A TALISMAN TO ENTER<br/><br/>You can only enter if you have a Talisman. If you do not have one, you must turn back. The Crown of Command can only be reached from this space.',
        ),
        42 => array(
            'connections' => array(41, 43),
            'name' => 'Werewolf Den',
            'description' => 'Fight The Werewolf<br/>Roll two dice for the Werewolf\'s Strength, then fight it. If you lose, lose one life and you fight the same Werewolf again on your next turn. You cannot move on until you have defeated the Werewolf.',
        ),
        43 => array(
            'connections' => array(42, 44),
            'name' => 'Death',
            'description' => 'Dice With Death<br/>Roll two dice for yourself and then two dice for Death. If this scores are equal: Dice with Death again on your next turn. If your score is lower: Lose one life and Dice with Death again on your next turn. If you score is higher: You may move on your next turn.',
        ),
        44 => array(
            'connections' => array(43, 45),
            'name' => 'Crypt',
            'description' => 'Roll 3 Dice<br/><br/>Subtract your Strength from the total and move directly to:<br/>0, Crypt<br/>1, Plain of Peril<br/>2-3, Portal of Power<br/>4-5, Warlock\'s Cave<br/>6+, City',
        ),
        45 => array(
            'connections' => array(33, 44, 46),
            'name' => 'Plain of Peril',
            'description' => 'Stop Here<br/><br/>Move only one space per turn.',
        ),
        46 => array(
            'connections' => array(45, 47),
            'name' => 'Mines',
            'description' => 'Roll 3 Dice<br/><br/>Subtract your Craft from the total and move directly to:<br/>0, Mines<br/>1, Plain of Peril<br/>2-3, Portal of Power<br/>4-5, Warlock\'s Cave<br/>6+, Tavern',
        ),
        47 => array(
            'connections' => array(46, 48),
            'name' => 'Vampire\'s Tower',
            'description' => 'Suffer Blood Loss<br/><br/>Roll one die to determine how many Lives the Vampire takes.<br/><br/>You may discard any number of Followers to avoid this loss of life.<br/><br/>Each Follower you discard prevents the loss of one life.<br/>1-2, Lose 1 Life<br/>3-4, Lose 2 Lives<br/>5-6, Lose 3 Lives',
        ),
        48 => array(
            'connections' => array(41, 47),
            'name' => 'Pits',
            'description' => 'Fight the Pitfiends<br/><br/>Roll one die and fight that may Pitfiends with Strength 4 each one-by-one until you either lose a life of defeat all of the Pitfiends. You may move on the turn after all are defeated.',
        ),
        49 => array(
            'connections' => array(41),
            'name' => 'Crown of Command',
            'description' => 'The Current Ending is:<br/><br/>Crown of Command<br/><br/>Click the Card for further information.',
        ),
    );

    /**
     * Return all fields.
     *
     * @return array
     */
    public static function all()
    {
        return self::$graph;
    }

    /**
     * Return a single property of a single field.
     *
     * @param $position
     * @param $name
     *
     * @return mixed
     */
    public static function get($position, $name)
    {
        if (isset(self::$graph[$position][$name])) {
            return self::$graph[$position][$name];
        }

        return false;
    }
}
