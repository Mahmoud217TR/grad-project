<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    private function checkWebAdmin(){
        if(!auth()->user()->isWebAdmin()){
            abort(403);
        }
    }

    private function checkSysAdmin(){
        if(!auth()->user()->isSysAdmin()){
            abort(403);
        }
    }

    private function checkSuperAdmin(){
        if(!auth()->user()->isSuperAdmin()){
            abort(403);
        }
    }

    public function panel(){
        $this->checkWebAdmin();
        $database = get_db_full();
        return view('admin.panel',compact('database'));
    }

    public function logs(){
        $this->checkSuperAdmin();
        $log_chunks = Log::latest()->get()->groupBy(function($log){
            return $log->created_at->format('d-m-y');;
        });
        return view('admin.logs',compact('log_chunks'));
    }

    public function log(Log $log){
        $this->checkSuperAdmin();
        return view('admin.log',compact('log'));
    }
}
