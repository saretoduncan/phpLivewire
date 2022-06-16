<?php

namespace App\Http\Livewire;

use App\Models\Comments as ModelsComments;

use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    public $newComment;
    // public $initialComments;
    // public function mount() s
    // {
    //     $initialComments = ModelsComments::latest()->get();

    //     $this->comments = $initialComments;
    // }
    public function updated($field)
    {
        $this->validateOnly($field, [
            'newComment' => 'required|max:20'
        ]);
    }
    public function addComment()
    {

        $this->validate(['newComment' => 'required|max:20']);
        $createdComment = ModelsComments::create(['body' => $this->newComment, 'user_id' => 1]);




        $this->newComment = "";
        session()->flash('message', 'Comment was added successfully ');
    }

    public function remove($commentId)
    {
        $comment = ModelsComments::find($commentId);
        $comment->delete();

        session()->flash('message', 'Comment was deleted successfully ');
    }
    public function render()
    {
        return view('livewire.comments', ['comments' => ModelsComments::latest()->paginate(2)]);
    }
}
