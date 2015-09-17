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
        1 => array(2, 24),
        2 => array(1, 3),
        3 => array(2, 4),
        4 => array(3, 5),
        5 => array(4, 6),
        6 => array(5, 7),
        7 => array(6, 8),
        8 => array(7, 9),
        9 => array(8, 10),
        10 => array(9, 11),
        11 => array(10, 12),
        12 => array(11, 13),
        13 => array(12, 14),
        14 => array(13, 15),
        15 => array(14, 16),
        16 => array(15, 17),
        17 => array(16, 18, 36),
        18 => array(17, 19),
        19 => array(18, 20),
        20 => array(19, 21),
        21 => array(20, 22),
        22 => array(21, 23),
        23 => array(22, 24),
        24 => array(1, 23),
        25 => array(26, 40),
        26 => array(25, 27),
        27 => array(26, 28),
        28 => array(27, 29),
        29 => array(28, 30),
        30 => array(29, 31),
        31 => array(30, 32),
        32 => array(31, 33),
        33 => array(32, 34, 45),
        34 => array(33, 35),
        35 => array(34, 36),
        36 => array(17, 35, 37),
        37 => array(36, 38),
        38 => array(37, 39),
        39 => array(38, 40),
        40 => array(25, 39),
        41 => array(42, 48, 49),
        42 => array(41, 43),
        43 => array(42, 44),
        44 => array(43, 45),
        45 => array(33, 44, 46),
        46 => array(45, 47),
        47 => array(46, 48),
        48 => array(41, 47),
        49 => array(41),
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
     * Return a single field.
     *
     * @param $id
     *
     * @return array
     */
    public static function get($id)
    {
        return self::$graph[$id];
    }
}
