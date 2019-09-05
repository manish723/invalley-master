<?php

namespace App\Http\Controllers\Cp;

use App\Http\Requests\ServiceBlockEditorRequest;
use App\Services\ServiceBlockService;
use App\Transformers\ServiceBlockTransformer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceBlockController extends Controller
{
    protected $serviceBlockService;
    protected $serviceBlockTransformer;

    public function __construct(ServiceBlockService $serviceBlockService, ServiceBlockTransformer $serviceBlockTransformer)
    {
        $this->serviceBlockService = $serviceBlockService;
        $this->serviceBlockTransformer = $serviceBlockTransformer;

        $this->middleware('auth');
    }

    public function getList()
    {
        return view('cp.service-blocks.list', [
            'iconList' => $this->serviceBlockService->getIconList(),
            'serviceBlocks' => $this->serviceBlockService->getServiceBlocks(false)
        ]);
    }

    public function getAjaxBlock($uuid)
    {
        $block = $this->serviceBlockService->findByUuid($uuid);

        if (is_null($block)) {
            return response()->json([
                'errors' => ['Service block not found']
            ], 404);
        }

        return $this->serviceBlockTransformer->block($block);
    }

    public function postServiceBlock(ServiceBlockEditorRequest $request)
    {
        $block = null;

        if ($request->post('mode') == 'edit') {
            // Check service block exists
            $block = $this->serviceBlockService->findByUuid($request->post('uuid'));

            if (is_null($block)) {
                return response()->json([
                    'errors' => ['Service block not found']
                ], 404);
            }
        }

        // Upsert service block
        $block = $this->serviceBlockService->upsertServiceBlock(
            $request->post('edtServiceBlock_cboIcon'),
            $request->post('edtServiceBlock_txtTitle'),
            $request->post('edtServiceBlock_txtPrice'),
            $request->post('edtServiceBlock_txtPriceSubheading'),
            $request->post('edtServiceBlock_txtDescription'),
            $request->post('edtServiceBlock_txtButtonUrl'),
            $request->post('edtServiceBlock_chkHighlight'),
            $request->post('edtServiceBlock_chkActive'),
            $block
        );

        return response()->json([
            'location' => '/cp/service-blocks'
        ]);
    }

    public function postOrder(Request $request)
    {
        $data = $request->only(['result']);

        foreach ($data['result'] as $result) {
            $item = explode(':', $result);

            // Update order in database
            $this->serviceBlockService->updateOrder($item[0], $item[1]);
        }

        return response()->json([
            'status' => 'success'
        ]);
    }

    public function deleteServiceBlock($uuid)
    {
        return $this->serviceBlockService->delete($uuid);
    }
}
