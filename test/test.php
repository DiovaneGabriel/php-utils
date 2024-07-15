<?php
date_default_timezone_set('America/Sao_Paulo');

use DBarbieri\Utils\Cache;
use DBarbieri\Utils\MatematicaFinanceira;
use DBarbieri\Utils\Str;

require __DIR__ . '/../vendor/autoload.php';

$markdownContent = "A few links that may also be useful:\n- [The Marketer’s Guide To Supply Path Optimization](https://jouncemedia.com/marketers-guide-to-spo)\n- [Our MFA Evaluation Criteria](https://jouncemedia.com/blog/mfa-evaluation-criteria)\n\n![Black-transp-square-stacked.png](https://jounce-stage.s3.us-east-2.amazonaws.com/Black_transp_square_stacked_4fb0b7d04a.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Credential=AKIAYW2ST5IYCO7HQTGF%2F20240715%2Fus-east-2%2Fs3%2Faws4_request&X-Amz-Date=20240715T162042Z&X-Amz-Expires=900&X-Amz-Signature=6aa3a5fb28f41a5e167914928abb6a6688ae70d77c1ef2717cd9b52183d84767&X-Amz-SignedHeaders=host&x-id=GetObject)";
$search = "jounce-stage.s3.us-east-2.amazonaws.com";
$newUrl = "google.com";

echo '<pre>';
var_dump(Str::replaceImageUrlsMarkdown($markdownContent, $search, $newUrl));
die();
