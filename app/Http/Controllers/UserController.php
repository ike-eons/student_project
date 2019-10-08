<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
    }

    public function __construct()
    {
        $this->middleware('auth')
                ->except('index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('auth.clearance',compact('user'));
    }

    public function print($id)
    {
        $user = User::findOrFail($id);
        return view('auth.hallticket',compact('user'));
    }
}
