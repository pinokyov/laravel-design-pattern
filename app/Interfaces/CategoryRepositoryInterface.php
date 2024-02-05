<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface
{
    public function index(array $request);

    public function store(array $request);

    public function show(string $id);

    public function update(array $request, string $id);

    public function destroy(string $id);
}
