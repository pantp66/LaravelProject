@extends('layout')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection
@section('content')
    <div id="wrapper">
        <div id="id" class="Container">
            <h1 class="heading has-text-weight-bold is size-5"> New Articles</h1>

                <form method="POST" action="/articles">
                  @csrf

                    <div class="field">
                        <label class="label" for="title">Title</lable>

                            <div class="control">
                                <input
                                class="input {{$errors->has('title') ? 'is-danger':''}}"
                                type="text"
                                name="title"
                                id="title" 
                                value="{{old('title')}}">
                                @if ($errors->has('title')) <p style="color:red;">{{ $errors->first('title') }}</p> @endif <br>

                            </div>
                    </div>
                    <div class="field">
                        <label class="label" for="excerpt">Excerpt</lable>

                            <div class="control">
                                <textarea
                                class="textarea {{$errors->has('title') ? 'is-danger':''}}"
                                name="excerpt"
                                id="excerpt">
                                {{old('excerpt')}}
                                </textarea>
                                @if ($errors->has('excerpt')) <p style="color:red;">{{ $errors->first('excerpt') }}</p> @endif <br>

                            </div>
                    </div>
                    <div class="field">
                        <label class="label" for="body">Body</lable>

                            <div class="control">
                                <textarea
                                class="textarea {{$errors->has('title') ? 'is-danger':''}}"
                                name="body"
                                id="body">
                                {{old('body')}}
                                </textarea>
                                @if ($errors->has('body')) <p style="color:red;">{{ $errors->first('body') }}</p> @endif <br>

                            </div>
                    </div>
                    <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link" type="submit">Submit</button>
                            </div>
                    </div>

                </form>
        </div>
    </div>
@endsection