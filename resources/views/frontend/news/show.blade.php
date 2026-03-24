@extends('layouts.frontend')

@section('title', $post->title . ' - Union Lubricants')

@section('content')
<!-- PAGE TITLE BANNER -->
<div class="section banner-page about" style="background: url({{ asset('frontend/images/bgoverlay.jpg') }});background-attachment: fixed;background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="title-page">{{ $post->title }}</div>
				<ol class="breadcrumb">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li><a href="{{ route('news.index') }}">News</a></li>
					<li class="active">{{ Str::limit($post->title, 50) }}</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<!-- NEWS DETAIL SECTION -->
<div class="section why overlap">
	<div class="container">
		<div class="row">
			<!-- SIDEBAR -->
			<div class="col-sm-4 col-md-4 col-md-push-8">
				<!-- Back to News Widget -->
				{{-- <div class="widget download">
					<a href="{{ route('news.index') }}" class="btn btn-secondary btn-block btn-sidebar">
						<span class="fa fa-arrow-left"></span> Back to News
					</a>
				</div> --}}

				<!-- Recent Posts Widget -->
				<div class="widget categories">
					<h4 class="widget-title">Recent Posts</h4>
					<ul class="category-nav">
						@php
							$recentPosts = \App\Models\Post::where('is_published', 1)
								->orderBy('created_at', 'desc')
								->limit(5)
								->get();
						@endphp
						@foreach($recentPosts as $recent)
						<li>
							<a href="{{ route('news.show', $recent->slug) }}">{{ Str::limit($recent->title, 35) }}</a>
						</li>
						@endforeach
					</ul>
				</div>

				<!-- Tags Widget -->
				<div class="widget tags">
					<div class="widget-title">
						Tags
					</div>
					<div class="tagcloud">
						@foreach(explode(',', $post->tags ?? 'Industry,Lubricants,') as $tag)
						<a href="#" title="">{{ trim($tag) }}</a>
						@endforeach
					</div>
				</div>
			</div>

			<!-- MAIN CONTENT -->
			<div class="col-sm-8 col-md-8 col-md-pull-4">
				<div class="single-news">
					<!-- Featured Image -->
					@if($post->featured_image)
					<div class="image">
						<img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="img-responsive">
					</div>
					@endif

					<!-- Title -->
					<h2 class="blok-title">{{ $post->title }}</h2>

					<!-- Meta Information -->
					<div class="meta">
						<div class="meta-date"><i class="fa fa-clock-o"></i> {{ $post->created_at->format('F d, Y') }}</div>
					</div>

					<!-- Excerpt -->
					@if($post->excerpt)
					<blockquote><strong>{{ $post->excerpt }}</strong></blockquote>
					@endif

					<!-- Content -->
					<div class="article-content" style="margin-top: 30px; line-height: 1.8; color: #333;">
						@if($post->body)
							{!! $post->body !!}
						@else
							<p>{{ $post->content ?? 'No content available' }}</p>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
