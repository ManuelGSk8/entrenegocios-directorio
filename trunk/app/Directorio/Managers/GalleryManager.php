<?php

namespace Directorio\Managers;

class GalleryManager extends BaseManager {

    public function getRules()
    {
        $rules = [
            'negocio_id'            => '',
            'url_image_350x350'     => 'required',
            'url_image_800x600'     => 'required',
            'titulo'                => ''
        ];

        return $rules;
    }

} 