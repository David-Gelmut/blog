<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
   public function __invoke(UpdateRequest $request, Post $post)
   {
       $data=$request->validated();
       $data['main_image']=Storage::put('/images',$data['main_image']);
       $data['prev_image']=Storage::put('/images',$data['prev_image']);
       $post->update($data);
       return view('admin.post.show',['post'=>$post]);
   }
}
