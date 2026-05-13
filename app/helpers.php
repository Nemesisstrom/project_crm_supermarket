<?php

if (!function_exists('currency_format')) {

    function currency_format($amount, $currency = 'IDR')
    {
        $currencies = config('currency.supported');

        $symbol = $currencies[$currency]['symbol'] ?? 'Rp';

        return $symbol . ' ' .
            number_format($amount, 0, ',', '.');
    }
}

if (!function_exists('convert_currency')) {

    function convert_currency($amount, $from, $to = 'IDR')
    {
        $currencies = config('currency.supported');

        $fromRate = $currencies[$from]['rate'];

        $toRate = $currencies[$to]['rate'];

        return ($amount * $fromRate) / $toRate;
    }
}