<?php

namespace App\Livewire\DocumentManagment;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Document;

class Upload extends Component
{
    use WithFileUploads;

    public $documents;
    public $file;
    public $title;

    public function mount()
    {
        $this->documents = Document::all();
    }

    public function uploadDocument()
    {
        $this->validate([
            'file' => 'required|file|max:10240', // 10MB max
            'title' => 'required|string|max:255',
        ]);

        $path = $this->file->store('documents', 'public');

        Document::create([
            'title' => $this->title,
            'uploader_id' => 1, // Replace with actual user ID
            'file_path' => $path,
            'mime_type' => $this->file->getMimeType(),
            'size' => $this->file->getSize(),
        ]);

        $this->documents = Document::all();
        $this->reset(['file', 'title']);
        session()->flash('message', 'Document uploaded successfully.');
    }

    public function render()
    {
        return view('livewire.document-managment.upload', [
            'documents' => $this->documents
        ]);
    }
}
