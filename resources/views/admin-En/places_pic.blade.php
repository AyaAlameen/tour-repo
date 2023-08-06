@extends('adminLayout-En.master')
@section('admincontent')
    <div class="app-content">
        <div class="app-content-header w-100">
            <h1 class="app-content-headerText">Place name Images</h1>
            <!-- add -->
            <button type="button" class="app-content-headerButton" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                add pictures 
            </button>

            <!-- Modal -->
            <div class="modal fade " id="exampleModal3" tabindex="-1" data-bs-backdrop="static"
                aria-labelledby="exampleModal3Label" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content toggle">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">New Picturs</h5>
                            <button type="button" class="btn-close m-0 close"
                                onclick="removeMessages(), document.getElementById('add-form').reset()"
                                data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="add-form" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <table style="width: 400px; direction: rtl;" id="addTable"
                                    class="table-striped table-hover table-bordered m-auto text-primary myTable">

                                    <tr>
                                        <td style="width:25px; text-align:center;"> <i
                                                class="fas fa-camera text-body pt-2 pr-2"
                                                style="font-size:15px; cursor:pointer;"></i></td>

                                        <td class="pl-2">
                                            <i class="fas fa-plus text-body pl-3"
                                                style="text-align: center; line-height: 1.5; font-size:15px;  cursor:pointer;"onclick="addPic()"
                                                id="add-pic-input" data-picid="1" title="Add Another Picture"></i>
                                            <input type="file" id="add_input_0"
                                                onchange="previewImage(this, 'add_previewImage_0')"
                                                class="toggle text-primary in" name="event_image" required
                                                style="width:75% !important; font-size:16px;">
                                            <label for="add_input_0"> <img id="add_previewImage_0" width="170px"
                                                    height="90px" style="display: none; padding:6px;"></label>
                                        </td>
                                        <td>images </td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" onclick="removeMessages(), document.getElementById('add-form').reset()"
                                class="action-button active close" data-bs-dismiss="modal">close</button>
                            <button type="button" id="add-category-btn" onclick="addCategory('add-form')"
                                class="app-content-headerButton">save</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end add -->

        <div class="app-content-actions w-100">
           
            <div class="app-content-actions-wrapper">

               

                <div class="nav-item dropdown">
                    <button class="action-button list dropdown-toggle" data-bs-toggle="dropdown" title="translate"> <i
                            class="fas fa-globe "></i> </button>

                    <div class="dropdown-menu border-0 rounded-0 m-0 toggle">
                        <a href="{{ route('place_pic_ar') }}" class="dropdown-item"> Arabic</a>
                        <a href="{{ route('place_pic_en') }}" class="dropdown-item">English </a>

                    </div>
                </div>
                <button class="mode-switch" title="switch thim" style="margin-left:5px;">
                    <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                        <defs></defs>
                        <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                    </svg>
                </button>

            </div>
        </div>

        <div class="products-area-wrapper tableView" >
            <div class="products-header">
                <div class="product-cell">#</div>
                <div class="product-cell image ">image</div>
                <div class="product-cell ">actions</div>
            </div>
            <div class="products-row">
            <div class="product-cell">
                <span>1 </span>
            </div>
            <div class="product-cell">
                <span><img  src="img/sy.jpg" alt="product"></span>
            </div>
            <div class="product-cell">
                <span> 
                     <!-- delete -->
                     <a href="#" class="delete" data-toggle="modal"
                     data-target="#deletePic" title="Delete"
                     data-toggle="tooltip"><i class="fas fa-trash"></i></a>
                 <!-- Modal -->
                 <div class="modal fade" id="deletePic" tabindex="-1"
                     aria-labelledby="exampleModal2Label" aria-hidden="true">

                     <div class="modal-dialog">
                         <div class="modal-content" style="direction:ltr;">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal"
                                     aria-label="Close">
                                     <span aria-hidden="true">&times;</span>
                                 </button>
                             </div>
                             <form  action=""
                                 method="POST" enctype="multipart/form-data">
                                 @csrf
                                 
                                 <div class="modal-body" style="direction:rtl;">
                                Are You shure that you want to delete this picture?
                                
                                      </div>
                                 <div class="modal-footer">
                                     <button type="button" class="action-button active close"
                                         data-dismiss="modal">close</button>
                                     <button type="submit" 
                                         class="app-content-headerButton">yes</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- end delete -->
                    </span>
            </div>
        </div>
        </div>
    </div>

    </div>
    </div>
@endsection

