@extends('layouts.app')

@section('content')
  <div class="bg-white p-3 post-card">
    @if ($post->hasThumbnail())
      <img src="{{ $post->thumbnail->getUrl() }}" alt="{{ $post->thumbnail->name }}" class="card-img-top">
    @endif

    <h1 v-pre>{{ $post->title }}</h1>

    <div class="mb-3">
      <small v-pre class="text-muted">
        <a href="{{ route('users.show', $post->author) }}">
            {{ $post->author->fullname }}
        </a>
      </small>,
      <small class="text-muted">{{ humanize_date($post->posted_at) }}</small>
    </div>

    <div v-pre class="post-content">
      {!! $post->content !!}
    </div>

    <div class="mt-3">
      @include('likes/_likes')
    </div>
  </div>

  @include ('comments/_list')
@endsection
