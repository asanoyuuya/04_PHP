<?php
/**
 * Undocumented function
 *
 * @param [type] $string
 * @return string|null
 */
function h(?string $string):?string
{
    if (empty($string)) return null;
    return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
echo h('<script>alert("危険")</script>');