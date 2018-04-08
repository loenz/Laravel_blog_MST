@extends('layouts.app')

@section('title', $category->title . " - MST")

@section('content')

	<div class="container">
		@forelse ($articles as $article)
			<div class="row">
				<div class="col-sm-5">
					<h2><span style="font-size: small;"># {{$article->id}}</span> <a href="{{route('article', $article->slug)}}">{{$article->title}}</a></h2>
					<p>{!!$article->description_short!!}</p>
				</div>
			</div>
		@empty
			<h2 class="text-center">Пусто</h2>
		@endforelse

		{{$articles->links()}}
	</div>

@endsection