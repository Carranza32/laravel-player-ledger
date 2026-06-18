<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Crear permisos y roles
        $permission = Permission::create(['name' => 'add player note']);
        $agentRole = Role::create(['name' => 'support-agent']);
        $agentRole->givePermissionTo($permission);

        $agent = User::factory()->create([
            'name'  => 'Agent Support',
            'email' => 'agent@demo.com',
            'password' => Hash::make('password'),
        ]);
        $agent->assignRole($agentRole);

        User::factory()->create([
            'name'  => 'Agent Junior',
            'email' => 'junior@demo.com',
            'password' => Hash::make('password'),
        ]);

        // Jugadores
        User::factory(25)->create();
    }
}
