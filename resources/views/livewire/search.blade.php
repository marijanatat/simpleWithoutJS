<div class="relative">
   <input wire:model="query" 
          type="text" 
          class="my-2 px-2 border border-gray-500 rounded ml-2" 
          placeholder="search todos "
          wire:keydown.escape="clear"
          wire:keydown.escape="clear"
          wire:keydown.arrow-up="decrementHighlight"
          wire:keydown.arrow-down="incrementHighlight"> 
      
   <div wire:loading class="absolute z-10  bg-white w-full rounded-t-none shadow-lg">
      <div class="">Searching...</div>
  </div>


  @if(!empty($query))
   <div class="fixed top-0 right-0 bottom-0 left-0" wire:click="clear" ></div>
   <div class="absolute z-10  bg-white w-full rounded-t-none shadow-lg">
         @if(!empty($todos))
         <ul>
            @foreach ($todos as $i=>$todo)
                     <a href="">
                        <li class="{{ $highlightIndex === $i ? 'bg-blue-200' : '' }} p-2">
                           {{$todo['title']}}
                        </li>
                     </a>
               
            @endforeach 
         </ul>
        @else
          <div class="">No results!</div>
        @endif
   </div>
  @endif
</div>