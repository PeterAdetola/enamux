@extends('admin.admin_master')
@section('admin')
@php
$pageTitle = 'Create Service';
@endphp




@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/vendors/jquery.nestable/nestable.css') }}">
@endsection 
<style>
    /* Optional CSS to style the preview area */
    .preview-container {
      display: flex;
      flex-wrap: wrap;
      margin-top: 10px;
    }
    .preview-container img {
      width: 100px;
      height: 100px;
      margin: 5px;
      object-fit: cover;
    }
  </style>
 <!-- BEGIN: Page Main-->
    <div id="main">
      <div class="row">
        <div class="content-wrapper-before gradient-45deg-black-grey"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>{{ $pageTitle }}</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Admin Home</a>
                  </li>
                  <li class="breadcrumb-item active">
                    <a href="{{ route('view.services') }}">View Services</a>
                  </li>
                  <li class="breadcrumb-item active">{{ $pageTitle }}</li>
                </ol>
              </div>

<!-- Somethings removed here -->

            </div>
          </div>
        </div><br>
        <div class="col s12">
          <div class="container">
            <!-- users view start -->
<div class="row"> 
  <div class="col s12 m12 l12">


<div class="card mb-10" style="padding:1em;">
      <h6 class="card-title ml-2">Create Service</h6>
      <div class="divider mt-1"></div>

      <!-- <div class="progress collection mb-2">
        <div id="preloader" class="indeterminate" style="display:none; 
        border:2px #ebebeb solid"></div>
      </div> -->
      
      <!-- <div class="card-body"> -->
       <div class="row">
        <div class="col s12" id="account">
          <!-- users edit media object ends -->
          <!-- users edit account form start -->
          <form method="POST" action="{{ route('save.service') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <div class="col s12 m12 l3 mt-3">
                  <input name="image" type="file" id="input-file-now-custom-2" class="dropify" data-height='150' />  
                  @error('image')
                  <small class="errorTxt3  red-text">{{ $message }}*</small>
                  @enderror   

                  <small class="errorTxt3  grey-text">Upload service icon in PNG</small>
              </div>


              <div class="col s12 m6">
                <div class="row mt-3">

                  <div class="col s12 input-field mt-2">
                    <input id="name" name="name" type="text" class="validate" data-error=".errorTxt3" />
                    <label for="name">Service Name</label>
                    @error('name')
                    <small class="errorTxt3 red-text">{{ $message }}*</small>
                    @enderror
                  </div>

                  <div class="col s12 input-field">
                    <label for="summary">Summary</label>
                    <textarea id="icon_prefix2" name="summary" class="materialize-textarea" required></textarea>
                    @error('short_title')
                    <small class="errorTxt3  red-text">{{ $message }}*</small>
                    @enderror
                  </div>  

                 <div class="switch">
                    <label>
                      <input name="more_info" value="1" type="checkbox">
                      <span class="lever" onclick="toggleDiv()" selected></span>
                      <span style="font-size:1.1em; color: grey;">Add Service details (Optional)</span>
                    </label>
                  </div>
              
              <!-- <div class="col s12 display-flex justify-content-end mt-3">
                <button type="submit" class="btn-large" onclick="ShowPreloader()">
                  Save Entry</button>
                <a href="{{ route('view.slides') }}" class="btn-large btn-flat modal-close">Cancel</a>
              </div>   -->     

                </div>  
              </div>
            </div>


<div id="moreInfo_form" style="display:none;" class="col s12">


      <fieldset class="row collection mt-5" style="padding:1em">
        <legend>&nbsp;&nbsp;&nbsp;Service Details&nbsp;&nbsp;&nbsp;</legend>



          <div class="row">
          
    <div id="simpleList" class="preview-container"></div>
    
            <div class="col s12 m12">
              <div class="file-field input-field ml-2">
                <div class="btn">
                <span>File</span>
                <input name="images[]" id="file-upload" accept="image/*" type="file" multiple>
              </div>
              <div class="file-path-wrapper">
                <input name="service_img_path" class="file-path validate" type="text" placeholder="Upload one or more files">
                @error('folio_img')
                <div class="chip">
                  <small class="errorTxt3 red-text">{{ $message }}*</small>
                  <i class="close material-icons">close</i>
                </div>
                @enderror
                </div>
              </div>
            </div>

    <div class="row">
      <div class="input-field col s12">
        <textarea name="details"  id="myeditorinstance" class="materialize-textarea" ></textarea>
      </div>
    </div>
          </div> 
      </fieldset>
</div>
              <div class="card-action col s12 mt-2"> 
      <div class="progress collection mb-2">
        <div id="preloader" class="indeterminate" style="display:none; 
        border:2px #ebebeb solid"></div>
      </div>  
                <button  id="createServiceBtn" type="submit" class="modal-action waves-effect waves-red btn-large right mt-2">Save</button>
                
          </form>
          <!-- users edit account form ends -->
        </div>

      </div>
      <!-- </div> -->
</div>
  </div>



    {{--@include('admin.team.modals.delete-member-modal')--}}

</div>
<!-- users view ends -->
          </div>
          <!-- <div class="content-overlay"></div> -->
        </div>
      </div>
    </div>
    <!-- END: Page Main-->


<script src="{{ asset('backend/assets/js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code lists',
    height: 250,
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code '
  }); 


// Toggle Form visibility
      function toggleDiv(){
        var div = document.getElementById("moreInfo_form");
        if (div.style.display === "none") {
          div.style.display = "block";
        } else {
          div.style.display = "none"
        }
      }
      // Preloader Script

      document.getElementById("createServiceBtn").addEventListener("click", function() {
        var preloader = document.getElementById("preloader");
        preloader.style.display = "block";
      });


</script>

  <script>
  const fileInput = document.getElementById('file-upload');
  const previewContainer = document.querySelector('.preview-container');

  fileInput.addEventListener('change', function(e) {
    previewContainer.innerHTML = ''; // Clear previous previews

    const files = this.files;
    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      
      // Check if the file is an image
      if (!file.type.startsWith('image/')) {
        alert("Please select only image files.");
        continue;
      }

      const reader = new FileReader();
      reader.onload = function(e) {
        const img = new Image();
        img.src = e.target.result;
        previewContainer.appendChild(img);
      }
      reader.readAsDataURL(file);
    }
  });
  </script>


@endsection
@section('scripts')
    <script src="{{ asset('backend/assets/vendors/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/scripts/form-file-uploads.js') }}"></script> 
    <!-- <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script> -->
@endsection