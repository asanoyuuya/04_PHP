<?php

$editors = [
    'VSCode'   => 'MicroSoft',
    'PhpStorm' => 'JetBrains',
    'Atom'     => 'GitHub',
    'Eclipse'  => 'IBM',
    'AEM'      => 'Adobe'
];

echo '<pre>';
print_r($editors);
echo '</pre>';

foreach ($editors as $tool => $maker) {
    echo  $tool . 'は' . $maker . '社開発です。<br>';
}