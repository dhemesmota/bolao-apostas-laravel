<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\RoleRepositoryInterface;
use App\Role;

class RoleRepository extends AbstractRepository implements RoleRepositoryInterface
{
    protected $model = Role::class;
    
    public function create(array $data)
    {
        $register = $this->model->create($data);

        if(isset($data['permissions']) && count($data['permissions'])){
            foreach ($data['permissions'] as $key => $value){
                // Relacionamento com permissões
                // o $value vai contar o id da permissão
                $register->permissions()->attach($value);
            }
        }
        
        return (bool) $register;
    }

    public function update(array $data, int $id)
    {
        $register = $this->find($id);
        if($register){

            $permissions = $register->permissions; // Receber todas as permissoes que a função possui
            // Verificar se já possui permissoes, se sim, remover todas para atribuir novas abaixo
            if(count($permissions)){
                // Percorrer a lista de permissões e remover
                foreach ($permissions as $key => $value){
                    $register->permissions()->detach($value->id);
                }
            }
            
            if(isset($data['permissions']) && count($data['permissions'])){
                foreach ($data['permissions'] as $key => $value){
                    // Relacionamento com permissões
                    // o $value vai contar o id da permissão
                    $register->permissions()->attach($value);
                }
            }
            return (bool) $register->update($data);
        } else {
            return false;
        }
    }
}
