@foreach ($comments as $comment)
    @if ($loop->last)
    
{{-- بداية التعليق --}}
<div class="m-5">
    <div class=" d-flex align-items-center">
        @if ($comment->user->image)
        <img src="{{ asset(str_replace(app_path(), '', $comment->user->image)) }}" style="border-radius:50%; margin-left: 10px; "
        width="70px" height="70px">
        @else
        <img src="../img/1656869576_personalimg.jpg" style="border-radius:50%; margin-left: 10px; "
        width="70px" height="70px">
        @endif
        
        <h5>{{$comment->user->user_name}}</h5>
    </div>
    <p class="text-body w-50 text-end" style="margin-left:40%; ">{{$comment->reviews}}
    </p>

</div>
{{-- نهاية التعليق --}}
    @else
{{-- بداية التعليق --}}
<div class="m-5">
    <div class=" d-flex align-items-center">
        @if ($comment->user->image)
        <img src="{{ asset(str_replace(app_path(), '', $comment->user->image)) }}" style="border-radius:50%; margin-left: 10px; "
        width="70px" height="70px">
        @else
        <img src="../img/1656869576_personalimg.jpg" style="border-radius:50%; margin-left: 10px; "
        width="70px" height="70px">
        @endif
        
        <h5>{{$comment->user->user_name}}</h5>
    </div>
    <p class="text-body w-50 text-end" style="margin-left:40%; ">{{$comment->reviews}}
    </p>

</div>
{{-- نهاية التعليق --}}
    @endif
@endforeach
