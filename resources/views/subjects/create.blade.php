<h1>Add New Subject</h1>

<form action="{{ route('subjects.store') }}" method="POST">
    @csrf
    <label for="name">Subject Name:</label>
    <input type="text" name="name" required>
    <button type="submit">Save</button>
</form>
