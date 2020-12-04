@extends('welcome')


@section('content')
      

 <div class="container">
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
        	
        	<a href="{{ route('all.post') }}" class="btn btn-info">All Post</a>
        <br>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
         
         @if ($errors->any())
                 <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                 </div>
           @endif

        <form action="{{ url('update/post/'.$post->id) }}" method="post" enctype="multipart/form-data">
        	@csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" value="{{$post->title}}" name="title" required >
            </div>
          </div>
         <br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
               <select class="form-control" name="category_id">
               	@foreach($category as $row)
              	<option value="{{ $row->id }}" <?php if($row->id == $post->category_id) echo"selected"; ?> >{{ $row->name }}</option>
              	@endforeach
              </select>
            </div>
          </div>
           <br>
          <div class="control-group">
            <div class="form-group col-xs-12 ">
              <label>New Image</label>

              	 <input type="file" class="form-control"   name="image" ><br>
                Old Image: <img src="{{ URL::to($post->image) }}" style="height: 70px; width: 90px;">

                <input type="hidden" name="old_photo" value="{{ $post->image }}" >
               
              
            </div>
          </div><br>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" required name="details" >
                {{$post->details}}
              </textarea>
              
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Update</button>
        </form>
      </div>
    </div>
</div>

@endsection

