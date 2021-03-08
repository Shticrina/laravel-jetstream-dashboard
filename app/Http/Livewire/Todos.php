<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Todo;

class Todos extends Component
{
    use WithPagination;

    public $name, $content, $todo_id;
    protected $todos;
    public $isOpen = 0;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->todos = Todo::latest()->paginate(5);

        return view('livewire.todos.list', [
            'todos' => $this->todos
        ]);
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->name = '';
        $this->content = '';
        $this->todo_id = '';
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'content' => 'required',
        ]);
   
        Todo::updateOrCreate(['id' => $this->todo_id], [
            'name' => $this->name,
            'content' => $this->content
        ]);
  
        session()->flash('message', 
            $this->todo_id ? 'Todo successfully updated.' : 'Todo successfully created.');
  
        $this->closeModal();
        $this->resetInputFields();
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $todo = Todo::findOrFail($id);
        $this->todo_id = $id;
        $this->name = $todo->name;
        $this->content = $todo->content;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        Todo::find($id)->delete();
        session()->flash('message', 'Todo successfully deleted.');
    }
}
