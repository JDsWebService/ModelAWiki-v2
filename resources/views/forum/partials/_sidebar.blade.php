<a href="" class="btn btn-success btn-block rounded-0" data-toggle="modal" data-target="#createPostModal">
	<i class="fas fa-plus-circle"></i> New Discussion
</a>


{{-- Categories --}}
<div class="list-group mt-3">
	<a href="{{ route('forum.index') }}" class="list-group-item list-group-item-action border-0">
		<i class="far fa-comment"></i>&nbsp;&nbsp;All Discussions
	</a>
	{{-- List All Active Categories --}}
	@foreach($categories as $category)
		<a href="{{ route('forum.category', $category->slug) }}" class="list-group-item list-group-item-action border-0">
			<span style="color: {{ $category->color }};"><i class="fas fa-square-full"></i></span>&nbsp;&nbsp;{{ $category->name }}
		</a>
	@endforeach
</div>

{{-- Create Post Modal --}}
@include('forum.post.modals.createPost')