<?php

namespace DBarbieri\Utils;

class Color
{
    public static function darken(string $hex, float $percent): string
    {
        // Remove o '#' se existir
        $hex = ltrim($hex, '#');

        // Converte para RGB
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        // Aplica o fator de escurecimento
        $factor = 1 - ($percent / 100);

        $r = max(0, min(255, round($r * $factor)));
        $g = max(0, min(255, round($g * $factor)));
        $b = max(0, min(255, round($b * $factor)));

        // Retorna o novo hex
        return sprintf("#%02x%02x%02x", $r, $g, $b);
    }

    public static function lighten(string $hex, float $percent): string
    {
        $hex = ltrim($hex, '#');

        // Converte hex para RGB
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        // Fator de clareamento
        $factor = $percent / 100;

        // Clareia cada componente
        $r = min(255, round($r + (255 - $r) * $factor));
        $g = min(255, round($g + (255 - $g) * $factor));
        $b = min(255, round($b + (255 - $b) * $factor));

        return sprintf("#%02x%02x%02x", $r, $g, $b);
    }
    
    public static function mix(string $color1, string $color2, float $percent): string
    {
        $color1 = ltrim($color1, '#');
        $color2 = ltrim($color2, '#');

        // Garante que esteja entre 0 e 100
        $percent = max(0, min(100, $percent));
        $ratio = $percent / 100;

        // Extrai canais RGB das duas cores
        $r1 = hexdec(substr($color1, 0, 2));
        $g1 = hexdec(substr($color1, 2, 2));
        $b1 = hexdec(substr($color1, 4, 2));

        $r2 = hexdec(substr($color2, 0, 2));
        $g2 = hexdec(substr($color2, 2, 2));
        $b2 = hexdec(substr($color2, 4, 2));

        // Interpola os canais
        $r = round($r1 * (1 - $ratio) + $r2 * $ratio);
        $g = round($g1 * (1 - $ratio) + $g2 * $ratio);
        $b = round($b1 * (1 - $ratio) + $b2 * $ratio);

        return sprintf("#%02x%02x%02x", $r, $g, $b);
    }
}
