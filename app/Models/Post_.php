<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [

        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Erik Cahya Pradana",
            "body" => " Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, a. Perferendis eum ullam deserunt ipsum, accusamus animi tempora esse reiciendis amet dicta recusandae ut error veritatis iure placeat voluptates! Natus voluptas maiores tempore sit tenetur minima expedita ratione officia enim nemo quo suscipit magnam perspiciatis facere ipsam hic, minus perferendis laborum laudantium veritatis! Esse et minima voluptas illum blanditiis excepturi, consequatur perferendis autem porro laborum cumque maiores impedit corporis velit cupiditate iusto ab voluptatibus saepe molestias dolore expedita mollitia. Consectetur, saepe, assumenda ut iure mollitia, quisquam alias ex recusandae odit necessitatibus voluptate impedit tenetur provident reprehenderit. Quae temporibus accusamus explicabo."

        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Kadek Indah",
            "body" => " Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, a. Perferendis eum ullam deserunt ipsum, accusamus animi tempora esse reiciendis amet dicta recusandae ut error veritatis iure placeat voluptates! Natus voluptas maiores tempore sit tenetur minima expedita ratione officia enim nemo quo suscipit magnam perspiciatis facere ipsam hic, minus perferendis laborum laudantium veritatis! Esse et minima voluptas illum blanditiis excepturi, consequatur perferendis autem porro laborum cumque maiores impedit corporis velit cupiditate iusto ab voluptatibus saepe molestias dolore expedita mollitia. Consectetur, saepe, assumenda ut iure mollitia, quisquam alias ex recusandae odit necessitatibus voluptate impedit tenetur provident reprehenderit. Quae temporibus accusamus explicabo."
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
