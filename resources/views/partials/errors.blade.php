@if(isset($errors)&&count($errors)>0)
   <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button> 
        @foreach ($errors->all() as $error)
            <li><strong>{!! $error !!}</strong></li>
        @endforeach
   </div>
@endif   