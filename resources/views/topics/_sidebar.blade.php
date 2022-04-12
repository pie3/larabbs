<div class="card">
  <div class="card-body">
    <a class="btn btn-success btn-block" aria-label="Left Align" href="{{ route('topics.create') }}">
      <i class="fas fa-pencil-alt mr-2"></i> 新增帖子
    </a>
  </div>
</div>

@if (count($active_users))
<div class="card mt-4">
  <div class="card-body active-users pt-2">
    <div class="text-center mt-1 mb-0 text-muted">活跃用户</div>
    <hr class="mt-2">
    @foreach ($active_users as $active_user)
    <a class="media mt-2" href="{{ route('users.show', $active_user->id) }}">
      <div class="media-left media-middle mr-2 ml-1">
        <img class="media-object" width="24px" height="24px" src="{{ $active_user->avatar }}">
      </div>
      <div class="media-body">
        <small class="media-heading text-secondary">{{ $active_user->name }}</small>
      </div>
    </a>
    @endforeach
  </div>
</div>
@endif
