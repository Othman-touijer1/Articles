<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role; // Ajouter ceci en haut de votre fichier
use Spatie\Permission\Models\Permission; // Si vous travaillez aussi avec des permissions
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Créer les rôles
        $roleUser1 = Role::create(['name' => 'user_1']);
        $roleUser2 = Role::create(['name' => 'user_2']);
        $roleUser3 = Role::create(['name' => 'user_3']);

        // Créer des permissions
        Permission::create(['name' => 'create articles']);
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);

        // Assigner des permissions aux rôles
        $roleUser1->givePermissionTo('create articles');
        $roleUser2->givePermissionTo('edit articles');
        $roleUser3->givePermissionTo('delete articles');

        // Assignation des rôles aux utilisateurs spécifiques
        // Assurez-vous que les utilisateurs existent dans la base de données
        $user1 = User::find(10); // Trouver l'utilisateur avec ID = 1
        if ($user1) {
            $user1->assignRole('user_1'); // Assigner le rôle 'user_1' à l'utilisateur 1
        }

        $user2 = User::find(11); // Trouver l'utilisateur avec ID = 2
        if ($user2) {
            $user2->assignRole('user_2'); // Assigner le rôle 'user_2' à l'utilisateur 2
        }

        $user3 = User::find(12); // Trouver l'utilisateur avec ID = 3
        if ($user3) {
            $user3->assignRole('user_3'); // Assigner le rôle 'user_3' à l'utilisateur 3
        }
    }
}
