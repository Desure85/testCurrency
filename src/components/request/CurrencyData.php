<?php

namespace app\components\request;

class CurrencyData
{
    private $name;
    private $rate;

    public function __construct($name, $rate)
    {
        $this->setRate($rate);
        $this->setName($name);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    private function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param mixed $rate
     */
    private function setRate($rate): void
    {
        $this->rate = $rate;
    }
}
