<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="uploadDocument" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Document Title</label>
            <input type="text" class="form-control" id="title" wire:model="title" required>
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Select File</label>
            <input type="file" class="form-control" id="file" wire:model="file" required>
            @error('file') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload Document</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Uploader</th>
                <th scope="col">Size</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documents as $document)
            <tr>
                <th scope="row">{{ $document->id }}</th>
                <td>{{ $document->title }}</td>
                <td>{{ $document->uploader->name }}</td>
                <td>{{ $document->size }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
