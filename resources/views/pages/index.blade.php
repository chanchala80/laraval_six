@extends('welcome')

@section('content')
      

<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($post as $row)
        <div class="post-preview">
          <a href="{{ URL::to('view/post/'.$row->id) }}">
            <img src="{{URL::to($row->image)}}" style="height: 300px;">
            <h2 class="post-title">
              {{$row->title}}
            </h2>
          </a>

          <p class="post-meta">Category
            <a href="{{ URL::to('view/category/'.$row->id) }}">{{$row->name}}</a>
            On Slug {{$row->slug}}</p>
        </div>
        <hr>
        @endforeach
    
            
               <!-- Pager -->
        <div class="clearfix">
          {{ $post->links() }}
        </div>
      </div>
    </div>

@endsection