<?php

namespace App\Http\Livewire;

use App\Models\Photo;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class EditProjectForm extends Component
{
    public $projectId;
    public $name;
    public $client;
    public $advertorial_on;
    public $year;
    public $description;
    public $project;
    // public $showImages;
    protected $rules =[
        'name' => 'required|min:4',
        'description'  => 'required|min:20',
        // 'images.*' => 'required|image|max:10240',
        // 'temporary_images.*' => 'required|image|max:10240',
    ];

    protected $messages =[
        'required'=> 'il campo :attribute è richiesto',
        'min'=> 'il campo :attribute è troppo corto ',
        // 'temporary_images.required' => 'L\'immagine è richiesta',
        // 'temporary_images.*.image' => 'I file devono essere immagini',
        // 'temporary_images.*.max' => 'L\'immagine dev\'essere massimo di 2mb',
    ];

    // public function toggleShowImages()
    // {
    //     $this->showImages = !$this->showImages;
    // }

    public function mount($projectId)
    {
        $project = Project::find($projectId);
        $this->project=$project;
        $this->name = $project -> name;
        $this->client = $project -> client;
        $this->advertorial_on = $project -> advertorial_on;
        $this->year = $project -> year;
        $this->description = $project -> description;
        $this->showImages = true;
    
    }
    public function destroyPhoto(Photo $photo) {

        Storage::delete([$photo->path, $photo->thumb_path]);
        $photo->delete();
        return redirect()->route('project.edit', $this->project)->with('message', "Immagine eliminata correttamente!");
    }

    public function edit() {

            $this->validate();
    
            Project::find($this->projectId)->update(
                [
                    'name'=>$this->name,
                    'client'=>$this->client,
                    'advertorial_on'=>$this->advertorial_on,
                    'year'=>$this->year,
                    'description'=>$this->description,
                ]
            );
            return redirect()->route('admin')->with('message', "Articolo modificato correttamente!");
    }



    public function render()
    {
        return view('livewire.edit-project-form');
    }
}
