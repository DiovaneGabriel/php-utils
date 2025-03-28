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
}
