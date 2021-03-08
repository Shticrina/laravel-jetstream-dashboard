<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Users extends Component
{
    use WithPagination;
    
    public $username, $email, $password, $user_id;
    protected $users;
    public $isOpen = 0;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->users = User::latest()->paginate(5);
        
        return view('livewire.users.list', [
            'users' => $this->users
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
        $this->username = '';
        $this->email = '';
        $this->password = '';
        $this->user_id = '';
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
   
        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->username,
            'email' => $this->email,
            'password' => $this->password
        ]);
  
        session()->flash('message', 
            $this->user_id ? 'User successfully updated.' : 'User successfully created.');
  
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
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->username = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        // $this->profile_photo_path = $user->profile_photo_path;
    
        $this->openModal();
    }
     
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'User successfully deleted.');
    }
}
