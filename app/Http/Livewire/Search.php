<?php

namespace App\Http\Livewire;

use App\Todo;
use Livewire\Component;

class Search extends Component
{

    public $query;
    public $todos;
    public $highlightIndex;


    // public function mount()
    // {
    //     $this->clear();
       
    // }

    public function clear()
    {
        $this->query='';
         $this->todos=[];
         $this->highlightIndex=0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->todos) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->todos) - 1;
            return;
        }
        $this->highlightIndex--;
    }

   
 public function updatedQuery()
 {
   
      $this->todos=auth()->user()->todos()->where('title','like','%'.$this->query.'%')->get()->toArray();
    // $this->searched=$todos->where('title','like','%'.$this->query.'%')->get()->toArray();
 }

    public function render()
    {
        return view('livewire.search');
    }
}
