<?php

namespace NewsCMS\Http\Controllers;

use NewsCMS\Categories;
use NewsCMS\Http\Requests;
use NewsCMS\Posts;

class PostsController extends Controller
{
    /**
     * Get all post in a category
     * @param $category
     * @return \Theme
     */
    public function getCategories($category)
    {
        if (Categories::whereSlug($category)->exists()) {
            if (!\Cache::has('posts-' . $category)) {
                $category = Categories::whereSlug($category)->first();
                $posts = Posts::whereCategoryId($category->id)->where('published_at', '!=', null)->get();
                \Cache::put('posts-' . $category, $posts, 5);
            } else {
                $posts = \Cache::get('posts-' . $category);
            }
            return \Theme::view('blog.category', ['posts' => $posts, 'category' => Categories::whereSlug($category)->first()]);
        } else {
            return abort(404);
        }
    }

    /**
     * Get all post in a year
     * @param $year
     * @return \Theme
     */
    public function getYear($year)
    {
        if (Posts::whereYear('created_at', '=', $year)->where('published_at', '!=', null)->exists()) {
            if (!\Cache::has('post-' . $year)) {
                $posts = Posts::whereYear('created_at', '=', $year)->where('published_at', '!=', null)->get();
                \Cache::put('posts-' . $year, $posts, 5);
            } else {
                $posts = \Cache::get('posts-' . $year);
            }
            return \Theme::view('blog.list', ['posts' => $posts]);
        } else {
            return abort(404);
        }
    }

    /**
     * Get all post in a month
     * @param $year
     * @param $month
     * @return \Theme
     */
    public function getMonth($year, $month)
    {
        if (Posts::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->where('published_at', '!=', null)->exists()) {
            if (!\Cache::has('post-' . $year . '-' . $month)) {
                $posts = Posts::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->where('published_at', '!=', null)->get();
                \Cache::put('posts-' . $year . '-' . $month, $posts, 5);
            } else {
                $posts = \Cache::get('posts-' . $year . '-' . $month);
            }
            return \Theme::view('blog.list', ['posts' => $posts]);
        } else {
            return abort(404);
        }
    }

    /**
     * Get a single post
     * @param $year
     * @param $month
     * @param $slug
     * @return \Theme
     */
    public function getSlug($year, $month, $slug)
    {
        if (Posts::whereSlug($slug)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->where('published_at', '!=', null)->exists()) {
            if (!\Cache::has('posts-' . $year . '-' . $month . '-' . $slug)) {
                $post = Posts::whereSlug($slug)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->where('published_at', '!=', null)->first();
                \Cache::put('posts-' . $year . '-' . $month . '-' . $slug, $post, 5);
            } else {
                $post = \Cache::get('posts-' . $year . '-' . $month . '-' . $slug);
            }
            return \Theme::view('blog.single', ['post' => $post]);
        } else {
            return abort(404);
        }
    }
}
