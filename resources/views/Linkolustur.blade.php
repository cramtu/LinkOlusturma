<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Star Admin2 </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/typicons/typicons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">

  <link rel="stylesheet" href="{{asset('vendors/select2/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('css/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .select2-container--default .select2-selection--single {
        height: 32px;
    }
</style>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div>
          <a class="navbar-brand brand-logo" href="../../index.html">

          </a>
          <a class="navbar-brand brand-logo-mini" href="../../index.html">
            <img src="../../images/logo-mini.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
          <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
            <h1 class="welcome-text">Link Oluşturma Sistemine, <span class="text-black fw-bold">Hoş Geldiniz</span></h1>

          </li>
        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('Linkolustur')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Ödeme Linki Oluştur</span>
            </a>
          </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('Linklistele')}}">
                    <i class="menu-icon mdi mdi-card-text-outline"></i>
                    <span class="menu-title">Ödeme Linklerini Listele</span>
                </a>
            </li>


        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">

            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ödeme Linki Detayları</h4>

                  <form  method="post"  class="forms-sample">

                      @csrf
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="exampleInputName1">Ödeme Adı</label>
                                  <input type="text" class="form-control" id="exampleInputName1" name="odemeadi">
                              </div>
                              <div class="form-group">

                                  <div class="row">
                                      <div class="col-md-6">
                                          <label>Ürün Fiyatı</label>
                                          <div class="input-group">
                                              <input type="number" id="fiyat" name="fiyat" class="form-control" aria-label="Amount (to the nearest dollar)">
                                              <div class="input-group-append">
                                                  <span id="parabirimi" class="input-group-text">TL</span>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group col-md-6">
                                          <label>Para Birimi</label>
                                          <select onchange="Para(this.value)" name="parabirimi" class="js-example-basic-single w-100">
                                              <option selected value="TL">TL</option>
                                              <option value="USD">USD</option>
                                              <option value="EUR">EUR</option>
                                              <option value="GBP ">GBP </option>
                                              <option value="IRR">IRR</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="exampleTextarea1">Açıklama</label>
                                  <textarea style="height: 150px!important;" class="form-control" name="aciklama" id="exampleTextarea1" rows="10"></textarea>
                              </div>
                          </div>
                          <div class="col-md-6 grid-margin stretch-card">
                              <div class="card">
                                  <div class="card-body">
                                      <h4 class="card-title">Diğer Bilgiler</h4>
                                          <div class="row">
                                              <div class="col-md-12">
                                                  <div class="form-group">
                                                      <div class="form-check form-check-primary">
                                                          <label class="form-check-label">
                                                              <input  type="checkbox" name="tekkullan" class="form-check-input">
                                                             Link Tek Kullanımlık Olsun
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="form-group">
                                                  <div class="form-check form-check-success">
                                                      <label class="form-check-label">
                                                          <input type="checkbox" name="tasitlisatis" class="form-check-input" >
                                                          Taksitli satışı aktif et
                                                      </label>
                                                  </div>
                                                  </div>
                                                  <div class="form-group">
                                                      <div class="form-check form-check-warning">
                                                          <label class="form-check-label">
                                                              <input onclick="alicigiris(this.checked)" type="checkbox" name="aliciiletisim" class="form-check-input">
                                                              Alıcıdan iletişim ve adres bilgilerini talep et
                                                          </label>
                                                          <div style="display:block;" id="alicibilgileri">
                                                          <div class="row">
                                                              <div class="form-group col-md-6">
                                                                  <label for="exampleInputName1">Alıcı Adı</label>
                                                                  <input type="text" class="form-control" id="aliciadi" name="aliciadi">
                                                              </div>
                                                              <div class="form-group col-md-6">
                                                                  <label for="exampleInputName1">Alıcı numarası</label>
                                                                  <input type="number" class="form-control" id="alicinumara" name="alicinumara">
                                                              </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="exampleTextarea1">Alıcı Adresi</label>
                                                              <textarea style="height: 50px!important;" class="form-control" name="aliciadres" id="aliciadres" rows="4"></textarea>
                                                          </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                  </div>
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
