<?php

namespace App\Livewire;

use App\Models\Reply;
use Livewire\Component;
use AuthorizesRequests;

class ShowReply extends Component
{
    public Reply $reply;
    public $body = '';
    public $is_creating = false;
    public $is_editing = false;

    protected $listeners = ['refresh' => '$refresh'];

    public function updatedIsCreating()
    {
        $this->is_editing = false;
        $this->body = '';
    }

    public function updatedIsEditing()
    {
        $this->authorize('update', $this->reply);
        $this->is_creating = false;
        $this->body = $this->reply->body;
    }

    public function render()
    {
        return view('livewire.show-reply');
    }

    public function postChild()
    {
        if (! is_null($this->reply->reply_id)) return;

        // validate
        $this->validate(['body' => 'required']);

        // create
        auth()->user()->replies()->create([
            'reply_id' => $this->reply->id,
            'thread_id' => $this->reply->thread->id,
            'body' => $this->body,
        ]);

        // refresh
        $this->body = '';
        $this->is_creating = false;
        $this->dispatch('refresh')->self();
    }

    public function updateReply()
    {
        $this->authorize('update', $this->reply);
        // validate
        $this->validate(['body' => 'required']);

        // update
        $this->reply->update(['body' => $this->body]);

        // refresh
        $this->is_editing = false;
    }
}
