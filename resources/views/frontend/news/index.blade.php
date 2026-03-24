@extends('layouts.frontend')

@section('title', 'Latest News & Blogs - Union Lubricants')

@section('content')
<!-- PAGE TITLE BANNER -->
<div class="section banner-page about" style="background: url({{ asset('frontend/images/bgoverlay.jpg') }});background-attachment: fixed;background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="title-page">Latest News</div>
				<ol class="breadcrumb">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li class="active">News</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<!-- NEWS GRID SECTION -->
<div class="section why overlap">
	<div class="container">
		<div class="row">
			@forelse($posts as $post)
			<div class="col-sm-6 col-md-4">
				<!-- NEWS BOX -->
				<div class="box-news-1">
					<div class="media gbr">
						@if($post->featured_image)
						<img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="img-responsive">
						@else
						<img src="{{ asset('images/600x400.jpg') }}" alt="{{ $post->title }}" class="img-responsive">
						@endif
					</div>
					<div class="body">
						<div class="title"><a href="{{ route('news.show', $post->slug) }}" title="">{{ $post->title }}</a></div>
						<div class="meta">
							<span class="date"><i class="fa fa-clock-o"></i> {{ $post->created_at->format('M d, Y') }}</span>
							{{-- <span class="comments"><i class="fa fa-comment-o"></i> 0 Comments</span> --}}
						</div>
					</div>
				</div>
			</div>
			@empty
			<div class="col-md-12">
				<p class="text-center">No blog posts available at the moment.</p>
			</div>
			@endforelse
		</div>

		<!-- PAGINATION -->
		@if($posts->hasPages())
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<ul class="pagination">
					{{ $posts->links() }}
				</ul>
			</div>
		</div>
		@endif
	</div>
</div>


@endsection
