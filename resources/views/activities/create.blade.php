<h1>Add New Activity for {{ $subject->name }}</h1>

<form action="{{ route('subjects.activities.store', $subject->id) }}" method="POST">
    @csrf
    <label for="type">Activity Type:</label>
    <input type="text" name="type" required>
    
    <label for="grade">Grade:</label>
    <input type="number" step="0.01" name="grade" required>
    
    <label for="date">Date:</label>
    <input type="date" name="date" required>
    
    <label for="note">Note (optional):</label>
    <textarea name="note"></textarea>
    
    <button type="submit">Save</button>
</form>
