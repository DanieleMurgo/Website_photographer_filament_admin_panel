<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Worker;
use App\Models\Project;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{

public function welcome () {
    $projects = Project::orderBy('created_at','desc')->take(5)->get();
    $photos = Photo::orderBy('created_at','desc')->get();
    return view('welcome', compact('projects', 'photos'));
}    

public function about () {
    return view('about');
}

public function contact () {
    $workers = Worker::all();
    return view('contact', compact('workers'));
}

public function sendMail (Request $request) {
    $mailSubtitle = $request->input('mail_subtitle');
    $mailBody = $request->input('mail_body');
    $fromAddress = $request->input('mail_from_address');
    $fullName = $request->input('mail_fullName');
    Mail::to('admin@fatturastudio.it')->send(new ContactMail($mailSubtitle, $mailBody, $fromAddress, $fullName));
    return redirect('/')->with('message', 'Great! Your email has been sent!');
}

public function login () {
    return view('auth.login');
}

public function admin () {
    $projects = Project::orderBy('created_at','desc')->paginate(10);
    $workers = Worker::orderBy('created_at','asc')->paginate(10);
    return view('admin.home', compact ('projects', 'workers'));
}

}