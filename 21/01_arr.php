<?php

$editors = [
    'VSCode'   => 'MicroSoft',
    'PhpStorm' => 'JetBrains',
    'Atom'     => 'GitHub',
    'Eclipse'  => 'IBM',
    'AEM'      => 'Adobe'
];

foreach ($editors as $tool => $maker) {
    echo  $tool . 'は' . $maker . '社開発です。<br>';
}