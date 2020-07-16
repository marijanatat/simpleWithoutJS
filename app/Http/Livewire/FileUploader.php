<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUploader extends Component
{
    use WithFileUploads;
  

    public $photos = [];

    public function save()
    {
        $this->validate([
            'photos.*' => 'image|max:1024', // 1MB Max
        ]);

        foreach ($this->photos as $photo) {
            $photo->store('photos');
        }
        $this->photos=[];
        session()->flash('message','File uploaded!');
    }

    public function remove($index )
    {
        array_splice($this->photos, $index,1);
    }

    // public $photo;
// real time validation
    // public function updatedPhoto()
    // {
    //     $this->validate([
    //         'photo' => 'image|max:1024', // 1MB Max
    //     ]);
    // }

    public function render()
    {
        return view('livewire.file-uploader');
    }

    // public function save()
    // {
    //     $this->validate([
    //         'photo' => 'image|max:1024', // 1MB Max
    //     ]);

    //     $this->photo->store('photos');
    // }
}
