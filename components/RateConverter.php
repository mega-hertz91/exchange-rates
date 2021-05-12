<?php

namespace app\components;
/**
 * Currency conversion class
 * @package app\components
 */
class RateConverter
{
    const AUD = 0.017213;
    const AZN = 0.022911;
    const GBP = 0.009558;
    const AMD = 7.044139;
    const BYN = 0.034215;
    const BGN = 0.02172;
    const BRL = 0.070447;
    const HUF = 3.980496;
    const HKD = 0.104734;
    const DKK = 0.082571;
    const USD = 0.013485;
    const EUR = 0.011111;
    const INR = 0.989443;
    const KZT = 5.762858;
    const CAD = 0.016325;
    const KGS = 1.142694;
    const CNY = 0.086669;
    const MDL = 0.239628;
    const NOK = 0.111521;
    const PLN = 0.050701;
    const RON = 0.054711;
    const XDR = 0.009349;
    const SGD = 0.017903;
    const TJS = 0.153796;
    const TRY = 0.111929;
    const TMT = 0.04713;
    const UZS = 141.993014;
    const UAH = 0.373108;
    const CZK = 0.284317;
    const SEK = 0.112456;
    const CHF = 0.012181;
    const ZAR = 0.188926;
    const KRW = 15.092699;
    const JPY = 1.468849;


    /**
     * RateConverter::convert(RateConverter::USD, RateConverter::AUD);
     * Converting currency
     * @param float $firsRate
     * @param float $secondRate
     * @return float
     */
    public static function convert(float $firsRate, float $secondRate): float
    {
        return $firsRate/$secondRate;
    }
}
