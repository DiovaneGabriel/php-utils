<?php

namespace DBarbieri\Utils;

use DateTime;

class MatematicaFinanceira
{
    public static function atualizaValor(float $valorOriginal, float $juros, DateTime $dataVencimento, DateTime|null $dataAtualizacao = null)
    {
        $dataAtualizacao = $dataAtualizacao ?: new DateTime(date("Y-m-d"));
        $juros = $juros >= 1 ? $juros / 100 : $juros;

        $dias = $dataVencimento->diff($dataAtualizacao)->days;

        return round($valorOriginal * pow(1 + $juros, ($dias / 30)), 2);
    }

    public static function calculaAmortizacao(float $valorPago, float $juros, DateTime $dataVencimento, DateTime|null $dataPagamento = null)
    {
        $dataPagamento = $dataPagamento ?: new DateTime(date("Y-m-d"));
        $juros = $juros >= 1 ? $juros / 100 : $juros;

        $dias = $dataVencimento->diff($dataPagamento)->days;

        return round($valorPago / pow(1 + $juros, ($dias / 30)), 2);
    }

    public static function descontaAdicionais(float $valorPago, array $adicionais)
    {
        $totalAdicionais = 0;

        foreach ($adicionais as $adicional) {
            $totalAdicionais += $adicional >= 1 ? $adicional / 100 : $adicional;
        }

        return round($valorPago / (1 + $totalAdicionais), 2);
    }

    public static function calculaParcelaMensal(float $valorOriginal, float $juros, int $parcelas, bool $entrada = false)
    {
        $juros = $juros >= 1 ? $juros / 100 : $juros;
        if ($entrada) {
            # primeira parcela para o dia
            return round($valorOriginal * ($juros / ((1 + $juros) - (pow((1 + $juros), (($parcelas - 1) * (-1)))))), 2);
        } else {
            # primeira parcela para 30 dias
            return round(($valorOriginal * $juros * pow(1 + $juros, $parcelas)) / (pow(1 + $juros, $parcelas) - 1), 2);
        }
    }
}
