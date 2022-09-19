<form method="POST" action="{{route('vacancy.delete', ['vacancy' => $vacancy->id])}}"
      onsubmit="return confirm('Are you sure you want to delete this item?');">
    @csrf
    @method('DELETE')
    <input type="submit" value="delete">
</form>
