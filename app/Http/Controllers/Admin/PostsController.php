<?php

namespace NewsCMS\Http\Controllers\Admin;

use NewsCMS\Events\Article\Create;
use NewsCMS\Events\Article\Delete;
use NewsCMS\Events\Article\Update;
use NewsCMS\Http\Controllers\Controller;
use NewsCMS\Http\Requests;
use NewsCMS\Posts;

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
