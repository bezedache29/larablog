<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Création de 5 catégories
        $categories = Category::factory(5)->create();

        // Création de 10 users
        // Pour chaque user, on cré entre 1 et 3 post pour un utilisateur
        User::factory(10)->create()->each(function ($user) use ($categories) {
            Post::factory(rand(1, 3))->create([
                // Les foreignId ne sont pas créé dans la factory donc on les cré ici
                'user_id' => $user->id,
                // On récupère les catégories, on random 1 categorie et on récupère son id
                'category_id' => ($categories->random(1)->first())->id
            ]);
        });
    }
}
