<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

class PoliticaController extends SiteController
{
    //

    public function __construct() {

     parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));


     // $this->bar = 'left';

     $this->template = env('THEME').'.politica';
    }

    public function index(Request $request) {

     $this->title = 'Политика конфидициальности';

     $this->keywords = '';

     $this->meta_desc = 'Политика защиты персональных данных [Политика] личного корпоративного сайта-блога faberlic-start24.ru';

     $content = view(env('THEME').'.politica_content')->render();
     $this->vars = array_add($this->vars,'content',$content);

     // $this->contentLeftBar = view(env('THEME').'.contact_bar')->render();

     return $this->renderOutput();
     }

}
