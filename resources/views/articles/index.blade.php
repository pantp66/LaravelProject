
@extends ('layout')
@section ('content')
<div id="wrapper">
	<div id="page" class="container">
            @foreach( $articles ?? '' as $article)
            <div class ="content">
            <div class="title">
                    <!-- <h3><a href="/articles/{{$article->id}}">{{ $article->title}}</a></h3> we can use the named route in place of-->
                    <h3><a href="{{route('article.show',$article)}}">{{ $article->title}}</a></h3>
                    </div>
                    <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
                    <p><a href="#">{{$article->excerpt}}</a></p>
            </div>
            @endforeach
    </div>
</div>
@endsection