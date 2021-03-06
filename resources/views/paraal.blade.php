
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

        <div class="navbar-menu-wrapper d-flex align-items-top">
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">

                    <h1 class="welcome-text">{{$ayar->siteadi}} sistemine <span class="text-black fw-bold"></span>Hoş geldiniz </h1>

                </li>
            </ul>

            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">


        <style>
            .center {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 50%;
                max-width: 300px;
                max-height: 200px;
            }
        </style>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    @if(isset($paymentStatus))
                        @if($paymentStatus=='SUCCESS')
                            <h1 style="color: greenyellow">Ödeme Başarılı</h1>
                        @else
                            <h1 style="color: red">Ödeme Başarısız</h1>
                        @endif
                    @endif
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">TÜM BİLGİLERİ EKSİKSİZ DOLDURUN</h4>

                                <img class="center" src="/images/logo/{{$ayar->resim}}" alt="logo" />
                                <form id="form"  method="post"  class="forms-sample">
                                    <div style="display:block;" id="alicibilgileri">
                                        <div class="row">
                                                <div class="form-group ">
                                                    <label>Ürün Fiyatını {{$liste->parabirimi}} Olarak Girin</label>
                                                    <div class="input-group">
                                                        <input type="number" id="fiyat" name="fiyat" class="form-control" >
                                                        <div class="input-group-append">
                                                            <span id="parabirimi" class="input-group-text">TL</span>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                    <button type="button" onclick="yolla()" class="btn btn-primary me-2">ÖDEME SAYFASINA GEÇ</button>
                                    <button class="btn btn-light">VAZGEÇ</button>

                                </form>

                                </div>
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


<?php
if(isset($paymentContent))
    echo $paymentContent;

?>



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



    function yolla(){
        if( document.getElementById('fiyat').value==''){
            alert("Ödeme Adı Boş Bırakılamaz");
            return false;
        }
        document.getElementById('form').submit();
    }


</script>

</html>
