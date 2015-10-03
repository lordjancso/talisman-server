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
            'description' => 'Visit the Enchantress - Roll 1 Die\n1, Turned into a Toad.\n2, Lose 1 Strength.\n3, Lose 1 Craft.\n4, Gain 1 Craft.\n5, Gain 1 Strength.\n6, Gain 1 Spell.\n\nVisit the Doctor - Heal up to 2 lives at the cost of 1 gold each.\n\nVisit the Alchemist - Discard any number of Objects you have and gain 1 gold for each.',
        ),
        2 => array(
            'connections' => array(1, 3),
            'draw' => 1,
            'name' => 'Fields',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        3 => array(
            'connections' => array(2, 4),
            'draw' => 1,
            'name' => 'Hills',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        4 => array(
            'connections' => array(3, 5),
            'draw' => 1,
            'name' => 'Plains',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        5 => array(
            'connections' => array(4, 6),
            'draw' => 1,
            'name' => 'Woods',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        6 => array(
            'connections' => array(5, 7),
            'draw' => 1,
            'name' => 'Plains',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        7 => array(
            'connections' => array(6, 8),
            'name' => 'Tavern',
            'description' => 'ROLL 1 DIE\n1, Get drunk and collapse in a corner; miss 1 turn.\n2, Get tipsy and fight a farmer with Strength 3.\n3, Gamble and lose 1 gold.\n4, Gamble and win 1 gold.\n5, A wizard offers to teleport you to any other space in this Region as you next move.\n6, A boatman offers to ferry you to the Temple as your next move.',
        ),
        8 => array(
            'connections' => array(7, 9),
            'draw' => 1,
            'name' => 'Fields',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        9 => array(
            'connections' => array(8, 10),
            'draw' => 2,
            'name' => 'Ruins',
            'description' => 'Draw 2 Cards.\n\nIf there are any Cards already in this space, draw only enough to take the total to 2 Cards.',
        ),
        10 => array(
            'connections' => array(9, 11),
            'draw' => 1,
            'name' => 'Plains',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        11 => array(
            'connections' => array(10, 12),
            'name' => 'Forest',
            'description' => 'ROLL 1 DIE\n\n1, Attacked by a brigand with Strength 4.\n2-3, Lost; lose your next turn.\n4-5, Safe.\n6, A ranger guides you out, gain 1 Craft.',
        ),
        12 => array(
            'connections' => array(11, 13),
            'draw' => 1,
            'name' => 'Fields',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        13 => array(
            'connections' => array(12, 14),
            'name' => 'Village',
            'description' => 'Visit the Blacksmith - Purchase any, if available -\nHelmet - 2 gold\nSword - 2 gold\nAxe - 3 gold\nShield - 3 gold\nArmour - 4 gold\n\nVisit the Healer - heal up to your life value at the cost of 1 gold each.\n\nVisit the Mystic - Roll 1 Die;\n1, Become evil.\n2-3, Ignored.\n4, Become good.\n5, Gain 1 Craft.\n6, Gain 1 Spell.',
        ),
        14 => array(
            'connections' => array(13, 15),
            'draw' => 1,
            'name' => 'Fields',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        15 => array(
            'connections' => array(14, 16),
            'name' => 'Graveyard',
            'description' => 'BASED ON ALIGNMENT\nGood: Lose one life.\nNeutral: Replenish fate up to your fate value at the cost of one gold each.\nEvil: Either replenish fate up to your fate value for free, or pray by rolling one die. 1-4, Ignored. 5, Gain 1 fate. 6, Gain 1 Spell.',
        ),
        16 => array(
            'connections' => array(15, 17),
            'draw' => 1,
            'name' => 'Woods',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        17 => array(
            'connections' => array(16, 18, 36),
            'name' => 'Sentinel',
            'description' => 'Do not draw a Card if there is already one in this space.\n\nIf you are crossing to the Middle Region, do not draw a card. Instead, you must first defeat the Sentinel with Strength 9. Do not fight the Sentinel when crossing from the Middle Region.',
        ),
        18 => array(
            'connections' => array(17, 19),
            'draw' => 1,
            'name' => 'Hills',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        19 => array(
            'connections' => array(18, 20),
            'name' => 'Chapel',
            'description' => 'BASED ON ALIGNMENT\nEvil: Lose on life.\nNeutral: Heal up to your life value at the cost of one gold each.\nGood: Either heal up to your life value for free, or pray by rolling 1 die: 1-4, Ignored. 5, Gain 1 life. 6, Gain 1 Spell.',
        ),
        20 => array(
            'connections' => array(19, 21),
            'draw' => 1,
            'name' => 'Fields',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        21 => array(
            'connections' => array(20, 22),
            'name' => 'Crags',
            'description' => 'ROLL 1 DIE\n\n1, Attacked by a Spirit with Craft 4.\n2-3, Lost; lose your next turn.\n4-5, Safe; no effect.\n6, A barbarian leads you out; gain 1 Strength',
        ),
        22 => array(
            'connections' => array(21, 23),
            'draw' => 1,
            'name' => 'Plains',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        23 => array(
            'connections' => array(22, 24),
            'draw' => 1,
            'name' => 'Woods',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        24 => array(
            'connections' => array(1, 23),
            'draw' => 1,
            'name' => 'Fields',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        25 => array(
            'connections' => array(26, 40),
            'name' => 'Warlock\'s Cave',
            'description' => 'YOU MAY ROLL 1 DIE TO ACCEPT A QUEST\n1, Take 1 life from another character.\n2, Kill 1 Enemy.\n3, Discard 1 Follower.\n4, Discard 1 Magic Object.\n5, Discard 3 gold.\n6, Discard 2 gold.\n\nWhen you complete the quest, the Warlock immediately teleports you back here and gives you a Talisman, if available, as your reward.',
        ),
        26 => array(
            'connections' => array(25, 27),
            'draw' => 1,
            'name' => 'Desert',
            'description' => 'LOSE 1 LIFE THEN DRAW 1 CARD.',
        ),
        27 => array(
            'connections' => array(26, 28),
            'draw' => 2,
            'name' => 'Oasis',
            'description' => 'Draw 2 Cards.\n\nIf there are any Cards already in this space, draw only enough to take the total to 2 Cards.',
        ),
        28 => array(
            'connections' => array(27, 29),
            'draw' => 1,
            'name' => 'Desert',
            'description' => 'LOSE 1 LIFE THEN DRAW 1 CARD.',
        ),
        29 => array(
            'connections' => array(28, 30),
            'name' => 'Temple',
            'description' => 'PRAY: ROLL 2 DICE\n\n2, Lose 2 lives.\n3, Lose 1 life.\n4, Lose 1 Follower.\n5, Enslaved - stay here until you roll a 4, 5 or 6 for your move.\n6, Gain 1 Strength.\n7, Gain 1 Craft.\n8-9, Gain 1 Spell.\n10, Gain a Talisman.\n11, Gain 2 fate.\n12, Gain 2 lives.',
        ),
        30 => array(
            'connections' => array(29, 31),
            'draw' => 1,
            'name' => 'Woods',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        31 => array(
            'connections' => array(30, 32),
            'draw' => 1,
            'name' => 'Runes',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.\n\nAny creatures that you fight here add 2 to their attack rolls.',
        ),
        32 => array(
            'connections' => array(31, 33),
            'name' => 'Castle',
            'description' => 'ROYAL DOCTOR\n\nHeal up to your life value at the cost of one gold each.\n\nIf you are accompanied by the Prince or Princess, he will heal you for free.',
        ),
        33 => array(
            'connections' => array(32, 34, 45),
            'draw' => 1,
            'name' => 'Portal of Power',
            'description' => 'Draw 1 Card.\n\nDo not draw a card if there is already one in this space. If you are crossing to the Plain of Peril, do not draw a card. Instead, you must first use Craft to pick the lock or Strength to force it. Choose which ability you are using and roll two dice. If the total is equal to or less than your chosen ability, move to the Plain of Peril. If it is higher, remain here and lose one from that ability.',
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
            'description' => 'Draw 3 Cards.\n\nIf there are any Cards already in this space, draw only enough to take the total to 3 Cards.',
        ),
        36 => array(
            'connections' => array(17, 35, 37),
            'draw' => 1,
            'name' => 'Hills',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.',
        ),
        37 => array(
            'connections' => array(36, 38),
            'draw' => 1,
            'name' => 'Cursed Glade',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.\n\nStrength and Craft derived from Objects and Magic Objects do not count on this space, nor may you use Magic Objects or cast Spells.',
        ),
        38 => array(
            'connections' => array(37, 39),
            'draw' => 1,
            'name' => 'Runes',
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.\n\nAny creatures that you fight here add 2 to their attack rolls.',
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
            'description' => 'Draw 1 Card.\n\nDo not draw a Card if there is already one in this space.\n\nAny creatures that you fight here add 2 to their attack rolls.',
        ),
        41 => array(
            'connections' => array(42, 48, 49),
            'name' => 'Valley of Fire',
            'description' => 'YOU MUST HAVE A TALISMAN TO ENTER\n\nYou can only enter if you have a Talisman. If you do not have one, you must turn back. The Crown of Command can only be reached from this space.',
        ),
        42 => array(
            'connections' => array(41, 43),
            'name' => 'Werewolf Den',
            'description' => 'Fight The Werewolf\nRoll two dice for the Werewolf\'s Strength, then fight it. If you lose, lose one life and you fight the same Werewolf again on your next turn. You cannot move on until you have defeated the Werewolf.',
        ),
        43 => array(
            'connections' => array(42, 44),
            'name' => 'Death',
            'description' => 'Dice With Death\nRoll two dice for yourself and then two dice for Death. If this scores are equal: Dice with Death again on your next turn. If your score is lower: Lose one life and Dice with Death again on your next turn. If you score is higher: You may move on your next turn.',
        ),
        44 => array(
            'connections' => array(43, 45),
            'name' => 'Crypt',
            'description' => 'Roll 3 Dice\n\nSubtract your Strength from the total and move directly to:\n0, Crypt\n1, Plain of Peril\n2-3, Portal of Power\n4-5, Warlock\'s Cave\n6+, City',
        ),
        45 => array(
            'connections' => array(33, 44, 46),
            'name' => 'Plain of Peril',
            'description' => 'Stop Here\n\nMove only one space per turn.',
        ),
        46 => array(
            'connections' => array(45, 47),
            'name' => 'Mines',
            'description' => 'Roll 3 Dice\n\nSubtract your Craft from the total and move directly to:\n0, Mines\n1, Plain of Peril\n2-3, Portal of Power\n4-5, Warlock\'s Cave\n6+, Tavern',
        ),
        47 => array(
            'connections' => array(46, 48),
            'name' => 'Vampire\'s Tower',
            'description' => 'Suffer Blood Loss\n\nRoll one die to determine how many Lives the Vampire takes.\n\nYou may discard any number of Followers to avoid this loss of life.\n\nEach Follower you discard prevents the loss of one life.\n1-2, Lose 1 Life\n3-4, Lose 2 Lives\n5-6, Lose 3 Lives',
        ),
        48 => array(
            'connections' => array(41, 47),
            'name' => 'Pits',
            'description' => 'Fight the Pitfiends\n\nRoll one die and fight that may Pitfiends with Strength 4 each one-by-one until you either lose a life of defeat all of the Pitfiends. You may move on the turn after all are defeated.',
        ),
        49 => array(
            'connections' => array(41),
            'name' => 'Crown of Command',
            'description' => 'The Current Ending is:\n\nCrown of Command\n\nClick the Card for further information.',
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
