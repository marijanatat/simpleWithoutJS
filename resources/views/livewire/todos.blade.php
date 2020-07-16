<div >
   
       <div class="container w-1/2">
           
              
               <div class="flex items-center mb-4">
                
                       <input class="px-3 py-2 w-2/3 border-solid border-1 border-gray-600  text-md text-gray-600" 
                            type="text" name="addTodo" placeholder="Add things that you have to do "  wire:keydown.enter="addTodo"
                            wire:model="title">
                       {{-- <button class="bg-blue-500 hover:bg-blue-700 text-white  font-bold rounded px-2 py-2" 
                                type="submit" wire:click="addTodo" >Add</button> --}}
                                @if($errors->has('title'))
                                   <div style="color:red">{{$errors->first('title')}}</div>
                                @endif
                </div>
                
    
                <ul class="bg-white border border-gray p-2" style="width: 530px"> 
                    @foreach ($todos as $todo)
                    <li class="flex items-center justify-between border border-gray p-2 mb-2 text-gray-600 font-sembold">
                        <div>
                            <input type="checkbox" wire:change="toggleTodo({{$todo->id}})" {{$todo->completed ?'checked':''}}>
                        <a href="" class="{{$todo->completed ? 'completed' : ''}} text-blue-400 ml-4"
                        onClick="updateTodoPrompt('{{$todo->title}}')|| event.stopImmediatePropagation()"
                            wire:click="updateTodo({{$todo->id}},todoUpdated)"
                            
                            
                            >{{$todo->title}}</a>
                        </div>
                        <div>
                            <button class="bg-red-500 px-2 py-1 text-white rounded" 
                            onClick="confirm('Are you sure?')|| event.stopImmediatePropagation()"
                            wire:click="deleteTodo({{$todo->id}})">&times;</button>
                        </div>
                    </li>
                    @endforeach
                    
                </ul>
       
       </div>
       <script>
        let todoUpdated = '';
        function updateTodoPrompt(title) {
          event.preventDefault();
          todoUpdated = '';
          const todo = prompt('Update Todo', title);
          if (todo === null || todo.trim() === '') {
            console.log('cancel or empty');
            todoUpdated = '';
            return false;
          }
          todoUpdated = todo;
          return true;
        }
    </script>
</div>
