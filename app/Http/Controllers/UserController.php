<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Users;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;

use App\Models\User;
use Dflydev\DotAccessData\Data;

class UserController extends Controller
{
   
    public function user()
   {
      $data=user::where('role', 'User')->get();
    return view("admin.users.users" ,compact("data"));
   }

   public function deleteuser($id)
   {
      $data=user::find($id);
      $data->delete();
    return redirect() ->back();
   }

   public function edit($id)
{
    $user = User::findOrFail($id);
    return view('admin.users.edit', compact('user'));
}

   public function update(Request $request, User $data)
    {
        $request -> validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $data -> update([
            'name' => $request -> name,
            'email' => $request -> email,
        ]);

        return view("admin.users.users");
    }

   
}
