<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use App\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsTableSeeder::class);

        $user = User::create([
            'name' => 'Fabian',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email_verified_at' => now(),
        ]);

        $user->assignRole('Admin');

        foreach(Spatie\Permission\Models\Role::all() as $role) {
          $users = factory(User::class, 20)->create();
          foreach($users as $user){
             $user->assignRole($role);
          }
       }
        factory(Post::class, 20)-> create();
        factory(Comment::class, 20)-> create();
        
    }
}
