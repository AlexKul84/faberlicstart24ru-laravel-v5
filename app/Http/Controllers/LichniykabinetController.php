<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

use Corp\Repositories\CatalogsRepository;
use Corp\Repositories\ArticlesRepository;

use Config;

class LichniykabinetController extends SiteController
{
    //

    public function __construct(CatalogsRepository $k_rep, ArticlesRepository $a_rep) {

      parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

      $this->k_rep = $k_rep;
      $this->a_rep = $a_rep;
      $this->bar = 'right';

      $this->template = env('THEME').'.lichniy-kabinet';
  }

   public function index(Request $request) {

    $this->title = 'Личный кабинет Фаберлик [Россия]-7 бонусов регистрации';
    $this->keywords = 'Личный кабинет Фаберлик Россия';
    $this->meta_desc = '✎ вход в личный кабинет Фаберлик для незарегистрированных пользователей|Скидка 20%|Действующий каталог Фаберлик|Получай подарки за регистрацию|Плюсы регистрации на официальном сайте Фаберлик';

    $content = view(env('THEME').'.lichniy-kabinet_content')->render();
    $this->vars = array_add($this->vars,'content',$content);

    $articles = $this->getArticles();
    $catalogs = $this->getCatalogs(config('settings.recent_catalogs'));


    $this->contentLeftBar = view(env('THEME').'.leftside_bar')->with(['catalogs' => $catalogs, 'articles' => $articles]);

    return $this->renderOutput();
    }

    protected function getArticles() {
      $where = FALSE;
      $articles = $this->a_rep->get(['title_article','created_at','img','alias','title','title_img','alt_img'],Config::get('settings.home_articles_count'),FALSE,TRUE,TRUE,$where);

      return $articles;
    }

    public function getCatalogs($take) {
      $catalogs = $this->k_rep->get(['title','text','link','img','alt'], $take);
      return $catalogs;
    }

}
