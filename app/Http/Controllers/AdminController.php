<?php

namespace App\Http\Controllers;

use App\Models\ProgramAkademik;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'checkPermission']);
    }

    public function dashboard()
    {
        $user = Santri::count();
        $program_akademik = ProgramAkademik::count();

        return view('admin.index', [
            'title' => 'Dashboard',
            'active' => 'admin',
            'user' => $user,
            'program_akademik' => $program_akademik,
        ]);
    }

    public function profile()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('admin.profile', [
            'title' => 'Profile',
            'active' => 'profile',
            'user' => $user
        ]);
    }
}
