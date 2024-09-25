<form
  class="d-inline"
  action="{{route('admin.posts.destroy', $post)}}"
  method="POST"
  onsubmit="return confirm('{{$post->title}} will be deleted.')">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-danger mb-1"><i class="fa-solid fa-trash-can"></i></button>
</form>