<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Executar o comando: php artisan db:seed 
        //para criar as seeds abaixo, (registros)

        $administrador = \App\User::firstOrCreate(['email'=>'dhemes.mota@gmail.com'],[
            'name' => 'Dhemes Mota',
            'password' => Hash::make('184259')
        ]);

        $gerenteMaster = \App\User::firstOrCreate(['email' => 'gerentemaster@gmail.com'], [
            'name' => 'Usuário Gerente Master',
            'password' => Hash::make('123456')
        ]);

        $gerente = \App\User::firstOrCreate(['email'=>'carol@gmail.com'],[
            'name' => 'Carol Mota',
            'password' => Hash::make('123456')
        ]);

        $usuario = \App\User::firstOrCreate(['email'=>'usuario@gmail.com'],[
            'name' => 'Usuario Teste',
            'password' => Hash::make('123456')
        ]);

        echo "Usuários criado! \n";
    }
}
