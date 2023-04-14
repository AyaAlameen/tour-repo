
<?php $i = 1; ?>
@foreach($categories as $category)
    @if($loop->last)
    <div class="products-row">
        <button class="cell-more-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
        <div class="product-cell">
            <span>{{$i++}}</span>
        </div>
        <div class="product-cell">
            <span>{{$category->translations()->where('locale', 'ar')->first()->name}}</span>
        </div>
        <div class="product-cell" >
            <img style="height: 75px !important;" src="{{ asset(str_replace(app_path(),'',$category -> image))}}" alt="product">
        </div>
        <div class="product-cell"><button class="app-content-headerButton"><a href="{{route ('sub_category_ar')}}"style="color:var(--title ); text-decoration:none;">التفاصيل</a> </button>
        </div>
        <div class="product-cell">
            <!-- start action -->
            <div class="p-3">
                <!-- delete -->
                <a href="#" class="delete" data-toggle="modal" data-target="#deleteCategory{{$category->id}}" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                <!-- Modal -->
                <div class="modal fade" id="deleteCategory{{$category->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="delete-form-{{$category->id}}" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="id" value="{{$category->id}}" hidden>
                                <div class="modal-body">
                                    هل أنت متأكد من أنك تريد حذف هذا الصنف (<span style="color: #EB455F;">{{$category->translations()->where('locale', 'ar')->first()->name}}</span>) ؟
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
                                    <button id="delete-category-btn-{{$category->id}}" onclick="deleteCategory(`delete-form-{{$category->id}}`, {{$category->id}})" type="submit" class="app-content-headerButton">نعم</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end delete -->

            <!-- edit -->
            <a href="#" class="edit text-success" data-toggle="modal" data-target="#editCategory{{$category->id}}" title="Edit"><i class="fas fa-pen"></i></a>

            <!-- Modal -->
            <div class="modal" id="editCategory{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="edit-form-{{$category->id}}" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;">
                                    <tr> 
                                        <td>الاسم(العربية)</td>
                                        <td ><input type="text" class="toggle text-primary in" value="{{$category->translations()->where('locale', 'ar')->first()->name}}"></td>  
                                        <span style="color: red">@error('name'){{$message}}@enderror</span>
                                    </tr>      
                                    <tr> 
                                        <td>الاسم(الإنجليزية)</td>
                                        <td ><input type="text" class="toggle text-primary in" value="{{$category->translations()->where('locale', 'en')->first()->name}}"></td>  
                                        <span style="color: red">@error('name'){{$message}}@enderror</span>
                                    </tr>      
                                    <tr>
                                        <td>الصورة </td>
                                        <td ><input type="file" name="image" id="img"> 
                                        <label for="img" ><img src="{{ asset(str_replace(app_path(),'',$category -> image))}}" style="padding-top: 5px; border-radius: 0px;"  width="30px" height="50px"></label></td>      
                                        <span style="color: red">@error('image'){{$message}}@enderror</span>
                                    
                                    </tr>  
                                </table>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
                            <button type="submit" id="edit-category-btn-{{$category->id}}" class="app-content-headerButton">حفظ التغييرات</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end edit -->
        </div>
        <!-- end action -->
    </div>
    @else
    <div class="products-row">
        <button class="cell-more-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
        </button>
        <div class="product-cell">
            <span>{{$i++}}</span>
        </div>
        <div class="product-cell">
            <span>{{$category->translations()->where('locale', 'ar')->first()->name}}</span>
        </div>
        <div class="product-cell" >
            <img style="height: 75px !important;" src="{{ asset(str_replace(app_path(),'',$category -> image))}}" alt="product">
        </div>
        <div class="product-cell"><button class="app-content-headerButton"><a href="{{route ('sub_category_ar')}}"style="color:var(--title ); text-decoration:none;">التفاصيل</a> </button>
        </div>
        <div class="product-cell">
            <!-- start action -->
            <div class="p-3">
                <!-- delete -->
                <a href="#" class="delete" data-toggle="modal" data-target="#deleteCategory{{$category->id}}" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                <!-- Modal -->
                <div class="modal fade" id="deleteCategory{{$category->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="delete-form-{{$category->id}}" action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="id" value="{{$category->id}}" hidden>
                                <div class="modal-body">
                                    هل أنت متأكد من أنك تريد حذف هذا الصنف (<span style="color: #EB455F;">{{$category->translations()->where('locale', 'ar')->first()->name}}</span>) ؟
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
                                    <button id="delete-category-btn-{{$category->id}}" onclick="deleteCategory(`delete-form-{{$category->id}}`, {{$category->id}})" type="submit" class="app-content-headerButton">نعم</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end delete -->

            <!-- edit -->
            <a href="#" class="edit text-success" data-toggle="modal" data-target="#editCategory{{$category->id}}" title="Edit"><i class="fas fa-pen"></i></a>

            <!-- Modal -->
            <div class="modal" id="editCategory{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="edit-form-{{$category->id}}" action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;">
                                    <tr> 
                                        <td>الاسم(العربية)</td>
                                        <td ><input id="name_ar_{{$category->id}}" name="name_ar" type="text" class="toggle text-primary in" value="{{$category->translations()->where('locale', 'ar')->first()->name}}"></td>  
                                        <span style="color: red">@error('name_ar'){{$message}}@enderror</span>
                                    </tr>      
                                    <tr> 
                                        <td>الاسم(الإنجليزية)</td>
                                        <td ><input id="name_en_{{$category->id}}" name="name_en" type="text" class="toggle text-primary in" value="{{$category->translations()->where('locale', 'en')->first()->name}}"></td>  
                                        <span style="color: red">@error('name_en'){{$message}}@enderror</span>
                                    </tr>      
                                    <tr>
                                        <td>الصورة </td>
                                        <td ><input id="image_{{$category->id}}" name="image" type="file"> 
                                        <label for="img" ><img src="{{ asset(str_replace(app_path(),'',$category -> image))}}" style="padding-top: 5px; border-radius: 0px;"  width="30px" height="50px"></label></td>      
                                        <span style="color: red">@error('image'){{$message}}@enderror</span>
                                    
                                    </tr>
                                </table>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
                            <button type="submit" id="edit-category-btn-{{$category->id}}" onclick="editCategory('edit-form-{{$category->id}}', {{$category->id}})" class="app-content-headerButton">حفظ التغييرات</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end edit -->
        </div>
        <!-- end action -->
    </div>
    @endif
@endforeach

