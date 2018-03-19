<div class = "container">
	@foreach($articles as $article)
	
	{{ $article->id }}.
	{{ $article->title }}. 
	{{ $article->content }} - 
	{{ $article->image }} - 
	{{ $article->created_at }}

		

	@endforeach
	
</div>


{{ $articles->links() }}