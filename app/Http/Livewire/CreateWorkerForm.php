<?php

namespace App\Http\Livewire;

use App\Models\Worker;
use Livewire\Component;

class CreateWorkerForm extends Component
{

    public $name;
    public $surname;
    public $role;
    public $worker;

    protected $rules =[
        'name' => 'required|min:4',
        'surname' => 'required|min:4',
        'role' => 'required|min:4',
        
    ];

    public function store()
    {
       $this->validate();
       $this->worker = Worker::create([
           'name' => $this->name,
           'surname' => $this->surname,
           'role' => $this->role,
       ]);
       return redirect()->route('admin')->with('message', "New worker created!");
    }

    public function render()
    {
        return view('livewire.create-worker-form');
    }
}
