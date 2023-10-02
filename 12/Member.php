<?php declare(strict_types=1);

class Member
{
    private $name;
    private $age;
    private $address;

/**
 * 初期値の追加
 *
 * @param string $name
 * @param integer $age
 * @param string $address
 */
    public function __construct(string $name, int $age, string $address)
    {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }

    public function showInfo()
    {
        echo '<ul>';
        echo '<li>名前:' . $this->name . '</li>';
        echo '<li>年齢:' . $this->age . '</li>';
        echo '<li>住所:' . $this->address . '</li>';
        echo '</ul>';
    }
}

  
    /**
     * 温度と湿度を指定すると不快指数の数値を返す
     *
     * @param mixed|null $t
     * @param mixed $h
     * @return array|null
     */