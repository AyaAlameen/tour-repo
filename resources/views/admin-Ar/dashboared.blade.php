@extends('adminLayout-Ar.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header">

            <h1 class="app-content-headerText">الرئيسة</h1>


        </div>
        <div class="app-content-actions w-100">
            <input class="search-bar" placeholder="...ابحث" type="text">
            <div class="app-content-actions-wrapper">
                <button type="button" class="btn position-relative action-button mr-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    الرسائل
                    <span class="position-absolute btn-primary top-0 start-100 translate-middle badge rounded-pill mr-3">
                        {{ $messages->count() }}+

                    </span>
                </button>
                <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="max-width:none; height: fit-content;">
                        <div class="modal-content m-auto h-100" style="width: 600px;  background-color:var(--header);">
                            <div class="modal-header">
                                <h5 class="modal-title" style="color:var(--title-color);" id="exampleModalLabel">الرسائل
                                    الواردة</h5>
                                <button type="button" class="btn-close m-0 close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="min-height: 200px;">
                                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false"
                                    data-bs-interval="false">
                                    <div class="carousel-inner" id="messages-data">
                                        @foreach ($messages as $message)
                                            <div
                                                @if ($loop->first) class="carousel-item active" @else class="carousel-item" @endif>
                                                <!-- startcard -->
                                                <div class="card w-auto"
                                                    style="padding-inline:80px; background-color:var(--header);">
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
                                                            <button class="app-content-headerButton"style="font-size:14px;"
                                                                data-toggle="modal"
                                                                data-target="#deleteMessage{{ $message->id }}"
                                                                data-toggle="tooltip">حذف</button>


                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteMessage{{ $message->id }}"
                                                                tabindex="-1" aria-labelledby="exampleModal2Label"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form id="delete-form-{{ $message->id }}"
                                                                            action="" method="POST"
                                                                            enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="text" name="id"
                                                                                value="{{ $message->id }}" hidden>
                                                                            <div class="modal-body">
                                                                                هل أنت متأكد من أنك تريد حذف هذه الرسالة؟
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="action-button active close"
                                                                                    data-dismiss="modal">إغلاق</button>
                                                                                <button
                                                                                    id="delete-message-btn-{{ $message->id }}"
                                                                                    onclick="deleteMessage(`delete-form-{{ $message->id }}`, {{ $message->id }})"
                                                                                    type="submit"
                                                                                    class="app-content-headerButton">نعم</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- end delete -->

                                                            <div class="d-flex align-items-center">
                                                                @if (!$message->seen)
                                                                    <form id="seen-form-{{ $message->id }}" action=""
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <label class="ml-4" for="1">رأيت</label>
                                                                        <input class="ml-1" name="seen"
                                                                            onclick="seenMessage({{ $message->id }})"
                                                                            type="checkbox" id="1" />
                                                                    </form>
                                                                @endif
                                                                <form id="publish-form-{{ $message->id }}" action=""
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <label class="ml-3" for="2">نشر</label>
                                                                    <input class="ml-1" name="publish"
                                                                        onclick="publishMessage({{ $message->id }})"
                                                                        @if ($message->publish) checked @endif
                                                                        type="checkbox" id="2" />
                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- endcard -->
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"
                                            style="background-image:url(../img/previous.png); "
                                            aria-hidden="false"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"
                                            style="background-image:url(../img/next.png);" aria-hidden="false"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <button class="action-button list" title="عرض جدول">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-list">
                        <line x1="8" y1="6" x2="21" y2="6" />
                        <line x1="8" y1="12" x2="21" y2="12" />
                        <line x1="8" y1="18" x2="21" y2="18" />
                        <line x1="3" y1="6" x2="3.01" y2="6" />
                        <line x1="3" y1="12" x2="3.01" y2="12" />
                        <line x1="3" y1="18" x2="3.01" y2="18" />
                    </svg>
                </button>
                <button class="action-button grid" title="عرض لائحة">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-grid">
                        <rect x="3" y="3" width="7" height="7" />
                        <rect x="14" y="3" width="7" height="7" />
                        <rect x="14" y="14" width="7" height="7" />
                        <rect x="3" y="14" width="7" height="7" />
                    </svg>
                </button>

                <div class="nav-item dropdown">
                    <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="ترجمة"> <i
                            class="fas fa-globe"></i> </button>

                    <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                        <a href="{{ route('home_ar') }}" class="dropdown-item"> العربية</a>
                        <a href="{{ route('home_en') }}" class="dropdown-item">الانجليزية </a>

                    </div>
                </div>
                <button class="mode-switch" title="تبديل الثيم">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>
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
                url: `{{ route('deleteMessageDashboardAr') }}`,
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
        var formData = new FormData(document.getElementById(`seen-form-${ messageId }`));
        formData.append('id', messageId);
        $.ajax({
                url: "{{ route('messageSeenDashboardAr') }}",
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
                url: "{{ route('messagePublishDashboardAr') }}",
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
</script>
