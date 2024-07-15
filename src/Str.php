<?php

namespace DBarbieri\Utils;

class Str
{
    public static function replaceImageUrlsMarkdown($markdownContent, $searchOldUrl, $newUrl)
    {
        // Expressão regular para encontrar URLs de imagens com o domínio específico
        $pattern = '/!\[([^\]]*)\]\((https:\/\/jounce-stage\.s3\.us-east-2\.amazonaws\.com[^\)]+)\)/i';

        // Função de callback para substituir a URL
        $callback = function ($matches) use ($newUrl) {
            // $matches[0] é a string completa que corresponde ao padrão
            // $matches[1] é o texto alternativo da imagem
            // $matches[2] é a URL da imagem original que queremos substituir

            // Substituir a URL antiga pela nova
            $newImageUrl = $newUrl . parse_url($matches[2], PHP_URL_PATH);

            // Retornar a string substituída
            return '![ ' . $matches[1] . '](' . $newImageUrl . ')';
        };

        // Executar a substituição
        return preg_replace_callback($pattern, $callback, $markdownContent);
    }
}
