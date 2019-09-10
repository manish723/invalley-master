<?php

namespace App\Transformers;


use App\Models\ServiceBlock;

class ServiceBlockTransformer
{
    public function block(ServiceBlock $serviceBlock)
    {
        return [
            'icon' => $serviceBlock->icon,
            'title' => $serviceBlock->title,
            'price' => $serviceBlock->price,
            'priceSubheading' => $serviceBlock->price_subheading,
            'description' => $serviceBlock->description,
            'buttonUrl' => $serviceBlock->button_url,
            'fHighlight' => (bool) $serviceBlock->f_highlight,
            'fActive' => (bool) $serviceBlock->f_active,
            'uuid' => $serviceBlock->uuid
        ];
    }
}