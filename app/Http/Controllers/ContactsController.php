<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends SiteController
{
    //

    public function __construct() {

     parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));


     // $this->bar = 'left';

     $this->template = env('THEME').'.contacts';
    }

    public function index(Request $request) {

     $this->title = 'Контакты';

     $this->keywords = '';

     $this->meta_desc = 'Контакты данные владельца сайта faberlic-star.ru констультанта компании Фаберлик (Faberlic). ✿ УНП владельца сайта. ✿ Email, Insagram, телефон для для связи с владельцем сайта faberlic-start24.ru';

     $content = view(env('THEME').'.contacts_content')->render();
     $this->vars = array_add($this->vars,'content',$content);

     // $this->contentLeftBar = view(env('THEME').'.contact_bar')->render();

     return $this->renderOutput();
     }

}
