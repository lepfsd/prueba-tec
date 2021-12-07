<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Role;
use App\User;
use App\File;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $roles = Role::all();
        $role = array();
        foreach ($roles as $item) {
            if ($item->name != 'admin') {
                $role[] = $item;
            }
        }
        
        $users = User::all();

        $files = File::where('user_id', Auth::user()->id)->get();
        
        return view('home', compact('role', 'users', 'files'));
    }


    /**
     * upload files into the app.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv,png,jpg,word,xml|max:2048',
            'user_id' => 'required'
        ]);

        $file_name = time().'.'.$request->file->extension();
        
        $request->file->move(public_path('uploads'), $file_name);

        $file = new File();
        $file->user_id = $request->user_id;
        $file->name = $file_name;
        $file->save();

        return back()
            ->with('success', 'You have successfully upload file.')
            ->with('file', $file_name);
    }

    public function download($name)
    {
        $file = File::where('name', $name)->firstOrFail();
        $pathToFile = storage_path('uploads/' . $file->name);

        return Storage::disk('public')->download($pathToFile);
        //return response()->download($pathToFile);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function ejecutivos()
    {
        if (Auth::user()->roles()->where('name', '=', 'ejecutivos')->exists() && !Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::where('user_id', Auth::user()->id)->get();
        } elseif (Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::all();
        }
        
        return view('config/ejecutivos', compact('files'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cargaMasiva()
    {
        if (Auth::user()->roles()->where('name', '=', 'carga_masiva')->exists() && !Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::where('user_id', Auth::user()->id)->get();
        } elseif (Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::all();
        }
        
        return view('config/carga_masiva', compact('files'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function imagenes()
    {
        if (Auth::user()->roles()->where('name', '=', 'imagenes')->exists() && !Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::where('user_id', Auth::user()->id)->get();
        } elseif (Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::all();
        }
        
        return view('config/imagenes', compact('files'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function sgr()
    {
        if (Auth::user()->roles()->where('name', '=', 'sgr')->exists() && !Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::where('user_id', Auth::user()->id)->get();
        } elseif (Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::all();
        }
        
        return view('config/sgr', compact('files'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function iva()
    {
        if (Auth::user()->roles()->where('name', '=', 'iva')->exists() && !Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::where('user_id', Auth::user()->id)->get();
        } elseif (Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::all();
        }
        
        return view('config/iva', compact('files'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function paises()
    {
        if (Auth::user()->roles()->where('name', '=', 'paises')->exists() && !Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::where('user_id', Auth::user()->id)->get();
        } elseif (Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::all();
        }
        
        return view('config/paises', compact('files'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function monedas()
    {
        if (Auth::user()->roles()->where('name', '=', 'monedas')->exists() && !Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::where('user_id', Auth::user()->id)->get();
        } elseif (Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::all();
        }
        
        return view('config/monedas', compact('files'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function usoPlataforma()
    {
        if (Auth::user()->roles()->where('name', '=', 'uso_plataforma')->exists() && !Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::where('user_id', Auth::user()->id)->get();
        } elseif (Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::all();
        }
        
        return view('config/uso_plataforma', compact('files'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function notaria()
    {
        if (Auth::user()->roles()->where('name', '=', 'notaria')->exists() && !Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::where('user_id', Auth::user()->id)->get();
        } elseif (Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::all();
        }
        
        return view('config/notaria', compact('files'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function submenus()
    {
        if (Auth::user()->roles()->where('name', '=', 'submenus')->exists() && !Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::where('user_id', Auth::user()->id)->get();
        } elseif (Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::all();
        }
        
        return view('config/submenus', compact('files'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function submenuActions()
    {
        if (Auth::user()->roles()->where('name', '=', 'submenu_actions')->exists() && !Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::where('user_id', Auth::user()->id)->get();
        } elseif (Auth::user()->roles()->where('name', '=', 'admin')->exists()) {
            $files = File::all();
        }
        
        return view('config/submenu_actions', compact('files'));
    }
}
