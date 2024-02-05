<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Arr;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected int $paginate = 50;

    public function index(array $request)
    {
        $model = Category::query();

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
        return Category::create([
            'parent_id',
            'name',
            'slug',
            'status'
        ]);
    }

    public function show(string $id)
    {
        return Category::where('id', $id)->with('subs')->first();
    }

    public function update(array $request, string $id)
    {
        return Category::where('id', $id)->update(Arr::only([
            'parent_id',
            'name',
            'slug',
            'status'
        ], $request));
    }

    public function destroy(string $id)
    {
        return Category::where('id',$id)->delete();
    }
}
