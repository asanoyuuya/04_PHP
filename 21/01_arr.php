<?php

$editors = [
    'VSCode' => 'MicroSoft',
    'PhpStorm' => 'JetBrains',
    'Atom' => 'GitHub',
    'Eclipse' => 'IBM',
    'AEM' => 'Adobe',
];

echo '<table>';
foreach ($editors as $editor => $maker) {
    echo '<tr>';
    echo '<td>' . $editor . 'は' . $maker . '社開発です。</td>';
    echo '</tr>';
}
echo '</table>';