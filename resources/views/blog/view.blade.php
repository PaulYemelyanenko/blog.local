<div class = "container">
	@foreach($article as $value)

	{{ $value->id }}.
	{{ $value->title }}.
	{{ $value->content }} - 
	{{ $value->image }} - 
	{{ $value->created_at }}

	@endforeach
</div>