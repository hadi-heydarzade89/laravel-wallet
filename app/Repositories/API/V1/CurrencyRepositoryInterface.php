<?php


namespace App\Repositories\API\V1;


interface CurrencyRepositoryInterface
{
    public function findByName($name);
}
