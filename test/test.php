<?php
date_default_timezone_set('America/Sao_Paulo');

use DBarbieri\Utils\MatematicaFinanceira;

require __DIR__ . '/../vendor/autoload.php';

$juros = 2;
$multa = 3;
$honorarios = 10;

echo '<pre>';
var_dump(MatematicaFinanceira::atualizaValor(1230, $juros, new DateTime('2023-12-15')));
var_dump(MatematicaFinanceira::atualizaValor(1200, $juros, new DateTime('2024-01-15')));
var_dump(MatematicaFinanceira::calculaParcelaMensal(2516.14, $juros, 6));
var_dump(MatematicaFinanceira::calculaParcelaMensal(1000, $juros, 6, true));
var_dump(MatematicaFinanceira::calculaParcelaMensal(1000, $juros, 6));

$valorPago = 507.6;
var_dump("Valor Pago: " . $valorPago);
var_dump("Valor Liquido: " . $valorPago = MatematicaFinanceira::descontaAdicionais($valorPago, [$multa, $honorarios]));
var_dump("Valor Amortizado: " . MatematicaFinanceira::calculaAmortizacao($valorPago, $juros, new DateTime('2024-01-15'), new DateTime('2024-02-14')));
die();
