<?php

if (!function_exists('format_age')):
    function format_age(int $minAge, int $maxAge): string|null
    {
        if ($minAge === 0 && $maxAge === 0) return null;

        if ($minAge !== 0 && $maxAge === 0) return "Ab $minAge Jahren";

        if ($minAge === 0 && $maxAge !== 0) return "Bis $maxAge Jahren";

        return "Von $minAge bis $maxAge Jahren";
    }
endif;