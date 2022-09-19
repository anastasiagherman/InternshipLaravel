<form method="POST" action="{{route('company.delete', ['company' => $company->id])}}"
      onsubmit="return confirm('Are you sure you want to delete this item?');">
    @csrf
    @method('DELETE')
    <input type="submit" value="delete">
</form>
