<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

use Corp\Repositories\CatalogsRepository;
use Corp\Repositories\ArticlesRepository;
use Corp\Repositories\CommentsRepository;
use Corp\Category;

class ArticlesController extends SiteController
{

  public function __construct(CatalogsRepository $k_rep, ArticlesRepository $a_rep, CommentsRepository $c_rep) {

   parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

   $this->k_rep = $k_rep;
   $this->a_rep = $a_rep;
   $this->c_rep = $c_rep;

   $this->bar = 'right';

   $this->template = env('THEME').'.articles';

 }

public function index($cat_alias = FALSE)
 {
     //

     $this->title = 'Обзоры продукции Фаберлик. Акции Фаберлик. Бизнес с Фаберлик';
     $this->keywords = 'обзоры продукции Фаберлик, акции фаберлик, бонусы фаберлик, бизнес с фаберлик';
     $this->meta_desc = 'Обзоры продукции, каталогов. ✿ Акции, бонусы Фаберлик. ✿ Наборы продукции по скидке. ✿ Статьи, новости компании Фаберлик. ✿ Партнёрство, как начать бизнес с Фаберлик. ✿ Основные методы раскрутки';

     $articles = $this->getArticles($cat_alias);

     $content = view(env('THEME').'.articles_content')->with('articles',$articles)->render();
     $this->vars = array_add($this->vars,'content',$content);

     $comments = $this->getComments(config('settings.recent_comments'));
     $catalogs = $this->getCatalogs(config('settings.recent_catalogs'));

     $this->contentLeftBar = view(env('THEME').'.articlesBar')->with(['comments' => $comments,'catalogs' => $catalogs]);

     return $this->renderOutput();
 }

 public function getComments($take){
   $comments = $this->c_rep->get(['text','name','email','article_id','user_id'], $take);

   if($comments) {
     $comments->load('article','user');
   }

   return $comments;
 }

 public function getCatalogs($take) {
   $catalogs = $this->k_rep->get(['title','text','link','img','alt'], $take);
   return $catalogs;
 }

 public function getArticles($alias = FALSE) {

   $where = FALSE;

   if($alias) {
     $id = Category::select('id')->where('alias',$alias)->first()->id;
     $where = ['category_id',$id];
   }

   if($alias == 'stock') {
     $this->title = 'Акции Faberlic';
     $this->keywords = 'акции, акции фаберлик';
     $this->meta_desc = 'Все акции Фаберлик (Faberlic) в одном месте. ✿ Акции для новичков, постоянные акции, скидки по каталогам. ✿ Наборы продукции по скидке. ✿ Подробное описание всех актуальных акций и скидок';
   }

   if($alias == 'reviews') {
     $this->title = 'Обзоры продукции Faberlic';
     $this->keywords = 'обзоры продукции фаберлик, обзоры, отзывы фаберлик';
     $this->meta_desc = 'Обзоры продукции Фаберлик (Faberlic). ♥ Честные отзывы на продукцию Фаберлик (Faberlic) ♥ Подробное описание продукции Фаберлик (Faberlic) Обзоры новинок ♥ Обзоры каталогов. ♥ Отзывы и описание продукции.';
   }

   if($alias == 'business') {
     $this->title = 'Бизнес с Faberlic';
     $this->keywords = 'бизнес с фаберлик, бизнес онлайн, заработок в интернете';
     $this->meta_desc = 'Как начать свой бизнес с Фаберлик. ✿ Обучение бизнесу онлайн с Фаберлик с наименьшими вложениями. ✿ Основные методы раскрутки структуры Фаберлик. ✿ Статьи о бизнесе с Фаберлик';
   }

 $articles = $this->a_rep->get(['id','title_article','alias','created_at','img','desc','user_id','category_id','title','keywords','meta_desc','title_img','alt_img'],FALSE,TRUE,TRUE,$where);

 if($articles) {
   $articles->load('user','category','comments');
 }

 return $articles;

}

  public function show($alias = FALSE){
    $article = $this->a_rep->one($alias,['comments' => TRUE]);

    if($article){
      $article->img = json_decode($article->img);
    }

    //dd($article->comments->groupBy('parent_id'));

    $this->title = $article->title;
    $this->keywords = $article->keywords;
    $this->meta_desc = $article->meta_desc;

    $content = view(env('THEME').'.article_content')->with('article',$article)->render();
		$this->vars = array_add($this->vars,'content',$content);

    $comments = $this->getComments(config('settings.recent_comments'));
    $catalogs = $this->getCatalogs(config('settings.recent_catalogs'));

    $this->contentLeftBar = view(env('THEME').'.articlesBar')->with(['comments' => $comments,'catalogs' => $catalogs]);


    return $this->renderOutput();
  }

}
