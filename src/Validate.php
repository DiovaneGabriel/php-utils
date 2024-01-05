<?php

namespace DBarbieri\Utils;

class Validate
{
    public static function cpf(string $cpf): bool
    {
        // Remove caracteres não numéricos
        $cpf = preg_replace('/[^0-9]/', '', $cpf);

        // Verifica se o CPF tem 11 dígitos
        if (strlen($cpf) !== 11) {
            return false;
        }

        // Divide o CPF em array de dígitos
        $digits = str_split($cpf);

        // Calcula o primeiro dígito verificador
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += (int)$digits[$i] * (10 - $i);
        }
        $remainder = $sum % 11;
        $digit1 = ($remainder < 2) ? 0 : 11 - $remainder;

        // Calcula o segundo dígito verificador
        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            $sum += (int)$digits[$i] * (11 - $i);
        }
        $remainder = $sum % 11;
        $digit2 = ($remainder < 2) ? 0 : 11 - $remainder;

        // Verifica se os dígitos verificadores calculados são iguais aos dígitos reais
        return $digit1 == $digits[9] && $digit2 == $digits[10];
    }

    public static function cnpj(string $cnpj): bool
    {
        // Remover caracteres não numéricos
        $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

        // Verificar se o CNPJ possui 14 dígitos
        if (strlen($cnpj) != 14) {
            return false;
        }

        // Calcular o primeiro dígito verificador
        $soma = 0;
        $peso = 5;
        for ($i = 0; $i < 12; $i++) {
            $soma += intval($cnpj[$i]) * $peso;
            $peso--;
            if ($peso == 1) {
                $peso = 9;
            }
        }

        $resto = $soma % 11;
        $digitoVerificador1 = ($resto < 2) ? 0 : 11 - $resto;

        // Verificar o primeiro dígito verificador
        if (intval($cnpj[12]) != $digitoVerificador1) {
            return false;
        }

        // Calcular o segundo dígito verificador
        $soma = 0;
        $peso = 6;
        for ($i = 0; $i < 13; $i++) {
            $soma += intval($cnpj[$i]) * $peso;
            $peso--;
            if ($peso == 1) {
                $peso = 9;
            }
        }

        $resto = $soma % 11;
        $digitoVerificador2 = ($resto < 2) ? 0 : 11 - $resto;

        // Verificar o segundo dígito verificador
        if (intval($cnpj[13]) != $digitoVerificador2) {
            return false;
        }

        return true;
    }
}
