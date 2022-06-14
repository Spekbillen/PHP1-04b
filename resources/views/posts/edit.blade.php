<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{--            {{ __('Dashboard') }}--}}
        </h2>
    </x-slot>

    <div id="content">
        <div>
            <div class="createPost">
                <h1>Edit Post</h1>
                <hr>
                <form action="/p/{{$post['id']}}" method="post">
                    @csrf
                    @method('PATCH')

                    <div class="createPostForm">
                        <input type="text" placeholder="Title" name="title"
                               value="{{old('title') ? old('title') : $post['title']}}">
                        <br/>
                        <textarea id="txtArea" rows="10" cols="70" placeholder="Text"
                                  name="comment">{{old('comment') ? old('comment') : $post['comment']}}</textarea>
                        <input type="submit" class="btn" value="Save Changes"/>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style="color: red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
