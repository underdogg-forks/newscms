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
                $posts = Categories::whereSlug($category)->first()->posts;
                \Cache::put('posts-' . $category, $posts);
            } else {
                $posts = \Cache::get('posts-' . $category);
            }
            return \Theme::view('blog.category', ['posts' => $posts]);
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
        if (Posts::whereYear('created_at', '=', $year)->exists()) {
            if (!\Cache::has('post-' . $year)) {
                $posts = Posts::whereYear('created_at', '=', $year);
                \Cache::put('posts-' . $year, $posts);
            } else {
                $posts = \Cache::get('posts-' . $year);
            }
            return \Theme::view('blog.year', ['posts' => $posts]);
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
        if (Posts::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->exists()) {
            if (!\Cache::has('post-' . $year . '-' . $month)) {
                $posts = Posts::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month);
                \Cache::put('posts-' . $year . '-' . $month, $posts);
            } else {
                $posts = \Cache::get('posts-' . $year . '-' . $month);
            }
            return \Theme::view('blog.month', ['posts' => $posts]);
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
        if (Posts::whereSlug($slug)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->exists()) {
            if (!\Cache::has('post-' . $year . '-' . $month . '-' . $slug)) {
                $posts = Posts::whereSlug($slug)->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month);
                \Cache::put('posts-' . $year . '-' . $month . '-' . $slug, $posts);
            } else {
                $posts = \Cache::get('posts-' . $year . '-' . $month . '-' . $slug);
            }
            return \Theme::view('blog.single', ['posts' => $posts]);
        } else {
            return abort(404);
        }
    }
}
