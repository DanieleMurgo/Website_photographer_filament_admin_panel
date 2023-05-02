<?php

namespace App\Http\Livewire;

use App\Models\Worker;
use Livewire\Component;

class EditWorkerForm extends Component
{
    public $workerId;
    public $name;
    public $surname;
    public $role;
    public $worker;



    protected $rules =[
        'name' => 'required|min:4',
        'surname' => 'required|min:4',
        'role' => 'required|min:4',
        
    ];

    // public function closeModal() {
    //     $this->emit('closeModal', $this->workerId);
    // }

    public function mount($workerId)
    {
        $worker = Worker::find($workerId);
        $this->name = $worker->name;
        $this->surname = $worker->surname;
        $this->role = $worker->role;
        $this->workerId = $workerId;
    }

    public function update()
    {
        $this->validate();
        Worker::find($this->workerId)->update([
            'name' => $this->name,
            'surname' => $this->surname,
            'role' => $this->role,
        ]);

        return redirect()->route('admin')->with('message', "Information related $this->name $this->surname updated!");
     }



    public function render()
    {
        return view('livewire.edit-worker-form');
    }
}