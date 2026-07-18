<?php

/**
 * Helper Functions
 */

if (!function_exists('isRTL')) {
    /**
     * Check if the current locale is RTL (Right-to-Left)
     * 
     * @return bool
     */
    function isRTL(): bool
    {
        $locale = app()->getLocale();
        $rtlLocales = ['ar', 'ur', 'fa', 'he', 'ps', 'sd'];
        
        return in_array($locale, $rtlLocales);
    }
}

if (!function_exists('getDir')) {
    /**
     * Get the direction (rtl/ltr) based on current locale
     * 
     * @return string
     */
    function getDir(): string
    {
        return isRTL() ? 'rtl' : 'ltr';
    }
}

if (!function_exists('rtlAlign')) {
    /**
     * Get text alignment based on direction
     * 
     * @param string $ltr Left-to-right alignment
     * @param string $rtl Right-to-left alignment
     * @return string
     */
    function rtlAlign(string $ltr = 'left', string $rtl = 'right'): string
    {
        return isRTL() ? $rtl : $ltr;
    }
}

if (!function_exists('rtlMargin')) {
    /**
     * Get margin value based on direction
     * 
     * @param string $start Margin start for LTR
     * @param string $end Margin end for LTR
     * @return string
     */
    function rtlMargin(string $start, string $end): string
    {
        return isRTL() ? $end : $start;
    }
}

if (!function_exists('rtlPadding')) {
    /**
     * Get padding value based on direction
     * 
     * @param string $start Padding start for LTR
     * @param string $end Padding end for LTR
     * @return string
     */
    function rtlPadding(string $start, string $end): string
    {
        return isRTL() ? $end : $start;
    }
}
