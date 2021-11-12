<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

use Corp\Repositories\CatalogsRepository;

class CatalogsController extends SiteController
{
    //

    public function __construct(CatalogsRepository $c_rep) {

     	parent::__construct(new \Corp\Repositories\MenusRepository(new \Corp\Menu));

     	$this->c_rep = $c_rep;

     	$this->template = env('THEME').'.catalogs';

 	}

 	public function index()
     {
         //

        $this->title = 'Действующий каталог Фаберлик|Faberlic|Россия 2021-смотреть онлайн.';
     	 	$this->keywords = 'Фаберлик каталог Россия';
     		$this->meta_desc = 'Действующий каталог Фаберлик  с ценами в российских рублях. Новый каталог Фаберлик в России. Каталог нижнего белья Флоранж. Смотреть каталоги Фаберлик онлайн.';

     		$catalogs = $this->getCatalogs();

        $content = view(env('THEME').'.catalogs_content')->with('catalogs',$catalogs)->render();
        $this->vars = array_add($this->vars,'content',$content);


        return $this->renderOutput();
     }

  public function getCatalogs($take = FALSE,$paginate = TRUE) {
     		 $catalogs = $this->c_rep->get('*',$take,$paginate);
       	 if($catalogs) {
       		$catalogs->load('filter');
       	 }

     		 return $catalogs;
 	}

  public function show($alias){

    $catalogs = $this->c_rep->one($alias);
    $catalogs = $this->getCatalogs(config('settings.other_catalogs'), FALSE);

    $this->title = $catalogs->title;
    $this->keywords = $catalogs->keywords;
    $this->meta_desc = $catalogs->meta_desc;

    $content = view(env('THEME').'.catalog_content')->with(['catalog' => $catalog,'catalogs' => $catalogs])->render();
    $this->vars = array_add($this->vars,'content',$content);

    $catalogs = $this->getCatalogs(config('settings.other_catalogs'), FALSE);

    return $this->renderOutput();
  }
}
