<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $search = '';
    public $admin = '';
    public $sortBy = 'created_at';
    public $sortDir = 'desc';
    public $editMode = false;
    public $editingUser;
    public $showAddUserModal = false;
    public $name;
    public $email;
    public $is_admin;
    public $user;

    public $newedited;

    public function showAddUserForm()
    {
        $this->resetValidation();
        $this->editMode = false;
        $this->showAddUserModal = true;
    }

    public function createUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'is_admin' => 'required|boolean',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'is_admin' => $this->is_admin,
        ]);

        $this->closeAddUserModal();
        $this->resetFormFields();
        session()->flash('message', 'New User Added Successfully');
    }

    public function closeAddUserModal()
    {
        $this->reset(['name', 'email', 'is_admin', 'showAddUserModal']);
    }

    public function edit($userId)
    {
        $this->editingUser = User::findOrFail($userId);
        $this->editMode = true;
    }

    public function cancelEdit()
    {
        $this->editMode = false;
        $this->resetErrorBag();
    }

    public function updateUser()
    {
        // Check if editingUser is not null
        if ($this->editingUser) {
            // Log the editingUser before update
            \Log::error('Before Update - Name: ' . $this->editingUser->name . ', Email: ' . $this->editingUser->email . ', Is Admin: ' . $this->editingUser->is_admin);

            // Validate the form fields
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'is_admin' => 'required|boolean',
            ]);

            // Find the user by ID
            $user = User::findOrFail($this->editingUser->id);

            // Log the user before update
            \Log::error('Before Update - User: ' . $user);

            // Update user data
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'is_admin' => $this->is_admin,
            ]);


            // Log the user after update
            \Log::error('After Update - User: ' . $user);

            // Reset edit mode
            $this->editMode = false;

            // Flash success message
            session()->flash('message', 'User Updated Successfully');
        } else {
            // If editingUser is null, handle the error or log it
            // For example, you can log an error message:
            \Log::error('editingUser is null when trying to update user.');
        }
    }



    public function delete(User $user)
    {
        $user->delete();
    }

    public function setSortBy($sortBy)
    {
        if ($this->sortBy === $sortBy) {
            $this->sortDir = ($this->sortDir == 'asc') ? 'desc' : 'asc';
        } else {
            $this->sortBy = $sortBy;
            $this->sortDir = 'desc';
        }
    }

    public function resetFormFields()
    {
        $this->name = '';
        $this->email = '';
        $this->is_admin = '';
    }

    public function render()
    {
        return view('livewire.users-table', [
            'users' => User::search($this->search)
                ->when($this->admin !== '', function ($query) {
                    $query->where('is_admin', $this->admin);
                })
                ->orderBy($this->sortBy, $this->sortDir)
                ->paginate($this->perPage)
        ]);
    }
}
