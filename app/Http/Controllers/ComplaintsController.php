<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ComplaintsController extends Controller
{
    public function index(){
        $user = Auth::user();
        // $complaints = Complaint::all();
        $complaints = Complaint::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('complaints.index',compact('user', 'complaints'));

    }

    public function create(Complaint $complaint){

        return view ('complaints.create');

    }

    public function approve(Complaint $complaint){
        return view("complaints.approve",['complaint' => $complaint]);
    }

    public function store(Complaint $complaint){

        request()->validate([
            'category' => "required",
            'description' => "required",

        ]);

        Complaint::create([
            'category'=> request('category'),
            'description'=> request('description'),
            'user_id' => auth()->user()->id,
            'status' => '0'

        ]);

        return redirect('/complaints');

    }

    public function edit(Complaint $complaint){

        return view ('complaints.edit',['complaint' => $complaint]);

    }

    public function update(Complaint $complaint){

        // request()->validate([
        //     'category' => "required",
        //     'description' => "required",

        // ]);
        $complaint->update([
            'category'=>request('category'),
            'description'=>request('description'),
        ]);

        return redirect ('/home');

    }
       public function update_approve(Complaint $complaint){

        // request()->validate([
        //     'category' => "required",
        //     'description' => "required",
        // ]);
      $res = $complaint->update([
            'status'=>request('status'),
        ]);

        return redirect ('/home');

    }

    public function destroy(Complaint $complaint){

        $complaint->delete();

        return redirect('/complaints');

    }
}
