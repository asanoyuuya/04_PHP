<?php
function h($string) {
    return htmlspecialchars($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
echo h('<script>alert("危険")</script>');

