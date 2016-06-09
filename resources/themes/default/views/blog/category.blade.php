@foreach($posts as $post)
    {{ $post->slug }}
    {{ $post->title }}
    {{ $post->content }}
@endforeach