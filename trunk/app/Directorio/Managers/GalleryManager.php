<?php

namespace Directorio\Managers;

class GalleryManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'negocio_id'            => '',
            'url_image_small'       => 'required',
            'url_image_large'       => 'required',
            'titulo'                => ''
        ];

        return $rules;
    }

} 