<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  // Display a listing of the users
  public function index()
  {
    $users = User::all();
    return view('users.index', compact('users'));
  }

  public function updateRole (Request $request, $id)
  {
    $user = User::find($id);
    $user->role = $request->role;
    $user->save();
    return redirect()->route('roles.index');
  }

  public function isAdmin($id)
  {
    $user = User::find($id);
    return $user->role === 'admin';
  }
}
