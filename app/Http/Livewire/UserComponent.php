<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;

    // Component props
    public $user_id, 
            $name, 
            $email, 
            $password, 
            $password_confirmation, 
            $current_password, 
            $search_term = '',
            $created_at,
            $updated_at;

    // Paginate props
    public $perPage = 10;
    protected $paginationTheme = 'bootstrap';

    // Listeners
    protected $listeners = ['destroy'];

    public function render()
    {
        $this->dispatchBrowserEvent('jquery');
        return view('livewire.user-component', [
            'users' => $this->search_term != '' ? User::where('id', '<>', Auth::user()->id)->search($this->search_term)
                ->paginate($this->perPage)
                :  User::where('id', '<>', Auth::user()->id)->paginate($this->perPage)
        ]);
    }
    
    public function show (User $user) {
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->created_at = $user->created_at;
        $this->updated_at = $user->updated_at;
        $this->emit('showUserDetails');
    }

    public function edit(User $user)
    {
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->emit('showEditForm');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:6|string',
            'email' => ['required', 'email', 'unique:users,email,' . $this->user_id, 'max:255'],
            'password' => isset($this->password) ? 'min:8|max:16|same:password_confirmation' : '',
            'password_confirmation' => isset($this->password) ? 'min:8' : ''
        ]);
        $user = User::find($this->user_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => isset($this->password) ? Hash::make($this->password) : $user->password,
        ]);
        $user->touch();
        $user->updateTimestamps();
        $this->resetFields();
        $this->emit('userUpdated');
        $this->dispatchBrowserEvent('swal', [
            'title' => 'El usuario se actualizó de forma correcta.',
            'position' => 'top-end',
            'icon' => 'success',
            'timer' => 1500,
            'showConfirmButton' => false,
            'toast' => true,
        ]);
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|max:16|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        $validatedData['password'] = Hash::make($this->password);
        User::create($validatedData);
        $this->emit('userStore');
        $this->resetFields();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'El usuario se agregó de forma correcta.',
            'position' => 'top-end',
            'icon' => 'success',
            'timer' => 1500,
            'showConfirmButton' => false,
            'toast' => true,
        ]);
    }

    public function cancel()
    {
        $this->resetFields();
    }

    public function destroy(User $user)
    {
        $user->delete();
        $this->dispatchBrowserEvent('swal', [
            'title' => 'El usuario se eliminó de forma correcta.',
            'position' => 'top-end',
            'icon' => 'success',
            'timer' => 1500,
            'showConfirmButton' => false,
            'toast' => true,
        ]);
    }

    public function resetFields()
    {
        $this->user_id = '';
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
    }
}
