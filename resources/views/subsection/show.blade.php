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

                    <div class="cpost">
                        <a href="/create">
                            <input type="text" placeholder="Create Post">
                        </a>
                    </div>
                    @foreach($subsectionPosts as $key => $post)
                        <div class="post" onclick="postClick({{$post['id']}})">
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
                                <p>
                                    {{$post['comment']}}
                                </p>
                                <div class="postLinks">
                                    <a href="/p/{{$post['id']}}">
                                        <i class="fa-regular fa-comment"></i>
                                        {{count($post['comments'])}} Comments
                                    </a>
                                    <a href="">
                                        <i class="fa-solid fa-share"></i>
                                        Share
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div id="widgetContainer">
                    <div class="widget">

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
