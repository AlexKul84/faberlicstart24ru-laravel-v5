<?php

namespace Corp\Repositories;

use Corp\Catalog;

  class CatalogsRepository extends Repository {

    public function __construct(Catalog $catalog) {
      $this->model = $catalog;
    }

    public function one($alias, $attr = array()) {
      $catalog = parent::one($alias, $attr);

      if($catalog && $catalog->img) {
        $catalog->img = json_decode($catalog->img);
      }

      return $catalog;

    }

  }

 ?>
