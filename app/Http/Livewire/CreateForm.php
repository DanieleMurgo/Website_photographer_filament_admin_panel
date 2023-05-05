<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use App\Jobs\CompactImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateForm extends Component
{   

    use WithFileUploads;

    public $name;
    public $description;
    public $client;
    public $advertorialOn;
    public $year;
    public $temporary_images;
    public $images = [];
    public $project;


    protected $rules =[
        'name' => 'required|min:4',
        'description'  => 'required|min:20',
        'images.*' => 'required|image|max:15360',
        'temporary_images.*' => 'required|image|max:15360',
    ];

    protected $messages =[
        'required'=> 'il campo :attribute è richiesto',
        'min'=> 'il campo :attribute è troppo corto ',
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'L\'immagine dev\'essere massimo di 15mb',
    ];

  

    public function updatedTemporaryImages()
    {
            if($this->validate([
                    'temporary_images.*'=>'image|max:15360',
               ])){
                foreach($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }
   
    public function removeImage($key)
    {
        if(in_array($key, array_keys($this->images))){
        unset($this->images[$key]);
        }
     }


     public function store()
     {
        $this->validate();
        $this->project = Project::create([
            'name' => $this->name,
            'description' => $this->description,
            'client' => $this->client,
            'advertorial_on' => $this->advertorialOn,
            'year' => $this->year
        ]);
        
        if(count($this->images))
        {
            foreach($this->images as $image){
                $newFileName = "projects/{$this->project->id}";
                $newPhoto = $this->project->photos()->create(['path'=>$image->store($newFileName, 'public')]);

// Per lanciare il job per compattare l'immagine
                CompactImage::dispatch($newPhoto->path);
            }

            try {
                File::deleteDirectory(storage_path('app/liwewire-tmp'));
            } catch (Exception $e) {
                echo 'Error deleting directory: ', $e->getMessage(), "\n";
            }
        }
        $this->reset();
        session()->flash('message', 'New project created!');
        return redirect()->route('project.index');
     }
        

        

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);

    }
   

    public function render()
    {   
        return view('livewire.create-form');
    }
}