<?php

namespace App\Services\Admin\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $tags = $data['tag_ids'];
            unset($data['tag_ids']);
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tags);

            DB::commit();
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            abort(500);
        }

    }

    public function update($post, $data)
    {
        try {
            DB::beginTransaction();

            $tags = $data['tag_ids'];
            unset($data['tag_ids']);
            if(isset($data['preview_image']))
            {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if(isset($data['main_image']))
            {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            $post->update($data);
            $post->tags()->sync($tags);

            DB::commit();
        }
        catch (\Exception $exception)
        {
            DB::rollBack();
            abort(500);
        }
    }
}
