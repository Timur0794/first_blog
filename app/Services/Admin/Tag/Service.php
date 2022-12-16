<?php

namespace App\Services\Admin\Tag;

use App\Models\Tag;

class Service
{
    public function store($data)
    {
        $tag = Tag::create($data);
    }

    public function update($tag, $data)
    {
        $tag->update($data);
    }

}
