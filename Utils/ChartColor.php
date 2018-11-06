<?php
/**
 * Created by PhpStorm.
 * User: Albert
 * Date: 3/8/2017
 * Time: 16:25
 */

namespace fados\ChartjsBundle\Utils;


class ChartColor implements \Countable
{
    const maroon = '128,0,0';
    const dark_red = '139,0,0';
    const brown = '165,42,42';
    const firebrick = '178,34,34';
    const crimson = '220,20,60';
    const red = '255,0,0';
    const tomato = '255,99,71';
    const coral = '255,127,80';
    const indian_red = '205,92,92';
    const light_coral = '240,128,128';
    const dark_salmon = '233,150,122';
    const salmon = '250,128,114';
    const light_salmon = '255,160,122';
    const orange_red = '255,69,0';
    const dark_orange = '255,140,0';
    const orange = '255,165,0';
    const gold = '255,215,0';
    const dark_golden_rod = '184,134,11';
    const golden_rod = '218,165,32';
    const pale_golden_rod = '238,232,170';
    const dark_khaki = '189,183,107';
    const khaki = '240,230,140';
    const olive = '128,128,0';
    const yellow = '255,255,0';
    const yellow_green = '154,205,50';
    const dark_olive_green = '85,107,47';
    const olive_drab = '107,142,35';
    const lawn_green = '124,252,0';
    const chart_reuse = '127,255,0';
    const green_yellow = '173,255,47';
    const dark_green = '0,100,0';
    const green = '0,128,0';
    const forest_green = '34,139,34';
    const lime = '0,255,0';
    const lime_green = '50,205,50';
    const light_green = '144,238,144';
    const pale_green = '152,251,152';
    const dark_sea_green = '143,188,143';
    const medium_spring_green = '0,250,154';
    const spring_green = '0,255,127';
    const sea_green = '46,139,87';
    const medium_aqua_marine = '102,205,170';
    const medium_sea_green = '60,179,113';
    const light_sea_green = '32,178,170';
    const dark_slate_gray = '47,79,79';
    const teal = '0,128,128';
    const dark_cyan = '0,139,139';
    const aqua = '0,255,255';
    const cyan = '0,255,255';
    const light_cyan = '224,255,255';
    const dark_turquoise = '0,206,209';
    const turquoise = '64,224,208';
    const medium_turquoise = '72,209,204';
    const pale_turquoise = '175,238,238';
    const aqua_marine = '127,255,212';
    const powder_blue = '176,224,230';
    const cadet_blue = '95,158,160';
    const steel_blue = '70,130,180';
    const corn_flower_blue = '100,149,237';
    const deep_sky_blue = '0,191,255';
    const dodger_blue = '30,144,255';
    const light_blue = '173,216,230';
    const sky_blue = '135,206,235';
    const light_sky_blue = '135,206,250';
    const midnight_blue = '25,25,112';
    const navy = '0,0,128';
    const dark_blue = '0,0,139';
    const medium_blue = '0,0,205';
    const blue = '0,0,255';
    const royal_blue = '65,105,225';
    const blue_violet = '138,43,226';
    const indigo = '75,0,130';
    const dark_slate_blue = '72,61,139';
    const slate_blue = '106,90,205';
    const medium_slate_blue = '123,104,238';
    const medium_purple = '147,112,219';
    const dark_magenta = '139,0,139';
    const dark_violet = '148,0,211';
    const dark_orchid = '153,50,204';
    const medium_orchid = '186,85,211';
    const purple = '128,0,128';
    const thistle = '216,191,216';
    const plum = '221,160,221';
    const violet = '238,130,238';
    const magenta_ = '255,0,255';
    const orchid = '218,112,214';
    const medium_violet_red = '199,21,133';
    const pale_violet_red = '219,112,147';
    const deep_pink = '255,20,147';
    const hot_pink = '255,105,180';
    const light_pink = '255,182,193';
    const pink = '255,192,203';
    const antique_white = '250,235,215';
    const beige = '245,245,220';
    const bisque = '255,228,196';
    const blanched_almond = '255,235,205';
    const wheat = '245,222,179';
    const corn_silk = '255,248,220';
    const lemon_chiffon = '255,250,205';
    const light_golden_rod_yellow = '250,250,210';
    const light_yellow = '255,255,224';
    const saddle_brown = '139,69,19';
    const sienna = '160,82,45';
    const chocolate = '210,105,30';
    const peru = '205,133,63';
    const sandy_brown = '244,164,96';
    const burly_wood = '222,184,135';
    const tan = '210,180,140';
    const rosy_brown = '188,143,143';
    const moccasin = '255,228,181';
    const navajo_white = '255,222,173';
    const peach_puff = '255,218,185';
    const misty_rose = '255,228,225';
    const lavender_blush = '255,240,245';
    const linen = '250,240,230';
    const old_lace = '253,245,230';
    const papaya_whip = '255,239,213';
    const sea_shell = '255,245,238';
    const mint_cream = '245,255,250';
    const slate_gray = '112,128,144';
    const light_slate_gray = '119,136,153';
    const light_steel_blue = '176,196,222';
    const lavender = '230,230,250';
    const floral_white = '255,250,240';
    const alice_blue = '240,248,255';
    const ghost_white = '248,248,255';
    const honeydew = '240,255,240';
    const ivory = '255,255,240';
    const azure = '240,255,255';
    const snow = '255,250,250';
    const black = '0,0,0';
    const dim_gray = '105,105,105';
    const gray = '128,128,128';
    const dark_grey = '169,169,169';
    const silver = '192,192,192';
    const light_gray = '211,211,211';
    const gainsboro = '220,220,220';
    const white_smoke = '245,245,245';
    const white = '255,255,255';

    private static $colors = array(
        ChartColor::maroon,
        ChartColor::dark_red,
        ChartColor::brown,
        ChartColor::firebrick,
        ChartColor::crimson,
        ChartColor::red,
        ChartColor::tomato,
        ChartColor::coral,
        ChartColor::indian_red,
        ChartColor::light_coral,
        ChartColor::dark_salmon,
        ChartColor::salmon,
        ChartColor::light_salmon,
        ChartColor::orange_red,
        ChartColor::dark_orange,
        ChartColor::orange,
        ChartColor::gold,
        ChartColor::dark_golden_rod,
        ChartColor::golden_rod,
        ChartColor::pale_golden_rod,
        ChartColor::dark_khaki,
        ChartColor::khaki,
        ChartColor::olive,
        ChartColor::yellow,
        ChartColor::yellow_green,
        ChartColor::dark_olive_green,
        ChartColor::olive_drab,
        ChartColor::lawn_green,
        ChartColor::chart_reuse,
        ChartColor::green_yellow,
        ChartColor::dark_green,
        ChartColor::green,
        ChartColor::forest_green,
        ChartColor::lime,
        ChartColor::lime_green,
        ChartColor::light_green,
        ChartColor::pale_green,
        ChartColor::dark_sea_green,
        ChartColor::medium_spring_green,
        ChartColor::spring_green,
        ChartColor::sea_green,
        ChartColor::medium_aqua_marine,
        ChartColor::medium_sea_green,
        ChartColor::light_sea_green,
        ChartColor::dark_slate_gray,
        ChartColor::teal,
        ChartColor::dark_cyan,
        ChartColor::aqua,
        ChartColor::cyan,
        ChartColor::light_cyan,
        ChartColor::dark_turquoise,
        ChartColor::turquoise,
        ChartColor::medium_turquoise,
        ChartColor::pale_turquoise,
        ChartColor::aqua_marine,
        ChartColor::powder_blue,
        ChartColor::cadet_blue,
        ChartColor::steel_blue,
        ChartColor::corn_flower_blue,
        ChartColor::deep_sky_blue,
        ChartColor::dodger_blue,
        ChartColor::light_blue,
        ChartColor::sky_blue,
        ChartColor::light_sky_blue,
        ChartColor::midnight_blue,
        ChartColor::navy,
        ChartColor::dark_blue,
        ChartColor::medium_blue,
        ChartColor::blue,
        ChartColor::royal_blue,
        ChartColor::blue_violet,
        ChartColor::indigo,
        ChartColor::dark_slate_blue,
        ChartColor::slate_blue,
        ChartColor::medium_slate_blue,
        ChartColor::medium_purple,
        ChartColor::dark_magenta,
        ChartColor::dark_violet,
        ChartColor::dark_orchid,
        ChartColor::medium_orchid,
        ChartColor::purple,
        ChartColor::thistle,
        ChartColor::plum,
        ChartColor::violet,
        ChartColor::magenta_,
        ChartColor::orchid,
        ChartColor::medium_violet_red,
        ChartColor::pale_violet_red,
        ChartColor::deep_pink,
        ChartColor::hot_pink,
        ChartColor::light_pink,
        ChartColor::pink,
        ChartColor::antique_white,
        ChartColor::beige,
        ChartColor::bisque,
        ChartColor::blanched_almond,
        ChartColor::wheat,
        ChartColor::corn_silk,
        ChartColor::lemon_chiffon,
        ChartColor::light_golden_rod_yellow,
        ChartColor::light_yellow,
        ChartColor::saddle_brown,
        ChartColor::sienna,
        ChartColor::chocolate,
        ChartColor::peru,
        ChartColor::sandy_brown,
        ChartColor::burly_wood,
        ChartColor::tan,
        ChartColor::rosy_brown,
        ChartColor::moccasin,
        ChartColor::navajo_white,
        ChartColor::peach_puff,
        ChartColor::misty_rose,
        ChartColor::lavender_blush,
        ChartColor::linen,
        ChartColor::old_lace,
        ChartColor::papaya_whip,
        ChartColor::sea_shell,
        ChartColor::mint_cream,
        ChartColor::slate_gray,
        ChartColor::light_slate_gray,
        ChartColor::light_steel_blue,
        ChartColor::lavender,
        ChartColor::floral_white,
        ChartColor::alice_blue,
        ChartColor::ghost_white,
        ChartColor::honeydew,
        ChartColor::ivory,
        ChartColor::azure,
        ChartColor::snow,
        ChartColor::black,
        ChartColor::dim_gray,
        ChartColor::gray,
        ChartColor::dark_grey,
        ChartColor::silver,
        ChartColor::light_gray,
        ChartColor::gainsboro,
        ChartColor::white_smoke,
        ChartColor::white);

    public static function getColor($color)
    {
        return self::$colors[$color];
    }

    public function count()
    {
        return sizeof(self::$colors);
    }

    public static function toColor($chartColor, $opacity = 1)
    {
        return "rgba(" . $chartColor . ", " . $opacity . ")";
    }

}