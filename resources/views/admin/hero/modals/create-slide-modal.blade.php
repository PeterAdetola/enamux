
<!-- Start Modal -->
<div id="create-slide-modal" class="modal" style="padding:1em;">
    <div class="modal-content">
      <h6 class="card-title ml-2" style="display:inline-block;">Add Home Slide</h6>

      <div class="progress collection">
        <div id="create-slide-preloader" class="indeterminate"  style="display:none; 
        border:2px #ebebeb solid"></div>
      </div>
      
      <!-- <div class="card-body"> -->
      <div class="row">
        <div class="col s12" id="account">
          <!-- users edit media object ends -->
          <!-- users edit account form start -->
          <form method="POST" action="{{ route('save.slide') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <div class="col s12 m12 l6 mb-2">
                  <input name="image" type="file" id="input-file-now-custom-2" class="dropify" data-height='250' required />
              @error('image')
              <small class="errorTxt3  red-text">{{ $message }}*</small>
              @enderror 
              </div>


              <div class="col s12 m6">
                <div class="row">

                  <div class="col s12 input-field">
                    <input id="heading" name="heading" type="text" class="validate" 
                      data-error=".errorTxt3" required />
                    <label for="heading">Heading</label>
                    @error('heading')
                    <small class="errorTxt3 red-text">{{ $message }}*</small>
                    @enderror
                  </div>

                  <div class="col s12 input-field">
                    <input id="sub_heading" name="sub_heading" type="text" class="validate" 
                      data-error=".errorTxt2" required />
                    <label for="sub_heading">Sub Heading</label>
                    @error('short_title')
                    <small class="errorTxt3  red-text">{{ $message }}*</small>
                    @enderror
                  </div>   
              
              <!-- <div class="col s12 display-flex justify-content-end mt-3">
                <button type="submit" class="btn-large" onclick="ShowPreloader()">
                  Save Entry</button>
                <a href="{{ route('view.slides') }}" class="btn-large btn-flat modal-close">Cancel</a>
              </div>   -->  
              <div class="col s12 mt-7">   
                <button  id="createSlideBtn" type="submit" class="modal-action waves-effect waves-green btn-large">Create Slide</button>
                <a href="javascript:void(0)" class="btn-large btn-flat modal-close">Cancel</a>
              </div>     

                </div>
              </div>
            </div>
          </form>
          <!-- users edit account form ends -->
        </div>

      </div>
      <!-- </div> -->
  </div>
</div>
<!-- /End Modal -->