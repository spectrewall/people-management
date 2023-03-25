<?php

if (! function_exists('only_numbers')) {
    function only_numbers(?string $string) : ?string {
        if (is_null($string)) return null;
        return preg_replace('/\D+/', '', $string);
    }
}
