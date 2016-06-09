@foreach($posts as $post)
    {{ $post->slug }}
    {{ $post->title }}
    {{ $post->content }}
    {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->published_at)->toIso8601String() }}
@endforeach