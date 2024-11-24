<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Report;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class PostComments extends Component
{
    use WithPagination;

    public Blog $post;

    public int $commentId;

    #[Rule('required|min:3|max:200')]
    public string $comment;

    public function postComment()
    {
        //dd($this->comment);
        $this->validateOnly('comment');

        $this->post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $this->comment,
        ]);

        $this->reset('comment');
    }

    public function deleteComment(int $commentId)
    {
        $comment = $this->post->comments()->find($commentId);

        if (!$comment) {
            session()->flash('error', 'El comentario no existe.');
            return;
        }

        if ($comment->user_id !== auth()->id()) {
            session()->flash('error', 'No tienes permiso para eliminar este comentario.');
            return;
        }

        $comment->delete();
        session()->flash('success', 'Comentario eliminado con éxito.');
    }

    #[Computed()]
    public function comments()
    {
        return $this?->post?->comments()->latest()->paginate(5);
    }

}
