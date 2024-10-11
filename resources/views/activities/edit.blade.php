<h1>Edit Activity for {{ $subject->name }}</h1>

<form action="{{ route('subjects.activities.update', [$subject->id, $activity->id]) }}" method="POST">
    @csrf
    @method('PUT')
    
    <label for="type">Activity Type:</label>
    <input type="text" name="type" value="{{ $activity->type }}" required>
    
    <label for="grade">Grade:</label>
    <input type="number" step="0.01" name="grade" value="{{ $activity->grade }}" required>
    
    <label for="date">Date:</label>
    <input type="date" name="date" value="{{ $activity->date }}" required>
    
    <label for="note">Note (optional):</label>
    <textarea name="note">{{ $activity->note }}</textarea>
    
    <button type="submit">Update</button>
</form>
