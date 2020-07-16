{{-- <div  style="margin-left: 400px;margin-top:25px"> --}}
   <div class="w-1/2 my-10 px-2">
    @error('photos') <span class="error">{{ $message }}</span> @enderror
   

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

    <div wire:loading wire:target="photos">Uploading...</div>
    <div wire:loading wire:target="save">Saving...</div>

    <div
    x-data="{ isUploading: false, progress: 0 }"
    x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false"
    x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress"
    >

    <div @click="$refs.fileInput.click()" class="w-full h-40 shadow-md text-blue-500 text-center text-xl cursor-pointer border-1 border-gray-700 p-16 bg-gray-200 rounded" >Upload images</div>
    <input x-ref="fileInput" type="file" multiple wire:model="photos" class="hidden">

   
    
    <div x-show="isUploading">
        <progress max="100" x-bind:value="progress"></progress>
    </div>
    @if ($photos)
    <div class="mb-2 mt-2 text-blue-400">Photos preview:</div>
    @foreach ($photos as $photo)
    <div  wire:key="{{$loop->index}}" class="p-4 my-3 rounded-lg shadow-md transition-all duration-500 bg-gray-300  border-1 border-gray-700">
        <button class="float-right  bg-red-500 px-2 py-2 text-white rounded" 
        onClick="confirm('Are you sure?')|| event.stopImmediatePropagation()"
        wire:click="remove({{$loop->index}})">&times;</button>
            <div class=" flex justify-center">
                <img src="{{ $photo->temporaryUrl() }}" width="250"> 
                
            </div>
    </div> 
    @endforeach
    <button wire:click.prevent="save" class=" shadow-md bg-blue-500 rounded p-2 text-white mt-2  x">Save</button>
   
@endif
   
</div>
