<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

use Corp\Repositories\CatalogsRepository;
use Corp\Repositories\ArticlesRepository;

use Config;

class OplataController extends SiteController
{
    //

    public function __construct(CatalogsRepository $k_rep, ArticlesRepository $a_rep) {

     parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

     $this->k_rep = $k_rep;
     $this->a_rep = $a_rep;
     $this->bar = 'right';

     $this->template = env('THEME').'.oplata';
    }

    public function index(Request $request) {

     $this->title = 'Способы оплаты заказа Фаберлик [Россия]. Доставка заказов Фаберлик';
     $this->keywords = 'как оплатить фаберлик, заказ фаберлик, доставка фаберлик';
     $this->meta_desc = 'Как пополнить личный счёт на сайте Faberlic Россия. Как оплатить заказ Faberlic. Способы доставки товаров Faberlic. Условия доставки и хранения заказов на пунктах выдачи.';

     $content = view(env('THEME').'.oplata_content')->render();
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
