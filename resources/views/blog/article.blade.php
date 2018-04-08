@extends('layouts.app')

@section('title', $article->meta_title)
@section('meta_keyword', $article->meta_keyword)
@section('meta_description', $article->meta_description)

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<h1>{{$article->title}}</h1>
				<p>{!!$article->description!!}</p>
				<hr />
				Комментарии: 
				<br />
				@if (isset($comments))
					@forelse ($comments as $comment)
						<div class="row">
							<div class="col-sm-5">
								<h2><span style="font-size: small;">#  </span></h2>
								<p>{!!$comment->comment!!}</p>
							</div>
						</div>
					@empty
						<h4 class="text-center">Пока еще никто не оставил...</h4>
					@endforelse
				@endif
				<hr />
				<br>
				@if (Route::has('login'))
        			@auth
					<form class="form-gorizontal" action="{{route('comments.create')}}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="article_slug" value="{{$article->slug}}">
						@include('blog.comments.form');
						<input type="hidden" name="created_by" value="{{Auth::id()}}">
					</form>
					@endauth
				@endif
				<br>
			</div>
		</div>
	</div>

@endsection