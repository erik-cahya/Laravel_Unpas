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
        // User::factory(10)->create();

        User::create([
            'name' => 'Erik Cahya Pradana',
            'username' => 'Erikcahya',
            'email' => 'erikcp38@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Kadek Indah Melanie Dewi',
            'username' => 'imellz',
            'email' => 'indahmelanie77@gmail.com',
            'password' => bcrypt('password')
        ]);

        // User::create([
        //     'name' => 'Kadek Indah Melanie Dewi',
        //     'email' => 'indahmelanie77@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Mobile Programming',
            'slug' => 'mobile-programming'
        ]);
        Category::create([
            'name' => 'Desain Grafis',
            'slug' => 'desain-grafis'
        ]);


        // membuat user dengan menggunakan faker & factory
        Post::factory(20)->create();




        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, quisquam exp',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, quisquam exp Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, quisquam explicabo. Dolore facilis harum, perspiciatis corporis nesciunt doloribus eligendi magnam in exercitationem, dicta libero aut at aliquid odio adipisci esse quis iure reiciendis quae reprehenderit error eveniet deleniti. Explicabo tempora esse soluta ea sit eaque laborum at mollitia aperiam laboriosam beatae, a, dolorem sapiente? Fugit culpa omnis illo ex, voluptate sit aut assumenda corrupti minima itaque saepe eveniet hic quisquam, reprehenderit earum voluptatum molestias aperiam placeat maiores iure exercitationem harum dolorem ipsam. Quas, cupiditate dolorem quisquam nam ex amet mollitia ducimus modi vitae repellat nobis commodi quo optio hic eveniet dicta? Officia itaque sunt rem, neque magnam animi in dolorum natus voluptas fuga soluta iste recusandae est! Recusandae eveniet soluta eaque qui nam adipisci sit dolor error! Unde inventore labore voluptatem cum explicabo omnis consequuntur neque! Eius, asperiores blanditiis dolore iure nulla tempore quidem! Alias, placeat. Eligendi labore praesentium possimus.',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, quisquam exp',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, quisquam exp Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, quisquam explicabo. Dolore facilis harum, perspiciatis corporis nesciunt doloribus eligendi magnam in exercitationem, dicta libero aut at aliquid odio adipisci esse quis iure reiciendis quae reprehenderit error eveniet deleniti. Explicabo tempora esse soluta ea sit eaque laborum at mollitia aperiam laboriosam beatae, a, dolorem sapiente? Fugit culpa omnis illo ex, voluptate sit aut assumenda corrupti minima itaque saepe eveniet hic quisquam, reprehenderit earum voluptatum molestias aperiam placeat maiores iure exercitationem harum dolorem ipsam. Quas, cupiditate dolorem quisquam nam ex amet mollitia ducimus modi vitae repellat nobis commodi quo optio hic eveniet dicta? Officia itaque sunt rem, neque magnam animi in dolorum natus voluptas fuga soluta iste recusandae est! Recusandae eveniet soluta eaque qui nam adipisci sit dolor error! Unde inventore labore voluptatem cum explicabo omnis consequuntur neque! Eius, asperiores blanditiis dolore iure nulla tempore quidem! Alias, placeat. Eligendi labore praesentium possimus.',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);

        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, quisquam exp',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, quisquam exp Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, quisquam explicabo. Dolore facilis harum, perspiciatis corporis nesciunt doloribus eligendi magnam in exercitationem, dicta libero aut at aliquid odio adipisci esse quis iure reiciendis quae reprehenderit error eveniet deleniti. Explicabo tempora esse soluta ea sit eaque laborum at mollitia aperiam laboriosam beatae, a, dolorem sapiente? Fugit culpa omnis illo ex, voluptate sit aut assumenda corrupti minima itaque saepe eveniet hic quisquam, reprehenderit earum voluptatum molestias aperiam placeat maiores iure exercitationem harum dolorem ipsam. Quas, cupiditate dolorem quisquam nam ex amet mollitia ducimus modi vitae repellat nobis commodi quo optio hic eveniet dicta? Officia itaque sunt rem, neque magnam animi in dolorum natus voluptas fuga soluta iste recusandae est! Recusandae eveniet soluta eaque qui nam adipisci sit dolor error! Unde inventore labore voluptatem cum explicabo omnis consequuntur neque! Eius, asperiores blanditiis dolore iure nulla tempore quidem! Alias, placeat. Eligendi labore praesentium possimus.',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);


        // Post::create([
        //     'title' => 'Judul Keempat',
        //     'slug' => 'judul-keempat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, quisquam exp',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, quisquam exp Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, quisquam explicabo. Dolore facilis harum, perspiciatis corporis nesciunt doloribus eligendi magnam in exercitationem, dicta libero aut at aliquid odio adipisci esse quis iure reiciendis quae reprehenderit error eveniet deleniti. Explicabo tempora esse soluta ea sit eaque laborum at mollitia aperiam laboriosam beatae, a, dolorem sapiente? Fugit culpa omnis illo ex, voluptate sit aut assumenda corrupti minima itaque saepe eveniet hic quisquam, reprehenderit earum voluptatum molestias aperiam placeat maiores iure exercitationem harum dolorem ipsam. Quas, cupiditate dolorem quisquam nam ex amet mollitia ducimus modi vitae repellat nobis commodi quo optio hic eveniet dicta? Officia itaque sunt rem, neque magnam animi in dolorum natus voluptas fuga soluta iste recusandae est! Recusandae eveniet soluta eaque qui nam adipisci sit dolor error! Unde inventore labore voluptatem cum explicabo omnis consequuntur neque! Eius, asperiores blanditiis dolore iure nulla tempore quidem! Alias, placeat. Eligendi labore praesentium possimus.',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);
    }
}
