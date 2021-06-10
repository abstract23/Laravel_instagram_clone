@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" style="height:200px;" class="rounded-circle">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username }}</div>
                    
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>
                @can('update', $user->profile) 
                    <a href="/p/create">Add New Post</a>    
                @endcan

            </div>

            @can('update', $user->profile) 
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan
            
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount  }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div></div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row pt-5">
        
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100 h-100">
                </a>
            </div> 
        @endforeach
       


        {{-- <div class="col-4">
            <img src="https://spectrum.ieee.org/image/MzI0NDQ4Ng.jpeg" class="w-100 h-100">
        </div>
        <div class="col-4">
            <img src="https://aeroadmin.com/articles/en/wp-content/uploads/2020/10/coding.jpg" class="w-100 h-100">
        </div>
        <div class="col-4">
            <img src="https://internationaljournalofresearch.files.wordpress.com/2020/06/coding-vs-programming-2.jpg" class="w-100 h-100">
        </div>
        <div class="col-4">
            <img src="https://www.clio.com/wp-content/uploads/2020/08/Clio_2020-Blog_Image-Programming_for_Lawyers.png" class="w-100 h-100">
        </div>
        <div class="col-4">
            <img src="https://media.gcflearnfree.org/content/5e31ca08bc7eff08e4063776_01_29_2020/ProgrammingIllustration.png" class="w-100 h-100">
        </div> --}}
    </div>
</div>
@endsection
