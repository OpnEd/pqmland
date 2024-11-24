<?php

namespace App\Livewire;

use App\Models\Report;

use LivewireUI\Modal\ModalComponent;

class PostCommentReport extends ModalComponent
{
    public $commentId;

    public $reportReason;

    public $reportDetails;

    public function submitReport()
    {
        $this->validate([
            'reportReason' => 'required|string|max:255',
            'reportDetails' => 'nullable|string|max:1000',
        ]);

        Report::create([
            'user_id' => auth()->id(),
            'comment_id' => $this->commentId,
            'reason' => $this->reportReason,
            'details' => $this->reportDetails,
        ]);

        session()->flash('success', 'Tu reporte ha sido enviado. Gracias por ayudarnos a mantener la comunidad segura.');
        $this->reset(['reportReason', 'reportDetails']);
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.post-comment-report');
    }
}
