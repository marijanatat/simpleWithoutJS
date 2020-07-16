@extends('layouts.app')

@section('content')
<div id="app" >
   {{-- <weather></weather> --}}
  {{-- <section>
      <input type="file" wire:model="image" id="image">
  </section> --}}
</div>
@livewire('todos')
{{-- @livewire('fileUploader') --}}
<div class="flex justify-center">
    <livewire:file-uploader>
</div>

@endsection
