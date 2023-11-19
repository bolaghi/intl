<?php

namespace CommerceGuys\Intl\NumberFormat;

use CommerceGuys\Intl\Locale;

/**
 * Provides number formats.
 */
class NumberFormatRepository implements NumberFormatRepositoryInterface
{
    /**
     * The fallback locale.
     *
     * @var string
     */
    protected string $fallbackLocale;

    /**
     * Creates a NumberFormatRepository instance.
     *
     * @param string $fallbackLocale The fallback locale. Defaults to 'en'.
     */
    public function __construct(string $fallbackLocale = 'en')
    {
        $this->fallbackLocale = $fallbackLocale;
    }

    /**
     * {@inheritdoc}
     */
    public function get(string $locale): NumberFormat
    {
        $definitions = $this->getDefinitions();
        $availableLocales = array_keys($definitions);
        $locale = Locale::resolve($availableLocales, $locale, $this->fallbackLocale);
        $definition = $this->processDefinition($locale, $definitions[$locale]);

        return new NumberFormat($definition);
    }

    /**
     * Processes the number format definition for the provided locale.
     *
     * @param string $locale    The locale.
     * @param array $definition The definition
     *
     * @return array The processed definition.
     */
    protected function processDefinition(string $locale, array $definition)
    {
        $definition['locale'] = $locale;
        // The generation script strips all keys that have the same values
        // as the ones in 'en'.
        if ($definition['locale'] != 'en') {
            $definitions = $this->getDefinitions();
            $definition += $definitions['en'];
        }

        return $definition;
    }

    /**
     * Gets the number format definitions.
     *
     * @return array
     *   The number format definitions, keyed by locale.
     */
    protected function getDefinitions(): array
    {
        return [
            'af' => [
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'am' => [],
            'ar' => [
                'numbering_system' => 'arab',
                'currency_pattern' => '‏#,##0.00 ¤',
                'accounting_currency_pattern' => '‏#,##0.00 ¤',
                'decimal_separator' => '٫',
                'grouping_separator' => '٬',
                'plus_sign' => '؜+',
                'minus_sign' => '؜-',
                'percent_sign' => '٪؜',
            ],
            'ar-AE' => [
                'currency_pattern' => '‏#,##0.00 ¤;‏-#,##0.00 ¤',
                'accounting_currency_pattern' => '؜#,##0.00¤;(؜#,##0.00¤)',
                'plus_sign' => '‎+',
                'minus_sign' => '‎-',
                'percent_sign' => '‎%‎',
            ],
            'ar-DZ' => [
                'currency_pattern' => '‏#,##0.00 ¤;‏-#,##0.00 ¤',
                'accounting_currency_pattern' => '؜#,##0.00¤;(؜#,##0.00¤)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
                'plus_sign' => '‎+',
                'minus_sign' => '‎-',
                'percent_sign' => '‎%‎',
            ],
            'ar-EH' => [
                'currency_pattern' => '‏#,##0.00 ¤;‏-#,##0.00 ¤',
                'accounting_currency_pattern' => '؜#,##0.00¤;(؜#,##0.00¤)',
                'plus_sign' => '‎+',
                'minus_sign' => '‎-',
                'percent_sign' => '‎%‎',
            ],
            'ar-LY' => [
                'currency_pattern' => '‏#,##0.00 ¤;‏-#,##0.00 ¤',
                'accounting_currency_pattern' => '؜#,##0.00¤;(؜#,##0.00¤)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
                'plus_sign' => '‎+',
                'minus_sign' => '‎-',
                'percent_sign' => '‎%‎',
            ],
            'ar-MA' => [
                'currency_pattern' => '‏#,##0.00 ¤;‏-#,##0.00 ¤',
                'accounting_currency_pattern' => '؜#,##0.00¤;(؜#,##0.00¤)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
                'plus_sign' => '‎+',
                'minus_sign' => '‎-',
                'percent_sign' => '‎%‎',
            ],
            'ar-TN' => [
                'currency_pattern' => '‏#,##0.00 ¤;‏-#,##0.00 ¤',
                'accounting_currency_pattern' => '؜#,##0.00¤;(؜#,##0.00¤)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
                'plus_sign' => '‎+',
                'minus_sign' => '‎-',
                'percent_sign' => '‎%‎',
            ],
            'as' => [
                'numbering_system' => 'beng',
                'decimal_pattern' => '#,##,##0.###',
                'percent_pattern' => '#,##,##0%',
                'currency_pattern' => '¤ #,##,##0.00',
            ],
            'az' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'be' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'bg' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'bn' => [
                'numbering_system' => 'beng',
                'decimal_pattern' => '#,##,##0.###',
                'currency_pattern' => '#,##,##0.00¤',
                'accounting_currency_pattern' => '#,##,##0.00¤;(#,##,##0.00¤)',
            ],
            'bn-IN' => [
                'numbering_system' => 'beng',
                'decimal_pattern' => '#,##,##0.###',
                'currency_pattern' => '¤#,##,##0.00',
                'accounting_currency_pattern' => '¤#,##,##0.00;(¤#,##,##0.00)',
            ],
            'bs' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'ca' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'chr' => [],
            'cs' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'cy' => [],
            'da' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'de' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'de-AT' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '¤ #,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
                'grouping_currency_separator' => '.',
            ],
            'de-CH' => [
                'currency_pattern' => '¤ #,##0.00;¤-#,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00;¤-#,##0.00',
                'grouping_separator' => '’',
            ],
            'de-LI' => [
                'currency_pattern' => '¤ #,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00',
                'grouping_separator' => '’',
            ],
            'dsb' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'el' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'en' => [
                'numbering_system' => 'latn',
                'decimal_pattern' => '#,##0.###',
                'percent_pattern' => '#,##0%',
                'currency_pattern' => '¤#,##0.00',
                'accounting_currency_pattern' => '¤#,##0.00;(¤#,##0.00)',
            ],
            'en-150' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
            ],
            'en-AT' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '¤ #,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'en-BE' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'en-CH' => [
                'currency_pattern' => '¤ #,##0.00;¤-#,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00;¤-#,##0.00',
                'grouping_separator' => '’',
            ],
            'en-DE' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'en-DK' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'en-FI' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'en-ID' => [
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'en-IN' => [
                'decimal_pattern' => '#,##,##0.###',
                'percent_pattern' => '#,##,##0%',
                'currency_pattern' => '¤#,##,##0.00',
            ],
            'en-MV' => [
                'currency_pattern' => '¤ #,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00',
            ],
            'en-NL' => [
                'currency_pattern' => '¤ #,##0.00;¤ -#,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00;(¤ #,##0.00)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'en-SE' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'en-SI' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'es' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'es-419' => [
                'accounting_currency_pattern' => '¤#,##0.00',
            ],
            'es-AR' => [
                'currency_pattern' => '¤ #,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00;(¤ #,##0.00)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'es-BO' => [
                'accounting_currency_pattern' => '¤#,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'es-CL' => [
                'currency_pattern' => '¤#,##0.00;¤-#,##0.00',
                'accounting_currency_pattern' => '¤#,##0.00;¤-#,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'es-CO' => [
                'currency_pattern' => '¤ #,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'es-CR' => [
                'accounting_currency_pattern' => '¤#,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'es-DO' => [],
            'es-EC' => [
                'currency_pattern' => '¤#,##0.00;¤-#,##0.00',
                'accounting_currency_pattern' => '¤#,##0.00;¤-#,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'es-GQ' => [
                'percent_pattern' => '#,##0 %',
                'accounting_currency_pattern' => '¤#,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'es-PE' => [
                'currency_pattern' => '¤ #,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00',
            ],
            'es-PY' => [
                'currency_pattern' => '¤ #,##0.00;¤ -#,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00;¤ -#,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'es-UY' => [
                'currency_pattern' => '¤ #,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00;(¤ #,##0.00)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'es-VE' => [
                'currency_pattern' => '¤#,##0.00;¤-#,##0.00',
                'accounting_currency_pattern' => '¤#,##0.00;¤-#,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'et' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
                'minus_sign' => '−',
            ],
            'eu' => [
                'percent_pattern' => '% #,##0',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
                'minus_sign' => '−',
            ],
            'fa' => [
                'numbering_system' => 'arabext',
                'currency_pattern' => '‏#,##0.00 ¤',
                'accounting_currency_pattern' => '‎¤ #,##0.00;‎(¤ #,##0.00)',
                'decimal_separator' => '٫',
                'grouping_separator' => ',',
                'plus_sign' => '‎+',
                'minus_sign' => '‎−',
                'percent_sign' => '٪',
            ],
            'fa-AF' => [
                'numbering_system' => 'arabext',
                'currency_pattern' => '¤ #,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00;‎(¤ #,##0.00)',
                'decimal_separator' => '٫',
                'grouping_separator' => '٬',
                'plus_sign' => '‎+',
                'minus_sign' => '‎−',
                'percent_sign' => '٪',
            ],
            'fi' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
                'minus_sign' => '−',
            ],
            'fil' => [],
            'fr' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'fr-CA' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'fr-CH' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'decimal_currency_separator' => '.',
                'grouping_separator' => ' ',
            ],
            'fr-LU' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'fr-MA' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'ga' => [],
            'gd' => [],
            'gl' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'gu' => [
                'decimal_pattern' => '#,##,##0.###',
                'percent_pattern' => '#,##,##0%',
                'currency_pattern' => '¤#,##,##0.00',
                'accounting_currency_pattern' => '¤#,##,##0.00;(¤#,##,##0.00)',
            ],
            'he' => [
                'currency_pattern' => '‏#,##0.00 ‏¤;‏-#,##0.00 ‏¤',
                'accounting_currency_pattern' => '‏#,##0.00 ‏¤;‏-#,##0.00 ‏¤',
                'plus_sign' => '‎+',
                'minus_sign' => '‎-',
            ],
            'hi' => [
                'decimal_pattern' => '#,##,##0.###',
                'percent_pattern' => '#,##,##0%',
                'currency_pattern' => '¤#,##,##0.00',
                'accounting_currency_pattern' => '¤#,##,##0.00',
            ],
            'hi-Latn' => [
                'decimal_pattern' => '#,##,##0.###',
                'percent_pattern' => '#,##,##0%',
                'currency_pattern' => '¤#,##,##0.00',
                'accounting_currency_pattern' => '¤#,##,##0.00',
            ],
            'hr' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
                'minus_sign' => '−',
            ],
            'hsb' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'hu' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'hy' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'id' => [
                'accounting_currency_pattern' => '¤#,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'ig' => [],
            'is' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'it' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'it-CH' => [
                'currency_pattern' => '¤ #,##0.00;¤-#,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00;¤-#,##0.00',
                'grouping_separator' => '’',
            ],
            'ja' => [],
            'ka' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'kk' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'km' => [
                'currency_pattern' => '#,##0.00¤',
                'accounting_currency_pattern' => '#,##0.00¤;(#,##0.00¤)',
            ],
            'ko' => [],
            'kok' => [
                'currency_pattern' => '¤ #,##0.00',
            ],
            'ky' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'lo' => [
                'currency_pattern' => '¤#,##0.00;¤-#,##0.00',
                'accounting_currency_pattern' => '¤#,##0.00;¤-#,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'lt' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
                'minus_sign' => '−',
            ],
            'lv' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'mk' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'mn' => [
                'currency_pattern' => '¤ #,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00',
            ],
            'mr' => [
                'numbering_system' => 'deva',
                'decimal_pattern' => '#,##,##0.###',
            ],
            'ms' => [],
            'ms-BN' => [
                'currency_pattern' => '¤ #,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'ms-ID' => [
                'accounting_currency_pattern' => '¤#,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'my' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '¤ #,##0.00',
            ],
            'ne' => [
                'numbering_system' => 'deva',
                'decimal_pattern' => '#,##,##0.###',
                'percent_pattern' => '#,##,##0%',
                'currency_pattern' => '¤ #,##,##0.00',
                'accounting_currency_pattern' => '¤ #,##,##0.00',
            ],
            'nl' => [
                'currency_pattern' => '¤ #,##0.00;¤ -#,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00;(¤ #,##0.00)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'nn' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤;-#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
                'minus_sign' => '−',
            ],
            'no' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤;-#,##0.00 ¤',
                'accounting_currency_pattern' => '¤ #,##0.00;(¤ #,##0.00)',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
                'minus_sign' => '−',
            ],
            'or' => [
                'decimal_pattern' => '#,##,##0.###',
            ],
            'pa' => [
                'decimal_pattern' => '#,##,##0.###',
                'percent_pattern' => '#,##,##0%',
                'currency_pattern' => '¤#,##,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00',
            ],
            'pl' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'ps' => [
                'numbering_system' => 'arabext',
                'currency_pattern' => '¤ #,##0.00',
                'decimal_separator' => '٫',
                'grouping_separator' => '٬',
                'plus_sign' => '‎+‎',
                'minus_sign' => '‎-‎',
                'percent_sign' => '٪',
            ],
            'pt' => [
                'currency_pattern' => '¤ #,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'pt-PT' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'ro' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'ru' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'si' => [],
            'sk' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'sl' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
                'minus_sign' => '−',
            ],
            'so' => [],
            'sq' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'sr' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'sr-Latn' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤;(#,##0.00 ¤)',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'sv' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
                'minus_sign' => '−',
            ],
            'sw' => [
                'currency_pattern' => '¤ #,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00',
            ],
            'sw-CD' => [
                'currency_pattern' => '¤ #,##0.00',
                'accounting_currency_pattern' => '¤ #,##0.00',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'ta' => [
                'decimal_pattern' => '#,##,##0.###',
                'percent_pattern' => '#,##,##0%',
                'currency_pattern' => '¤#,##,##0.00',
            ],
            'ta-MY' => [
                'currency_pattern' => '¤ #,##0.00',
            ],
            'ta-SG' => [
                'currency_pattern' => '¤ #,##0.00',
            ],
            'te' => [
                'decimal_pattern' => '#,##,##0.###',
                'currency_pattern' => '¤#,##,##0.00',
            ],
            'th' => [],
            'tk' => [
                'percent_pattern' => '#,##0 %',
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'tr' => [
                'percent_pattern' => '%#,##0',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'uk' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'ur' => [
                'plus_sign' => '‎+',
                'minus_sign' => '‎-',
            ],
            'ur-IN' => [
                'numbering_system' => 'arabext',
                'currency_pattern' => '¤ #,##,##0.00',
                'decimal_separator' => '٫',
                'grouping_separator' => '٬',
                'plus_sign' => '‎+‎',
                'minus_sign' => '‎-‎',
            ],
            'uz' => [
                'currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => ' ',
            ],
            'vi' => [
                'currency_pattern' => '#,##0.00 ¤',
                'accounting_currency_pattern' => '#,##0.00 ¤',
                'decimal_separator' => ',',
                'grouping_separator' => '.',
            ],
            'yue' => [],
            'yue-Hans' => [],
            'zh' => [],
            'zh-Hant' => [],
            'zu' => [],
        ];
    }
}
