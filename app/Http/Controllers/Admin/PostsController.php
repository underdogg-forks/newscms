<?php

namespace App\Http\Controllers\Admin;

use App\Events\Article\Create;
use App\Events\Article\Delete;
use App\Events\Article\Update;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Posts;

class PostsController extends Controller
{
    public function getPosts()
    {
        $posts = Posts::paginate(15);
        return \Theme::view('admin.posts.index', ['posts' => $posts]);
    }

    public function getDeletedPosts()
    {
        $posts = Posts::onlyTrashed()->all();
        return \Theme::view('admin.posts.deleted', ['posts' => $posts]);

    }

    public function createPost()
    {
        event(new Create());
    }

    public function getPostToUpdate($id)
    {
        $post = Posts::whereId($id)->first();
        return \Theme::view('admin.posts.update', ['post' => $post]);
    }

    public function updatePost()
    {
        event(new Update());
    }

    public function deletePost()
    {
        event(new Delete());
    }
}
