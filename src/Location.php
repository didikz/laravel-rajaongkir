<?php

namespace Didikz\LaravelRajaongkir;

class Location extends LaravelRajaongkir
{
    /**
     * @param int|null $provinceId
     * @return mixed
     * @throws \Exception
     */
    public function province(int $provinceId = null)
    {
        $query = ($provinceId) ? ['id' => $provinceId] : [];
        $this->getRequest('/province', $query);

        return $this->responseData;
    }

    /**
     * @param int $provinceId
     * @param int|null $cityId
     * @return mixed
     * @throws \Exception
     */
    public function city(int $provinceId, int $cityId = null)
    {
        $query = [
            'province' => $provinceId,
            'id' => $cityId,
        ];
        $this->getRequest('/city', $query);

        return $this->responseData;
    }
}
