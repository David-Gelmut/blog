<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends Controller
{
   public function __invoke(UpdateRequest $request, User $user)
   {
       $data=$request->validated();
       $user->update($data);
       return view('admin.users.show',['user'=>$user]);
   }
}
