<?php $i = 1; ?>
@foreach ($messages as $message)
    @if ($loop->last)
        <div @if ($loop->first) class="carousel-item active" @else class="carousel-item" @endif>
            <!-- startcard -->
            <div class="card w-auto" style="padding-inline:80px; background-color:var(--header);">
                <div class="card-body">
                    @if ($message->user)
                        <h5 class="card-title" style="color:var(--title-color);">
                            {{ $message->user->user_name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            {{ $message->user->email }}</h6>
                    @endif
                    <p class="card-text" style="color:var(--title-color);">
                        {{ $message->message }}</p>
                    <div class="d-flex" style="justify-content: space-between;">

                        <!-- delete -->
                        <button class="app-content-headerButton"style="font-size:14px;" data-toggle="modal"
                            data-target="#deleteMessage{{ $message->id }}" data-toggle="tooltip">حذف</button>


                        <!-- Modal -->
                        <div class="modal fade" id="deleteMessage{{ $message->id }}" tabindex="-1"
                            aria-labelledby="exampleModal2Label" aria-hidden="true">
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
                                            هل أنت متأكد من أنك تريد حذف هذه الرسالة؟
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="action-button active close"
                                                data-dismiss="modal">إغلاق</button>
                                            <button id="delete-message-btn-{{ $message->id }}"
                                                onclick="deleteMessage(`delete-form-{{ $message->id }}`, {{ $message->id }})"
                                                type="submit" class="app-content-headerButton">نعم</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- end delete -->

                        <div class="d-flex align-items-center">
                            @if (!$message->seen)
                                <form id="seen-form-{{ $message->id }}" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label class="ml-4" for="1">رأيت</label>
                                    <input class="ml-1" name="seen" onclick="seenMessage({{ $message->id }})"
                                        type="checkbox" id="1" />
                                </form>
                            @endif
                            <form id="publish-form-{{ $message->id }}" action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <label class="ml-3" for="2">نشر</label>
                                <input class="ml-1" name="publish" onclick="publishMessage({{ $message->id }})"
                                    @if ($message->publish) checked @endif type="checkbox" id="2" />
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- endcard -->
        </div>
    @else
        <div @if ($loop->first) class="carousel-item active" @else class="carousel-item" @endif>
            <!-- startcard -->
            <div class="card w-auto" style="padding-inline:80px; background-color:var(--header);">
                <div class="card-body">
                    @if ($message->user)
                        <h5 class="card-title" style="color:var(--title-color);">
                            {{ $message->user->user_name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            {{ $message->user->email }}</h6>
                    @endif
                    <p class="card-text" style="color:var(--title-color);">
                        {{ $message->message }}</p>
                    <div class="d-flex" style="justify-content: space-between;">

                        <!-- delete -->
                        <button class="app-content-headerButton"style="font-size:14px;" data-toggle="modal"
                            data-target="#deleteMessage{{ $message->id }}" data-toggle="tooltip">حذف</button>


                        <!-- Modal -->
                        <div class="modal fade" id="deleteMessage{{ $message->id }}" tabindex="-1"
                            aria-labelledby="exampleModal2Label" aria-hidden="true">
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
                                            هل أنت متأكد من أنك تريد حذف هذه الرسالة؟
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="action-button active close"
                                                data-dismiss="modal">إغلاق</button>
                                            <button id="delete-message-btn-{{ $message->id }}"
                                                onclick="deleteMessage(`delete-form-{{ $message->id }}`, {{ $message->id }})"
                                                type="submit" class="app-content-headerButton">نعم</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- end delete -->

                        <div class="d-flex align-items-center">
                            @if (!$message->seen)
                                <form id="seen-form-{{ $message->id }}" action="" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label class="ml-4" for="1">رأيت</label>
                                    <input class="ml-1" name="seen" onclick="seenMessage({{ $message->id }})"
                                        type="checkbox" id="1" />
                                </form>
                            @endif
                            <form id="publish-form-{{ $message->id }}" action="" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <label class="ml-3" for="2">نشر</label>
                                <input class="ml-1" name="publish" onclick="publishMessage({{ $message->id }})"
                                    @if ($message->publish) checked @endif type="checkbox" id="2" />
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- endcard -->
        </div>
    @endif
@endforeach
