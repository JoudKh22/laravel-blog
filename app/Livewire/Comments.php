<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    public $model; // post veya başka model
    public $newComment = '';

    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|string|max:1000',
        ]);

        $this->model->comments()->create([
            'user_id' => Auth::id(),
            'body' => $this->newComment,
        ]);

        $this->newComment = '';
        $this->emit('commentAdded'); // sayfayı update etmek için
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => $this->model->comments()->latest()->get()
        ]);
    }
}
