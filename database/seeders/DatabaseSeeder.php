<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Conversation;
use App\Models\Like;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //$this->call([
            // UserSeeder::class,
            // PostSeeder::class,
            // CommentSeeder::class,
            // ConversationSeeder::class,
            // MessageSeeder::class,
        //]);
        
        //? Crear usuario principal "qwerty"
        $qwerty = User::create([
            'name' => 'qwerty',
            'email' => 'qwerty@gmail.com',
            'password' => Hash::make('27es0dxl'), // Encripta la contraseña
        ]);
        
        Post::factory(rand(2, 5))
            ->has(Comment::factory(rand(4, 8))) // Crear entre 4 y 8 comentarios por post
            ->create(['user_id' => $qwerty->id]);
        //? Crear 5 usuarios adicionales
        $users = User::factory(5)->create();

        //* Hacer que "qwerty" siga entre 1 y 3 usuarios aleatorios
        $usersToFollow = $users->random(rand(3,6));  // Selecciona entre 1 y 3 usuarios aleatorios

        foreach ($usersToFollow as $user) {
            //* Añadir a "qwerty" como seguidor del usuario aleatorio
            $qwerty->following()->attach($user->id);
        }

        //? Crear 3 conversaciones en total
        for ($i = 0; $i < 6; $i++) {
            $conversation = Conversation::factory()->create();
            // *Seleccionar entre 2 y 4 usuarios aleatorios, además de "qwerty"
            $participants = $users->random(rand(2, 4))->pluck('id')->toArray();
            $participants[] = $qwerty->id; // Asegurar que "qwerty" esté en todas las conversaciones
            // * Asociar usuarios a la conversación
            $conversation->users()->attach($participants);
            // ? Crear 5 mensajes alternando entre los participantes
            Message::factory(5)->create(['conversation_id' => $conversation->id])
                ->each(function ($message, $index) use ($participants) {
                    $message->update([
                        'user_id' => $participants[$index % count($participants)]
                    ]);
                });
        }

        // ? Crear entre 2 y 5 posts para cada usuario, con entre 4 y 8 comentarios por post
        $users->each(function ($user) {
            // ? Crear entre 2 y 5 posts
            foreach(range(1,1) as $i){
                Post::factory(rand(2, 5))
                    ->has(Comment::factory(rand(4, 8))) // Crear entre 4 y 8 comentarios por post
                    ->has(Like::factory(rand(4,8)))
                    ->create(['user_id' => $user->id]);
            }
        });
    }
}
