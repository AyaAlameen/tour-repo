
<?php $i = 1; ?>
@foreach($companies as $company)
    @if($loop->last)
    <div class="products-row">
            <button class="cell-more-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
            </button>
            <div class="product-cell">
                <span>{{$i++}}</span>
            </div>
            <div class="product-cell">
                <span class="search-value">{{$company->translations()->where('locale', 'ar')->first()->name}}</span>
            </div>
            <div class="product-cell">
                {{$company->email}}
            </div>
            <div class="product-cell">
                {{$company->phone}}
            </div>
            <div class="product-cell">
            <button class="app-content-headerButton"><a href="" style="color:var(--title ); text-decoration:none;">التفاصيل</a> </button>
         
            </div>
            <div class="product-cell">
                <!-- start action -->
                <div class="p-3">
                    <!-- delete -->
                    <a href="#" class="delete" data-toggle="modal" data-target="#deleteCompany{{$company->id}}" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteCompany{{$company->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="delete-form-{{$company->id}}" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" value="{{$company->id}}" hidden>

                                    <div class="modal-body">
                                        هل أنت متأكد من أنك تريد حذف شركة النقل هذه (<span style="color: #EB455F;">{{$company->translations()->where('locale', 'ar')->first()->name}}</span>) ؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
                                        <button type="submit" id="delete-company-btn-{{$company->id}}" onclick="deleteCompany(`delete-form-{{$company->id}}`, {{$company->id}})" class="app-content-headerButton">نعم</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end delete -->

                    <!-- edit -->
                    <a href="#" class="edit" data-toggle="modal" data-target="#editCompany{{$company->id}}" title="Edit"><i class="fas fa-pen"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="editCompany{{$company->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="edit-form-{{$company->id}}" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;">
                                            <tr>
                                                <td >
                                                    <input type="text" class="toggle text-primary in" name="name_ar" required style="width: 100%;" value="{{$company->translations()->where('locale', 'ar')->first()->name}}">
                                                </td> 
                                                <td>الاسم(العربية)</td>     
                                            </tr>  
                                            <tr>
                                                <td >
                                                    <input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;" value="{{$company->translations()->where('locale', 'en')->first()->name}}">
                                                </td> 
                                                <td>(الإنجليزية)الاسم </td>     
                                            </tr>
                                            <tr> 
                                                <td>
                                                    <input type="email" name="email" class="toggle text-primary in" value="{{$company->email}}">
                                                </td>  
                                                <td>الايميل</td>
                                            </tr>     
                                            <tr> 
                                                <td>
                                                    <input type="number" name="phone" class="toggle text-primary in" value="{{$company->phone}}">
                                                </td>  
                                                <td>الهاتف</td>
                                            </tr>     
                                        </table>
                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
                                    <button type="submit" id="edit-company-btn-{{$company->id}}" onclick="editCompany('edit-form-{{$company->id}}', {{$company->id}})" class="app-content-headerButton">حفظ التغييرات</button>
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
                <span class="search-value">{{$company->translations()->where('locale', 'ar')->first()->name}}</span>
            </div>
            <div class="product-cell">
                {{$company->email}}
            </div>
            <div class="product-cell">
                {{$company->phone}}
            </div>
            <div class="product-cell">
            <button class="app-content-headerButton"><a href="" style="color:var(--title ); text-decoration:none;">التفاصيل</a> </button>
         
            </div>
            <div class="product-cell">
                <!-- start action -->
                <div class="p-3">
                    <!-- delete -->
                    <a href="#" class="delete" data-toggle="modal" data-target="#deleteCompany{{$company->id}}" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteCompany{{$company->id}}" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="delete-form-{{$company->id}}" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" name="id" value="{{$company->id}}" hidden>

                                    <div class="modal-body">
                                        هل أنت متأكد من أنك تريد حذف شركة النقل هذه (<span style="color: #EB455F;">{{$company->translations()->where('locale', 'ar')->first()->name}}</span>) ؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
                                        <button type="submit" id="delete-company-btn-{{$company->id}}" onclick="deleteCompany(`delete-form-{{$company->id}}`, {{$company->id}})" class="app-content-headerButton">نعم</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end delete -->

                    <!-- edit -->
                    <a href="#" class="edit" data-toggle="modal" data-target="#editCompany{{$company->id}}" title="Edit"><i class="fas fa-pen"></i></a>
                    <!-- Modal -->
                    <div class="modal fade" id="editCompany{{$company->id}}" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="edit-form-{{$company->id}}" action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table-striped table-hover table-bordered m-auto text-primary myTable" style="width: 400px;">
                                            <tr>
                                                <td >
                                                    <input type="text" class="toggle text-primary in" name="name_ar" required style="width: 100%;" value="{{$company->translations()->where('locale', 'ar')->first()->name}}">
                                                </td> 
                                                <td>الاسم(العربية)</td>     
                                            </tr>  
                                            <tr>
                                                <td >
                                                    <input type="text" class="toggle text-primary in" name="name_en" required style="width: 100%;" value="{{$company->translations()->where('locale', 'en')->first()->name}}">
                                                </td> 
                                                <td>(الإنجليزية)الاسم </td>     
                                            </tr>
                                            <tr> 
                                                <td>
                                                    <input type="email" name="email" class="toggle text-primary in" value="{{$company->email}}">
                                                </td>  
                                                <td>الايميل</td>
                                            </tr>     
                                            <tr> 
                                                <td>
                                                    <input type="number" name="phone" class="toggle text-primary in" value="{{$company->phone}}">
                                                </td>  
                                                <td>الهاتف</td>
                                            </tr>     
                                        </table>
                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" class="action-button active close" data-dismiss="modal">إغلاق</button>
                                    <button type="submit" id="edit-company-btn-{{$company->id}}" onclick="editCompany('edit-form-{{$company->id}}', {{$company->id}})" class="app-content-headerButton">حفظ التغييرات</button>
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

