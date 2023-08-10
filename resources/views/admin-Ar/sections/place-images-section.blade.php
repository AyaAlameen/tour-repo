<?php $i = 1; ?>
@foreach ($images as $image)
    @if ($loop->last)
    <div class="products-row">
        <div class="product-cell">
            <span>{{$i++}}</span>
        </div>
        <div class="product-cell">
            <span><img src="{{ asset(str_replace(app_path(),'',$image -> image))}}" alt="product"></span>
        </div>
        <div class="product-cell">
            <span>
                <!-- delete -->
                <a href="#" class="delete" data-toggle="modal" data-target="#deletePic{{$image->id}}" title="حذف"
                    data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                <!-- Modal -->
                <div class="modal fade" id="deletePic{{$image->id}}" tabindex="-1" aria-labelledby="exampleModal2Label"
                    aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content" style="direction:ltr;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="delete-form-{{$image->id}}" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" value="{{$image->id}}" name="image_id" hidden>
                                <input type="text" value="{{$place->id}}" name="id" hidden>
                                <div class="modal-body" style="direction:rtl;">
                                    هل أنت متأكد من أنك تريد حذف هذه الصورة ؟

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        data-dismiss="modal">إغلاق</button>
                                    <button type="submit" id="delete-category-btn-{{$image->id}}" onclick="deleteCategory(`delete-form-{{$image->id}}`, {{$image->id}})" class="app-content-headerButton">نعم</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <!-- end delete -->
        </span>
    </div>
    @else
    <div class="products-row">
        <div class="product-cell">
            <span>{{$i++}}</span>
        </div>
        <div class="product-cell">
            <span><img src="{{ asset(str_replace(app_path(),'',$image -> image))}}" alt="product"></span>
        </div>
        <div class="product-cell">
            <span>
                <!-- delete -->
                <a href="#" class="delete" data-toggle="modal" data-target="#deletePic{{$image->id}}" title="حذف"
                    data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                <!-- Modal -->
                <div class="modal fade" id="deletePic{{$image->id}}" tabindex="-1" aria-labelledby="exampleModal2Label"
                    aria-hidden="true">

                    <div class="modal-dialog">
                        <div class="modal-content" style="direction:ltr;">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="delete-form-{{$image->id}}" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" value="{{$image->id}}" name="image_id" hidden>
                                <input type="text" value="{{$place->id}}" name="id" hidden>
                                <div class="modal-body" style="direction:rtl;">
                                    هل أنت متأكد من أنك تريد حذف هذه الصورة ؟

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close"
                                        data-dismiss="modal">إغلاق</button>
                                    <button type="submit" id="delete-category-btn-{{$image->id}}" onclick="deleteCategory(`delete-form-{{$image->id}}`, {{$image->id}})" class="app-content-headerButton">نعم</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <!-- end delete -->
        </span>
    </div>
    @endif
    @endforeach
