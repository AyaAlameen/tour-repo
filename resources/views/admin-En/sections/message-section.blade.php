<?php $i = 1; ?>
@foreach ($messages as $message)
    @if ($loop->last)
<!-- startcard -->
<div class="card mb-4 w-auto" style="padding-inline:80px; background-color:var(--header);">
    <div class="card-body">
        @if ($message->user)
            <h5 class="card-title" style="color:var(--title-color);">{{ $message->user->user_name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $message->user->email }}</h6>
        @endif
        <p class="card-text" style="color:var(--title-color);">{{ $message->message }}</p>
        <div class="d-flex" style="justify-content: space-between;">
            <div class="d-flex align-items-center">
                @if (!$message->seen)
                    <form id="seen-form-{{ $message->id }}" action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input class="mr-1" name="seen" onclick="seenMessage({{ $message->id }})" type="checkbox" id="1" />
                        <label class="mr-4" 
                            for="1">seen</label>
                    </form>
                @endif
                <form id="publish-form-{{ $message->id }}" action="" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input name="publish" onclick="publishMessage({{ $message->id }})"
                        @if ($message->publish) checked @endif class="mr-1" type="checkbox"
                        id="2" />
                    <label for="2">post</label>
                </form>
            </div>
            <!-- delete -->
            <button data-toggle="modal" data-target="#deleteMessage{{$message->id}}" ata-toggle="tooltip"
                class="app-content-headerButton">Delete</button>

            <!-- Modal -->
            <div class="modal fade" id="deleteMessage{{$message->id}}" tabindex="-1" aria-labelledby="exampleModal2Label"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="delete-form-{{ $message->id }}" action="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id" value="{{ $message->id }}" hidden>
                            <div class="modal-body">
                                Are you sure that you want to delete this message ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="action-button active close"
                                    data-dismiss="modal">Close</button>
                                <button id="delete-message-btn-{{ $message->id }}"
                                    onclick="deleteMessage(`delete-form-{{ $message->id }}`, {{ $message->id }})"
                                    type="submit" class="app-content-headerButton">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end delete -->
    </div>

</div>


<!-- endcard -->
    @else
<!-- startcard -->
<div class="card mb-4 w-auto" style="padding-inline:80px; background-color:var(--header);">
    <div class="card-body">
        @if ($message->user)
            <h5 class="card-title" style="color:var(--title-color);">{{ $message->user->user_name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $message->user->email }}</h6>
        @endif
        <p class="card-text" style="color:var(--title-color);">{{ $message->message }}</p>
        <div class="d-flex" style="justify-content: space-between;">
            <div class="d-flex align-items-center">
                @if (!$message->seen)
                    <form id="seen-form-{{ $message->id }}" action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input class="mr-1" name="seen" onclick="seenMessage({{ $message->id }})" type="checkbox" id="1" />
                        <label class="mr-4" 
                            for="1">seen</label>
                    </form>
                @endif
                <form id="publish-form-{{ $message->id }}" action="" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input name="publish" onclick="publishMessage({{ $message->id }})"
                        @if ($message->publish) checked @endif class="mr-1" type="checkbox"
                        id="2" />
                    <label for="2">post</label>
                </form>
            </div>
            <!-- delete -->
            <button data-toggle="modal" data-target="#deleteMessage{{$message->id}}" ata-toggle="tooltip"
                class="app-content-headerButton">Delete</button>

            <!-- Modal -->
            <div class="modal fade" id="deleteMessage{{$message->id}}" tabindex="-1" aria-labelledby="exampleModal2Label"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="delete-form-{{ $message->id }}" action="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="id" value="{{ $message->id }}" hidden>
                            <div class="modal-body">
                                Are you sure that you want to delete this message ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="action-button active close"
                                    data-dismiss="modal">Close</button>
                                <button id="delete-message-btn-{{ $message->id }}"
                                    onclick="deleteMessage(`delete-form-{{ $message->id }}`, {{ $message->id }})"
                                    type="submit" class="app-content-headerButton">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end delete -->
    </div>

</div>


<!-- endcard -->
    @endif
@endforeach
