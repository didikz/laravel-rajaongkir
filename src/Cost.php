<?php

namespace Didikz\LaravelRajaongkir;

class Cost extends LaravelRajaongkir
{
    protected $originCityId;
    protected $destinationCityId;
    protected $weight;
    protected $courier;
    protected $availableCouriers = [
        'starter' => [
            'jne',
            'pos',
            'tiki',
        ],
    ];

    /**
     * @param int $originCityId
     * @return $this
     */
    public function origin(int $originCityId): self
    {
        $this->originCityId = $originCityId;

        return $this;
    }

    /**
     * @param int $destinationCityId
     * @return $this
     */
    public function destination(int $destinationCityId): self
    {
        $this->destinationCityId = $destinationCityId;

        return $this;
    }

    /**
     * @param $weight
     * @return $this
     */
    public function weight($weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @param string $courierCode
     * @return $this
     * @throws \Exception
     */
    public function courier(string $courierCode): self
    {
        if (! in_array($courierCode, $this->availableCouriers[$this->plan])) {
            throw new \Exception('Courier invalid. Available couriers are ' . implode(',', $this->availableCouriers[$this->plan]));
        }

        $this->courier = $courierCode;

        return $this;
    }

    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function calculate()
    {
        $params = [
            'origin' => $this->originCityId,
            'destination' => $this->destinationCityId,
            'weight' => $this->weight,
            'courier' => $this->courier,
        ];
        $this->postRequest('/cost', $params);

        return $this->responseData;
    }
}
