<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\BlogPost;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Créer un utilisateur admin
       /* User::create([
            'name' => 'Kambou',
            'email' => 'kamboujedidia@gmail.com',
            'password' => Hash::make('Solutions13@'),
            'email_verified_at' => now(),
        ]);

        // Créer des catégories par défaut
        $categories = [
            ['name' => 'Téléphones', 'description' => 'Smartphones et téléphones portables'],
            ['name' => 'Montres', 'description' => 'Montres connectées et smartwatch'],
            ['name' => 'Tablettes', 'description' => 'Tablettes tactiles et iPad'],
            ['name' => 'Accessoires', 'description' => 'Accessoires et gadgets tech'],
            ['name' => 'Électroménager', 'description' => 'Appareils électroménagers']
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Créer des produits exemple
        $products = [
            [
                'name' => 'iPhone 15 Pro',
                'description' => 'Dernier modèle Apple avec puce A17 Pro',
                'price' => 899000,
                'category_id' => 1
            ],
            [
                'name' => 'Samsung Galaxy S24',
                'description' => 'Smartphone Android haut de gamme',
                'price' => 749000,
                'category_id' => 1
            ],
            [
                'name' => 'Apple Watch Series 9',
                'description' => 'Montre connectée avec GPS',
                'price' => 399000,
                'category_id' => 2
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        // Créer des articles de blog
        $blogPosts = [
            [
                'title' => 'L\'IA au service de l\'éducation africaine',
                'excerpt' => 'Découvrez comment l\'intelligence artificielle révolutionne l\'apprentissage...',
                'content' => 'L\'intelligence artificielle transforme radicalement le paysage éducatif africain...',
                'status' => 'published',
                'published_at' => now()->format('Y-m-d')
            ],
            [
                'title' => 'Top 5 des smartphones 2024',
                'excerpt' => 'Notre sélection des meilleurs smartphones de l\'année...',
                'content' => '2024 marque une année exceptionnelle pour l\'industrie des smartphones...',
                'status' => 'published',
                'published_at' => now()->format('Y-m-d')
            ]
        ];

        foreach ($blogPosts as $post) {
            BlogPost::create($post);
        }*/
    }
}

