<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\BettingRepositoryInterface;
use App\Betting;

class BettingRepository extends AbstractRepository implements BettingRepositoryInterface
{
    protected $model = Betting::class;

    /*
    * Create
    */
    public function create(array $data)
    {
        $user = Auth()->user();
        $data['user_id'] = $user->id;
        return (bool)$this->model->create($data);
    }


    /*
    * Atualizar dados pelo id
    */
    public function update(array $data, int $id)
    {
        $register = $this->find($id);
        if ($register) {
            $user = Auth()->user();
            $data['user_id'] = $user->id;
            return (bool)$register->update($data);
        } else {
            return false;
        }
    }
}
