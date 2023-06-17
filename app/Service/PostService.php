<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Db;
use Mockery\Exception;

class PostService
{
    public function store($data)
    {
        try {
            Db::beginTransaction();
            if (isset($data['tag_id'])) {
                $tagIds = $data['tag_id'];
                unset($data['tag_id']);
            }
            //         else
            //           $tagIds=[];

            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            if (isset($data['prev_image'])) {
                $data['prev_image'] = Storage::disk('public')->put('/images', $data['prev_image']);
            }
            $post = Post::firstOrCreate($data);
            if (isset($tagIds))
                $post->tags()->attach($tagIds);
            Db::commit();
        } catch (Exception $exception) {
            Db::rollback();
            abort(404);
        }
    }

    public function update($data, $post)
    {
        try {
            Db::beginTransaction();
            if (isset($data['tag_id'])) {
                $tagIds = $data['tag_id'];
                unset($data['tag_id']);
            }
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            if (isset($data['prev_image'])) {
                $data['prev_image'] = Storage::disk('public')->put('/images', $data['prev_image']);
            }
            $post->update($data);
            if (isset($tagIds))
                $post->tags()->sync($tagIds);
            Db::commit();
        } catch (Exception $exception) {
            Db::rollback();
            abort(500);
        }
        return $post;
    }
}
