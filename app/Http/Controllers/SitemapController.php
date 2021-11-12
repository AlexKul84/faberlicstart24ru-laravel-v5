<?php

namespace Corp\Http\Controllers;


use Illuminate\Http\Request;

use Corp\Repositories\ArticlesRepository;
use Corp\Article;

class SitemapController extends SiteController
{
    //

    public function sitemap() {
      $posts = Article::get();
      return view('sitemap')->with(compact('posts'));
  }

}
