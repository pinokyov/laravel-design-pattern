<?php

namespace App\Repositories;

use App\Interfaces\SupplierRepositoryInterface;
use App\Models\Supplier;
use Illuminate\Support\Arr;

class SupplierRepository implements SupplierRepositoryInterface
{
    protected int $paginate = 50;

    public function index(array $request)
    {
        $model = Supplier::query();

        //Pagination per page setting.
        if (key_exists('paginate', $request)) {
            $this->paginate = $request["paginate"];
        }

        //Name filter.
        $model->when(key_exists('name', $request), function ($model) use ($request) {
            $model->where('name', 'like', "%{$request["name"]}%");
        });

        //Query has items on relation by method name.
        if (key_exists('has', $request)) {
            foreach ($request["has"] as $has) {
                $model->whereHas($has);
            }
        }

        //Query with relation by method name.
        if (key_exists('with', $request)) {
            foreach ($request["with"] as $with) {
                $model->with($with);
            }
        }

        //Paginate query by request paginate parameter.
        return $model->paginate($this->paginate);
    }

    public function store(array $request)
    {
        return Supplier::create([
            'name',
            'slug',
            'status'
        ]);
    }

    public function show(string $id)
    {
        return Supplier::where('id', $id)->first();
    }

    public function update(array $request, string $id)
    {
        return Supplier::where('id', $id)->update(Arr::only([
            'name',
            'slug',
            'status'
        ], $request));
    }

    public function destroy(string $id)
    {
        return Supplier::where('id',$id)->delete();
    }
}
