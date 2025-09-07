<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit External System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4">Edit External System</h1>
        <form action="{{ route('external-systems.update', $system->id) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block mb-1">System Name</label>
                <input type="text" name="name" value="{{ $system->name }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Base URL</label>
                <input type="url" name="base_url" value="{{ $system->base_url }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Status</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    <option value="active" {{ $system->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $system->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="maintenance" {{ $system->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</body>
</html>