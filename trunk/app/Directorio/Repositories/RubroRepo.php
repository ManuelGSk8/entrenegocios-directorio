<?php
namespace Directorio\Repositories;

use Directorio\Entities\Rubros;

class RubroRepo {

    public function find($id)
    {
         return Rubros::find($id);
    }

} 