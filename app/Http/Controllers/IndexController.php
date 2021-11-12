<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

use Corp\Repositories\SlidersRepository;
use Corp\Repositories\CatalogsRepository;
use Corp\Repositories\ArticlesRepository;

use Config;

class IndexController extends SiteController

{

  public function __construct(SlidersRepository $s_rep, CatalogsRepository $k_rep, ArticlesRepository $a_rep) {

    parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

    $this->s_rep = $s_rep;
    $this->k_rep = $k_rep;
    $this->a_rep = $a_rep;

    // $this->bar = 'left';

    $this->template = env('THEME').'.index';

}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         //

         $catalogs = $this->getCatalog();

         $content = view(env('THEME').'.content')->with('catalogs',$catalogs)->render();
         $this->vars = array_add($this->vars,'content', $content);

         $sliderItems = $this->getSliders();

         $sliders = view(env('THEME').'.slider')->with('sliders',$sliderItems)->render();
         $this->vars = array_add($this->vars,'sliders',$sliders);

         $this->keywords = 'фаберлик россия, фаберлик россия 2021, каталог фаберлик россия, каталог фаберлик бесплатно россия, фаберлик онлайн россия, смотреть каталог фаберлик россия,фаберлик россия каталог онлайн';
         $this->meta_desc = '♥ Фаберлик самая крупная российская сетевая компания. ♥ Все каталоги Фаберлик 2021 доступны на сайте к просмотру онлайн. ♥ Бесплатная регистрация на официальном сайте Фаберлик ';
         $this->title = 'Фаберлик в России [Faberlic] Смотреть каталог 2021 онлайн';

         $articles = $this->getArticles();


         //dd($articles);

         $this->contentRightBar = view(env('THEME').'.indexBar')->with('articles',$articles)->render();

         return $this->renderOutput();
     }

     protected function getArticles() {
       $where = FALSE;
       $articles = $this->a_rep->get(['title_article','created_at','img','alias','title','desc','title_img','alt_img'],Config::get('settings.home_articles_count'),FALSE,TRUE,TRUE,$where);

       return $articles;
     }


     protected function getCatalog() {

 		    $catalog = $this->k_rep->get('*',Config::get('settings.home_port_count'));

 		    return $catalog;

 	   }

  public function getSliders() {
    $sliders = $this->s_rep->get();

    if($sliders->isEmpty()) {
    return FALSE;
  }

  $sliders->transform(function($item,$key) {

    $item->img = Config::get('settings.slider_path').'/'.$item->img;
    return $item;

  });


    return $sliders;
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
