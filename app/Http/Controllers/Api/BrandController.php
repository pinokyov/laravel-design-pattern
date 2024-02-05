<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Brand\StoreRequest;
use App\Http\Requests\Api\Brand\UpdateRequest;
use App\Interfaces\BrandRepositoryInterface;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected string $translationPrefix;
    protected BrandRepositoryInterface $modelRepository;

    public function __construct(BrandRepositoryInterface $modelRepository)
    {
        $this->translationPrefix = "brand";
        $this->modelRepository = $modelRepository;
    }

    public function index(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => getMessage('crud', $this->translationPrefix, 'index'),
            'brands' => $this->modelRepository->index($request->all())
        ]);
    }

    public function store(StoreRequest $request)
    {
        $created = $this->modelRepository->store($request->all());

        if ($created) {

            return response()->json([
                'status' => true,
                'message' => getMessage('crud', $this->translationPrefix, 'store-success'),
                'brand' => $created
            ]);

        }

        return response()->json([
            'status' => false,
            'message' => getMessage('crud', $this->translationPrefix, 'store-error'),
        ]);
    }

    public function show(string $id)
    {
        $show = $this->modelRepository->show($id);

        if ($show) {
            return response()->json([
                'status' => true,
                'message' => getMessage('crud', $this->translationPrefix, 'show-success'),
                'brand' => $show
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => getMessage('crud', $this->translationPrefix, 'show-error'),
        ]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        $update = $this->modelRepository->update($request->all(), $id);
        if ($update) {

            return response()->json([
                'status' => true,
                'message' => getMessage('crud', $this->translationPrefix, 'update-success'),
                'category' => $update
            ]);

        }

        return response()->json([
            'status' => false,
            'message' => getMessage('crud', $this->translationPrefix, 'update-error'),
        ]);
    }

    public function destroy(string $id)
    {
        if ($this->modelRepository->destroy($id)){
            return response()->json([
                'status' => true,
                'message' => getMessage('crud', $this->translationPrefix, 'destroy-success'),
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => getMessage('crud', $this->translationPrefix, 'destroy-error'),
        ]);
    }
}
