<?php

namespace App\Services;

use App\Models\ServiceBlock;
use Illuminate\Support\Str;
use File;

class ServiceBlockService
{
    public function getServiceBlocks($activeOnly = true)
    {
        if ($activeOnly) {
            return ServiceBlock::isActive()->orderBy('block_order', 'asc')->get();
        }

        return ServiceBlock::orderBy('block_order', 'asc')->get();
    }

    public function findByUuid($uuid)
    {
        $block = ServiceBlock::uuid($uuid)->first();

        return $block;
    }

    public function upsertServiceBlock($icon, $title, $price, $priceSubheading, $description, $buttonUrl, $highlight, $active, $block = null)
    {
        if (is_null($block)) {
            $block = new ServiceBlock();
            $block->uuid = (string) Str::uuid();
        }

        $block->icon = $icon;
        $block->title = $title;
        $block->price = $price;
        $block->price_subheading = $priceSubheading;
        $block->description = $description;
        $block->button_url = $buttonUrl;
        $block->f_highlight = $highlight;
        $block->f_active = $active;

        try {
            $block->save();
        } catch (\Exception $e) {

        }

        return $block;
    }

    public function getIconList()
    {
        return File::allFiles(public_path('img/icons'));
    }

    public function updateOrder($uuid, $order)
    {
        // Find block
        $block = $this->findByUuid($uuid);

        if (is_null($block)) {
            return false;
        }

        $block->block_order = $order;
        $block->save();

        return true;
    }

    public function delete($uuid)
    {
        // Check service block exists
        $block = ServiceBlock::uuid($uuid)->first();

        if (is_null($block)) {
            return response()->json([
                'errors' => ['Service block not found']
            ], 404);
        }

        $block->delete();

        return response()->json([
            'location' => '/cp/service-blocks'
        ]);
    }
}