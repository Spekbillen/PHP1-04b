<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{--            {{ __('Dashboard') }}--}}
        </h2>
    </x-slot>

    <div id="content">
        <div>
            <div class="createPost">
                <h1>Create Post</h1>
                <hr>
                <form action="" method="post">
                    @csrf
                    <select name="subsection" id="">
                        <option value="" disabled selected>Choose community</option>
                        @foreach($subsections as $key => $subsection)
                            <option value="{{$subsection['name']}}">{{$subsection['name']}}</option>
                        @endforeach

                    </select>

                    <div class="createPostForm">
                        <input type="text" placeholder="Title" name="title" value="{{old('title')}}">
                        <br/>
                        <textarea id="txtArea" rows="10" cols="70" placeholder="Text"
                                  name="text">{{old('text')}}</textarea>
                        <input type="submit" class="btn" value="Post"/>
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
