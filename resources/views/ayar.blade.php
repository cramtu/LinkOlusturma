@extends('header')

@section('title','Ayarlar')

<div class="container-fluid page-body-wrapper">

@include('eklenti.navbar')
<!-- partial -->
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ayarlar</h4>

                  <form enctype="multipart/form-data"  method="post"  class="forms-sample">
                      @csrf
                      <div class="row">
                          <div class="col-md-6">
                              <h4 >Site Ayarları</h4>
                              <div class="form-group">
                                  <label>Site iconu</label>
                                  <input type="file" name="resim" class="file-upload-default">
                                  <div class="input-group col-xs-12">
                                      <input type="text" value="{{$ayar->resim}}"  class="form-control file-upload-info">
                                      <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Resim yüklemek için tıklayın</button>
                        </span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputName1">Site Adı</label>
                                  <input type="text" class="form-control" value="{{$ayar->siteadi}}" id="siteadi" name="siteadi">
                              </div>

                          </div>
                          <div class="col-md-6">
                              <h4>Ödeme Ayarları</h4>
                              <div class="form-group">
                                  <label for="exampleInputName1">Ödeme Apı Keyi</label>
                                  <input type="text" class="form-control" value="{{$ayar->setApiKey}}" id="setApiKey" name="setApiKey">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputName1">Ödeme Secret Keyi</label>
                                  <input type="text" class="form-control" value="{{$ayar->setSecretKey}}" id="setSecretKey" name="setSecretKey">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputName1">Ödeme Base Urli </label>
                                  <input type="text" class="form-control" value="{{$ayar->setBaseUrl}}" id="setBaseUrl" name="setBaseUrl">
                              </div>



                          </div>

                      </div>
                    <button type="submit" class="btn btn-primary me-2">Kaydet</button>
                    <button class="btn btn-light">Vazgeç</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
  <script src="{{asset('vendors/select2/select2.min.js')}}"></script>
  <script src="{{asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('js/off-canvas.js')}}"></script>
  <script src="{{asset('js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('js/template.js')}}"></script>
  <script src="{{asset('js/settings.js')}}"></script>
  <script src="{{asset('js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('js/file-upload.js')}}"></script>
  <script src="{{asset('js/typeahead.js')}}"></script>
  <script src="{{asset('js/select2.js')}}"></script>
  <!-- End custom js for this page-->
</body>

<script>
    document.getElementById("price").addEventListener("keydown", function(event) {
        if (event.which === 69) {
            event.preventDefault();
        }
    });

    function Para(node){
        document.getElementById('parabirimi').innerText=node;

    }

    function alicigiris(node){

       if(node){
           document.getElementById('alicibilgileri').style.display="none";
           document.getElementById('aliciadi').value="";
           document.getElementById('aliciadres').value="";
           document.getElementById('alicinumara').value="";
       }else{
           document.getElementById('alicibilgileri').style.display="block";

       }
    }
</script>

</html>
