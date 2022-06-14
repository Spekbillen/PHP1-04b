<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{--    <div class="py-12">--}}
    {{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
    {{--            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
    {{--               <div class="p-6 bg-white border-b border-gray-200">--}}
    {{--                    --}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div id="content">
        <div>
            <div class="home">
                <div>
                    {{--                    @foreach($posts as $key => $post)--}}
                    <div class="post">
                        <div class="postVotes">
                            <i class="fa-solid fa-chevron-up"></i>
                            <p>{{$post['up_votes'] - $post['down_votes']}}</p>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <div class="postMain">
                            <div>
                                <b>r/{{$post['subsection']['name']}}</b>
                                <p>&nbsp;&#8226;&nbsp;</p>
                                <p>Posted by u/{{$post['user']['name']}}</p>
                            </div>
                            <h1>{{$post['title']}}</h1>
                            <p class="reset-this">
                                {{$post['comment']}}
                            </p>
                            <div class="postLinks">
                                <a href="">
                                    <i class="fa-regular fa-comment"></i>
                                    {{count($post['comments'])}} Comments
                                </a>
                                <a href="">
                                    <i class="fa-solid fa-share"></i>
                                    Share
                                </a>
                                @if(isset(Auth::user()->id) ? Auth::user()->id === $post['user']['id'] || Auth::user()->hasRole('administrator') : '')
                                    <a href="/p/{{$post['id']}}/edit">
                                        <i class="fa-solid fa-pen"></i>
                                        Edit
                                    </a>
                                    <form action="" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a href="">
                                            <i class="fa-solid fa-trash-can"></i>
                                            <input type="submit" value="Delete">
                                        </a>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="post" style="flex-direction: column; cursor: default">
                        <form action="" method="post" class="commentForm">
                            @csrf
                            <textarea name="comment" id="comment" rows="4"></textarea>
                            <input type="submit" value="Post Comment" class="btn">
                        </form>
                        <hr>
                        @foreach($comments as $key => $comment)
                            <div class="comment">
                                <div class="commentHeader">
                                    <img src="{{ URL::to('/') }}/images/profile.png" alt="Image"/>
                                    <h1><a href="">{{$comment['user']['name']}}</a></h1>
                                </div>
                                <div>
                                    <p>
                                        {{$comment['comment']}}
                                    </p>
                                    <div class="commentButton"
                                         style="padding: 0; align-items: center; flex-direction: row">
                                        <i class="fa-solid fa-chevron-up"></i>
                                        <p style="padding: 0 3px">{{$comment['up_votes'] - $comment['down_votes']}}</p>
                                        <i class="fa-solid fa-chevron-down"></i>
                                        <p>&nbsp;</p>
                                        @if(isset(Auth::user()->id) ? Auth::user()->id === $comment['id'] || Auth::user()->hasRole('administrator') : '')
                                            <a href="/c/{{$comment['id']}}/edit">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <form action="/c/{{$comment['id']}}" method="post" class="flex">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"><i class='fa-solid fa-trash-can'></i></button>
                                            </form>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{--                    @endforeach--}}
                </div>
                <div id="widgetContainer">
                    <div class="widget">

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
