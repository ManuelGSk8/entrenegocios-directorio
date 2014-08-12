<?php
namespace Directorio\Repositories;

use Directorio\Entities\Rubros;

class RubroRepo extends BaseRepo{

    public function getModel()
    {
        return new Rubros;
    }

} 