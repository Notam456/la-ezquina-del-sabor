<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('nombre', 'Administrador')->first();
        Usuario::create([
            'rol_id' => $adminRole->id,
            'username' => 'admin',
            'password_hash' => bcrypt('1234'),
            'nombre_completo' => 'Administrador',
            'activo' => true,
        ]);
    }
}
