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
        ),
        2 => array(
            'connections' => array(1, 3),
            'draw' => 1,
            'name' => 'Fields',
        ),
        3 => array(
            'connections' => array(2, 4),
            'draw' => 1,
            'name' => 'Hills',
        ),
        4 => array(
            'connections' => array(3, 5),
            'draw' => 1,
            'name' => 'Plains',
        ),
        5 => array(
            'connections' => array(4, 6),
            'draw' => 1,
            'name' => 'Woods',
        ),
        6 => array(
            'connections' => array(5, 7),
            'draw' => 1,
            'name' => 'Plains',
        ),
        7 => array(
            'connections' => array(6, 8),
            'name' => 'Tavern',
        ),
        8 => array(
            'connections' => array(7, 9),
            'draw' => 1,
            'name' => 'Fields',
        ),
        9 => array(
            'connections' => array(8, 10),
            'draw' => 2,
            'name' => 'Ruins',
        ),
        10 => array(
            'connections' => array(9, 11),
            'draw' => 1,
            'name' => 'Plains',
        ),
        11 => array(
            'connections' => array(10, 12),
            'name' => 'Forest',
        ),
        12 => array(
            'connections' => array(11, 13),
            'draw' => 1,
            'name' => 'Fields',
        ),
        13 => array(
            'connections' => array(12, 14),
            'name' => 'Village',
        ),
        14 => array(
            'connections' => array(13, 15),
            'draw' => 1,
            'name' => 'Fields',
        ),
        15 => array(
            'connections' => array(14, 16),
            'name' => 'Graveyard',
        ),
        16 => array(
            'connections' => array(15, 17),
            'draw' => 1,
            'name' => 'Woods',
        ),
        17 => array(
            'connections' => array(16, 18, 36),
            'name' => 'Sentinel',
        ),
        18 => array(
            'connections' => array(17, 19),
            'draw' => 1,
            'name' => 'Hills',
        ),
        19 => array(
            'connections' => array(18, 20),
            'name' => 'Chapel',
        ),
        20 => array(
            'connections' => array(19, 21),
            'draw' => 1,
            'name' => 'Fields',
        ),
        21 => array(
            'connections' => array(20, 22),
            'name' => 'Crags',
        ),
        22 => array(
            'connections' => array(21, 23),
            'draw' => 1,
            'name' => 'Plains',
        ),
        23 => array(
            'connections' => array(22, 24),
            'draw' => 1,
            'name' => 'Woods',
        ),
        24 => array(
            'connections' => array(1, 23),
            'draw' => 1,
            'name' => 'Fields',
        ),
        25 => array(
            'connections' => array(26, 40),
            'name' => 'Warlock\'s Cave',
        ),
        26 => array(
            'connections' => array(25, 27),
        ),
        27 => array(
            'connections' => array(26, 28),
        ),
        28 => array(
            'connections' => array(27, 29),
        ),
        29 => array(
            'connections' => array(28, 30),
        ),
        30 => array(
            'connections' => array(29, 31),
        ),
        31 => array(
            'connections' => array(30, 32),
        ),
        32 => array(
            'connections' => array(31, 33),
        ),
        33 => array(
            'connections' => array(32, 34, 45),
        ),
        34 => array(
            'connections' => array(33, 35),
        ),
        35 => array(
            'connections' => array(34, 36),
        ),
        36 => array(
            'connections' => array(17, 35, 37),
        ),
        37 => array(
            'connections' => array(36, 38),
        ),
        38 => array(
            'connections' => array(37, 39),
        ),
        39 => array(
            'connections' => array(38, 40),
        ),
        40 => array(
            'connections' => array(25, 39),
        ),
        41 => array(
            'connections' => array(42, 48, 49),
        ),
        42 => array(
            'connections' => array(41, 43),
        ),
        43 => array(
            'connections' => array(42, 44),
        ),
        44 => array(
            'connections' => array(43, 45),
        ),
        45 => array(
            'connections' => array(33, 44, 46),
        ),
        46 => array(
            'connections' => array(45, 47),
        ),
        47 => array(
            'connections' => array(46, 48),
        ),
        48 => array(
            'connections' => array(41, 47),
        ),
        49 => array(
            'connections' => array(41),
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
     * @param $id
     * @param $name
     *
     * @return mixed
     */
    public static function get($id, $name)
    {
        if (isset(self::$graph[$id][$name])) {
            return self::$graph[$id][$name];
        }

        return false;
    }
}
