<?php

namespace DBarbieri\Utils;

class Markdown
{
    public static function getUrlImages($markdownContent)
    {
        $pattern = '/\[([^\]]*)\]\((https?:\/\/[^\)]+)\)/i';
        $imageUrls = [];

        if (preg_match_all($pattern, $markdownContent, $matches)) {
            $imageUrls = $matches[2];
        }

        return $imageUrls;
    }
}
