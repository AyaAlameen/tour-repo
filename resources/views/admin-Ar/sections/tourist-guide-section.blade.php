
<?php $i = 1; ?>
@foreach($guides as $guide)
    @if($loop->last)
    <div class="products-row">
            <button class="cell-more-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
            </button>
            <div class="product-cell">
                <span>{{$i++}}</span>
            </div>
            <div class="product-cell">
                <span class="search-value">{{$guide->translations()->where('locale', 'ar')->first()->name}}</span>
            </div>
            <div class="product-cell">
                <img src="{{ asset(str_replace(app_path(),'',$guide -> image))}}" alt="product">
            </div>
            <div class="product-cell">
                <span>{{$guide->phone}}</span>
            </div>
            <div class="product-cell">
                <span>{{$guide->email}}</span>
            </div>
            <div class="product-cell">
                <span>{{$guide->salary}}</span>
            </div>
            <div class="product-cell">
                <span>{{$guide->translations()->where('locale', 'ar')->first()->description}}</span>
            </div>
            <div class="product-cell">
                <span>{{$guide->translations()->where('locale', 'ar')->first()->certificates}}</span>
            </div>
            <div class="product-cell">
                <!-- start action -->
                <div class="p-3">
                    <!-- delete -->
                    <a href="#" class="delete" data-toggle="modal" data-target="#deleteGuide{{$guide->id}}" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteGuide{{$guide->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="delete-form-{{$guide->id}}" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" value="{{$guide->id}}" hidden>
                                    <div class="modal-body">
                                        هل أنت متأكد من أنك تريد حذف هذا الدليل السياحي (<span style="color: #EB455F;">{{$guide->translations()->where('locale', 'ar')->first()->name}}</span>) ؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
                                        <button type="submit" id="delete-guide-btn-{{$guide->id}}" onclick="deleteGuide(`delete-form-{{$guide->id}}`, {{$guide->id}})" class="app-content-headerButton">نعم</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end delete -->
                    <!-- edit -->
                    <a href="#" class="edit" data-toggle="modal" data-target="#editGuide{{$guide->id}}" title="Edit"><i class="fas fa-pen"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="editGuide{{$guide->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="edit-form-{{$guide->id}}" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;">
                                            <tr>
                                                <td ><input type="text" class="toggle text-primary in" name="name_ar" required style="width: 100%;" value="{{$guide->translations()->where('locale', 'ar')->first()->name}}"></th>   
                                                <td>الاسم(العربية)</td>   
                                            </tr>  
                                            <tr>
                                                <td ><input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;" value="{{$guide->translations()->where('locale', 'en')->first()->name}}"></th>   
                                                <td>(الإنجليزية)الاسم </td>   
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="file" name="image" id="img"> 
                                                    <label for="img" >
                                                        <img src="{{ asset(str_replace(app_path(),'',$guide -> image))}}" style="padding-top: 5px; border-radius: 0px;"  width="30px" height="50px">
                                                    </label>
                                                </td>      
                                                <td>الصورة </td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" name="phone" class="toggle text-primary in" value="{{$guide->phone}}"></td>  
                                                <td>الهاتف</td>
                                            </tr>     
                                            <tr>
                                                <td><input type="email" name="email" class="toggle text-primary in" value="{{$guide->email}}"></td>  
                                                <td>الايميل</td>
                                            </tr>
                                            <tr>
                                                    <td><input type="number" name="salary" class="toggle text-primary in" value="{{$guide->salary}}"></td>  
                                                    <td>الراتب</td>
                                            </tr>     
                                            <tr>
                                                <td ><textarea class="toggle text-primary in mt-2"  name="description_ar" required style="width: 100%; height:27.5px;">{{$guide->translations()->where('locale', 'ar')->first()->description}}</textarea></td> 
                                                <td>المهارات(العربية)</td>     
                                            </tr>
                                            <tr>
                                                <td ><textarea class="toggle text-primary in mt-2"  name="description_en" required style="width: 100%; height:27.5px;">{{$guide->translations()->where('locale', 'en')->first()->description}}</textarea></td> 
                                                <td>(الإنجليزية)المهارات</td>     
                                            </tr>
                                            <tr>
                                                <td ><textarea class="toggle text-primary in mt-2"  name="certificates_ar" required style="width: 100%; height:27.5px;">{{$guide->translations()->where('locale', 'ar')->first()->certificates}}</textarea></td> 
                                                <td>(العربية)الشهادات</td>     
                                            </tr>
                                            <tr>
                                                <td ><textarea class="toggle text-primary in mt-2"  name="certificates_en" required style="width: 100%; height:27.5px;">{{$guide->translations()->where('locale', 'en')->first()->certificates}}</textarea></td> 
                                                <td>(الإنجليزية)الشهادات</td>     
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
                                    <button type="submit" id="edit-guide-btn-{{$guide->id}}" onclick="editGuide('edit-form-{{$guide->id}}', {{$guide->id}})"  class="app-content-headerButton">حفظ التغييرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end edit -->
                </div>
                <!-- end action -->
            </div>
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
                <span class="search-value">{{$guide->translations()->where('locale', 'ar')->first()->name}}</span>
            </div>
            <div class="product-cell">
                <img src="{{ asset(str_replace(app_path(),'',$guide -> image))}}" alt="product">
            </div>
            <div class="product-cell">
                <span>{{$guide->phone}}</span>
            </div>
            <div class="product-cell">
                <span>{{$guide->email}}</span>
            </div>
            <div class="product-cell">
                <span>{{$guide->salary}}</span>
            </div>
            <div class="product-cell">
                <span>{{$guide->translations()->where('locale', 'ar')->first()->description}}</span>
            </div>
            <div class="product-cell">
                <span>{{$guide->translations()->where('locale', 'ar')->first()->certificates}}</span>
            </div>
            <div class="product-cell">
                <!-- start action -->
                <div class="p-3">
                    <!-- delete -->
                    <a href="#" class="delete" data-toggle="modal" data-target="#deleteGuide{{$guide->id}}" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteGuide{{$guide->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="delete-form-{{$guide->id}}" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" value="{{$guide->id}}" hidden>
                                    <div class="modal-body">
                                        هل أنت متأكد من أنك تريد حذف هذا الدليل السياحي (<span style="color: #EB455F;">{{$guide->translations()->where('locale', 'ar')->first()->name}}</span>) ؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
                                        <button type="submit" id="delete-guide-btn-{{$guide->id}}" onclick="deleteGuide(`delete-form-{{$guide->id}}`, {{$guide->id}})" class="app-content-headerButton">نعم</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end delete -->
                    <!-- edit -->
                    <a href="#" class="edit" data-toggle="modal" data-target="#editGuide{{$guide->id}}" title="Edit"><i class="fas fa-pen"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="editGuide{{$guide->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="edit-form-{{$guide->id}}" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;">
                                            <tr>
                                                <td ><input type="text" class="toggle text-primary in" name="name_ar" required style="width: 100%;" value="{{$guide->translations()->where('locale', 'ar')->first()->name}}"></th>   
                                                <td>الاسم(العربية)</td>   
                                            </tr>  
                                            <tr>
                                                <td ><input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;" value="{{$guide->translations()->where('locale', 'en')->first()->name}}"></th>   
                                                <td>(الإنجليزية)الاسم </td>   
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="file" name="image" id="img"> 
                                                    <label for="img" >
                                                        <img src="{{ asset(str_replace(app_path(),'',$guide -> image))}}" style="padding-top: 5px; border-radius: 0px;"  width="30px" height="50px">
                                                    </label>
                                                </td>      
                                                <td>الصورة </td>
                                            </tr>
                                            <tr>
                                                <td><input type="number" name="phone" class="toggle text-primary in" value="{{$guide->phone}}"></td>  
                                                <td>الهاتف</td>
                                            </tr>     
                                            <tr>
                                                <td><input type="email" name="email" class="toggle text-primary in" value="{{$guide->email}}"></td>  
                                                <td>الايميل</td>
                                            </tr>
                                            <tr>
                                                    <td><input type="number" name="salary" class="toggle text-primary in" value="{{$guide->salary}}"></td>  
                                                    <td>الراتب</td>
                                            </tr>     
                                            <tr>
                                                <td ><textarea class="toggle text-primary in mt-2"  name="description_ar" required style="width: 100%; height:27.5px;">{{$guide->translations()->where('locale', 'ar')->first()->description}}</textarea></td> 
                                                <td>المهارات(العربية)</td>     
                                            </tr>
                                            <tr>
                                                <td ><textarea class="toggle text-primary in mt-2"  name="description_en" required style="width: 100%; height:27.5px;">{{$guide->translations()->where('locale', 'en')->first()->description}}</textarea></td> 
                                                <td>(الإنجليزية)المهارات</td>     
                                            </tr>
                                            <tr>
                                                <td ><textarea class="toggle text-primary in mt-2"  name="certificates_ar" required style="width: 100%; height:27.5px;">{{$guide->translations()->where('locale', 'ar')->first()->certificates}}</textarea></td> 
                                                <td>(العربية)الشهادات</td>     
                                            </tr>
                                            <tr>
                                                <td ><textarea class="toggle text-primary in mt-2"  name="certificates_en" required style="width: 100%; height:27.5px;">{{$guide->translations()->where('locale', 'en')->first()->certificates}}</textarea></td> 
                                                <td>(الإنجليزية)الشهادات</td>     
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
                                    <button type="submit" id="edit-guide-btn-{{$guide->id}}" onclick="editGuide('edit-form-{{$guide->id}}', {{$guide->id}})"  class="app-content-headerButton">حفظ التغييرات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end edit -->
                </div>
                <!-- end action -->
            </div>
        </div>
    @endif
@endforeach

