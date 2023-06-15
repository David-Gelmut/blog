<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class StoreController extends Controller
{
   public function __invoke(StoreRequest $request)
   {
       try {
           $data=$request->validated();
           //  dd($data);
           $tagIds=$data['tag_id'];
           unset($data['tag_id']);
           $data['main_image']=Storage::put('/images',$data['main_image']);
           $data['prev_image']=Storage::put('/images',$data['prev_image']);
           $post=Post::firstOrCreate($data);
           $post->tags()->attach($tagIds);
       }
       catch (Exception $exception)
       {
           abort(404);
       }
       return redirect()->route('admin.post.index');
   }
}
