<?php
class ConvertLang
{
    private $totalLang;

    public function __construct(array $tl)
    {
        $this->totalLang = $tl;
    }
    public function getConvertLang(?string $lang): string
    {
        for ($i = 0; $i < count($this->totalLang); $i++) {
            if ($lang == $this->totalLang[$i]['nation']) {
                return $this->totalLang[$i]['greeting'];
            }
            ;
        }
    }
}


