<?php

namespace App\Repositories\Eloquent;

abstract class AbstractRepository
{
    protected $model;

    function __construct() {
        $this->model = $this->resolveModel();
    }

    /*
    * Listagem
    */
    public function all(string $column = 'id', string $order = 'ASC')
    {
        return $this->model->orderBy($column, $order)->get(); // trazendo todos os dados e ordenando
    }

    /*
    * Paginação
    */
    public function paginate(int $paginate = 10, string $column = 'id', string $order = 'ASC')
    {
        return $this->model->orderBy($column, $order)->paginate($paginate);
    }

    
    public function findWhereLike(array $columns, string $search, string $column = 'id', string $order = 'ASC')
    {
        $query = $this->model;

        foreach($columns as $key => $value){
            $query = $query->orWhere($value,'like','%'.$search.'%');
        }

        return $query->orderBy($column, $order)->get();
    }

    /*
    * Create
    */
    public function create(array $data)
    {
        return (bool) $this->model->create($data);
    }

    /*
    * Buscar dados pelo id
    */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /*
    * Atualizar dados pelo id
    */
    public function update(array $data, int $id)
    {
        $register = $this->find($id);
        if($register){
            return (bool) $register->update($data);
        } else {
            return false;
        }
    }

    /*
    * Deletar dados pelo id
    */
    public function delete(int $id)
    {
        $register = $this->find($id);
        if($register){
            return (bool) $register->delete();
        } else {
            return false;
        }
    }
    
    protected function resolveModel()
    {
        return app($this->model);
    }

}
