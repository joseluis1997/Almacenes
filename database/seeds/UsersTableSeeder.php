<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $admin = User::create([
            'CI' => '8174801',
            'NOMBRE' => 'Wilson',
            'APELLIDO' =>'Flores Flores',
            'TELEFONO' =>'75315092',
            'NOM_USUARIO' => 'Wilson2021',
            // 'password' => Hash::make('pass123')
            'password' => bcrypt('Wilson2021')
        ]);
        // asiganando roles admin
        $admin->assignRole('Administrador');

        
        // $editor = User::create([
        //     'ci' => '817421',
        //     'name' => 'Lourdes',
        //     'lastname' =>'mercado alarcon',
        //     'telephone' =>'75315092',
        //     'username' => 'lula1998',
        //     // 'password' => Hash::make('pass123')
        //     'password' => bcrypt('password2021')
        // ]);
        // // asiganando roles editor
        // $editor->assignRole('editor');

        // $moderador = User::create([
        //     'ci' => '817421',
        //     'name' => 'jose luis',
        //     'lastname' =>'mercado alarcon',
        //     'telephone' =>'75315092',
        //     'username' => 'jose1997',
        //     // 'password' => Hash::make('pass123')
        //     'password' => bcrypt('password2021')
        // ]);
        //   // asiganando roles     
        // $moderador->assignRole('moderador');

    }
}
