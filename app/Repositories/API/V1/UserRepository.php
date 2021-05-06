<?php


namespace App\Repositories\API\V1;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function find($id)
    {
        return $this->model->where('id', $id)->first();
    }
}
