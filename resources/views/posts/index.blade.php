@extends('layouts.app')

@section('title') Index @endsection

@section('content')
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
</div>

<table class="table mt-4">
  <thead>
    <tr>
      <!-- <th scope="col">#</th> -->
      <th scope="col">Title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <!-- <td>{{ $post->id }}</td> -->
      <td>{{ $post->title }}</td>
      <td>{{ $post->user ? $post->user->name : 'not found' }}</td>
      <td>{{ $post->created_at->format('Y-m-d') }}</td>
      <td>

        <form id="deleteForm" action="{{ route('posts.destroy', $post->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">View</a>
          <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
            Delete
          </button>
        </form>

        <!-- Bootstrap Delete Confirmation Modal -->
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete this post? This action cannot be undone.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
              </div>
            </div>
          </div>
        </div>

        <script>
        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
          document.getElementById('deleteForm').submit();
        });
        </script>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>

<nav aria-label="Page navigation example">
  {{ $posts->links('pagination::bootstrap-5') }}

</nav>


<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="cancel"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this post?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
        <form id="deleteForm" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete Post</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
  var deleteModal = document.getElementById('deleteModal');
  deleteModal.addEventListener('show.bs.modal', function(event) {
    var button = event.relatedTarget;
    var postId = button.getAttribute('data-postid');
    var form = document.getElementById('deleteForm');
    form.action = "/posts/" + postId; // Ensure the correct URL format

  });
});
</script>
@endsection