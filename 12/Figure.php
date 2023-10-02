<?php declare(strict_types=1);

interface Figure
{
    public function __construct(string $n, int $d);
    public function getArea();
    public function getSurroundings();
}

class Rect implements Figure
{
    private $name;
    private $diameter;
    public function __construct(string $n, int $d)
    {
        $this->name = $n;
        $this->diameter = $d;
    }

    public function getArea()
    {
        return '<p>正方形の面積は' . ($this->diameter ** 2) . 'です。</p>';
    }

    public function getSurroundings()
    {
        return '<p>正方形の周囲長は' . ($this->diameter * 4) . 'です。</p>';
    }

}

class Circle implements Figure
{
    private $name;
    private $diameter;
    public function __construct(string $n, int $d)
    {
        $this->name = $n;
        $this->diameter = $d;
    }
    public function getArea()
    {
        echo '<p>円の面積は' . round((($this->diameter / 2) **2 * pi()), 2) . 'です。</p>';
    }
    public function getSurroundings()
    {
        echo '<p>円の周囲長は' . round(($this->diameter * pi() ), 2) . 'です。</p>';
    }
}

$r = new Rect('正方形', 10);
echo $r->getArea();
// 正方形の面積は100です。
echo $r->getSurroundings();
// 正方形の周囲長は40です。

$c = new Circle('円', 10);
echo $c->getArea();
// 円の面積は78.54です。
echo $c->getSurroundings();
// 円の周囲長は31.42です。