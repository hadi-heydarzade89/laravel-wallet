<?php


namespace App\Repositories\API\V1;


use App\Models\Currency;
use App\Repositories\BaseRepository;

class CurrencyRepository extends BaseRepository implements CurrencyRepositoryInterface
{

    public function __construct(Currency $model)
    {
        parent::__construct($model);
    }

    public function find($name)
    {
        return $this->model->where('name', $name);
    }
}
