@extends('adminLayout-En.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header">
            <h1 class="app-content-headerText">All Messages</h1>

        </div>


        <div class="app-content-actions">
            {{-- <input class="search-bar" placeholder="Search..." type="text"> --}}
            <div class="dropdown toggle text-primary in" style="display:inline-block; ;">

                <label class="dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-expanded="false">
                       <i class="fas fa-filter"></i>
                    Filter messages
                </label>
                <span id="filter-name"></span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <option style="cursor: pointer;" class="dropdown-item" onclick="filterMessages('All messages', 'all')">
                        All messages
                     </option>
                        <option style="cursor: pointer;" class="dropdown-item" onclick="filterMessages('Posted mesaages', 'published')">
                        Posted mesaages
                        </option>
                         <option style="cursor: pointer;" class="dropdown-item" onclick="filterMessages('Mesaages not seen yet', 'seen')">
                            Mesaages not seen yet
                         </option>
                         <form id="filter-form" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" id="filter_input" name="filter" hidden>
                         </form>

                </div>
            </div>
            <div class="app-content-actions-wrapper">

                <div class="nav-item dropdown">
                    <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="Translate"> <i
                            class="fas fa-globe "></i> </button>

                    <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                        <a href="{{ route('message_en') }}" class="dropdown-item">English</a>
                        <a href="{{ route('message_ar') }}" class="dropdown-item">Arabic </a>

                    </div>
                </div>
                <button class="mode-switch" title="Switch Theme" style="margin-left:5px;">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>

            </div>
        </div>
        <div class="products-area-wrapper tableView" id="messages-data">
            @foreach ($messages as $message)
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
            @endforeach
        </div>
    </div>
    </div>
    </div>
@endsection


<script>
    function deleteMessage(formId, id) {
        $("#delete-message-btn-" + id).attr("disabled", true).html('<i class="fa fa-spinner fa-spin"></i>');

        var formData = new FormData(document.getElementById(formId));
        $.ajax({
                url: `{{ route('deleteMessageEn') }}`,
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#messages-data").empty();
                $("#messages-data").append(data);
                $('.close').click();
                $('.parenttrue').attr("hidden", false);
                // clearInput();
            })
            .fail(function() {
                $('.close').click();
                $('.parent').attr("hidden", false);

            })
            .always(function() {
                // Re-enable the submit button and hide the loading spinner
                $("#delete-message-btn-" + id).attr("disabled", false).html('نعم');
            });
    }

    function seenMessage(messageId) {
        console.log('seen');
        var formData = new FormData(document.getElementById(`seen-form-${ messageId }`));
        formData.append('id', messageId);
        $.ajax({
                url: "{{ route('messageSeenEn') }}",
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#messages-data").empty();
                $("#messages-data").append(data);
                $('.parenttrue').attr("hidden", false);
            })
            .fail(function(data) {
                $('.parent').attr("hidden", false);
            });
    }

    function publishMessage(messageId) {
        var formData = new FormData(document.getElementById(`publish-form-${ messageId }`));
        formData.append('id', messageId);
        $.ajax({
                url: "{{ route('messagePublishEn') }}",
                type: "POST",
                data: formData,
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#messages-data").empty();
                $("#messages-data").append(data);
                $('.parenttrue').attr("hidden", false);
            })
            .fail(function(data) {
                $('.parent').attr("hidden", false);
            });
    }

    function filterMessages(title, type){
        document.getElementById(`filter-name`).innerHTML = `${title}`;
        document.getElementById('filter_input').value = `${type}`;



        var formData = new FormData(document.getElementById('filter-form'));
        
        $.ajax({
                url: `{{ route('filterMessageEn') }}`,
                type: "POST",
                data: formData,
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                cache: false,
                contentType: false,
            })
            .done(function(data) {
                $("#messages-data").empty();
                $("#messages-data").append(data);
                $('.close').click();
                // clearInput();
            })
            .fail(function() {
                $('.close').click();
                $('.parent').attr("hidden", false);

            })
            .always(function() {
                
            });
    }
</script>
