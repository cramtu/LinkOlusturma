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
                                <h4 class="card-title">Ödeme Linki Listesi</h4>

                                <form  method="post"  class="forms-sample">
                                    @csrf
                                    <div class="main-panel">
                                        <div class="content-wrapper">

                                            <div class="col-lg-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>Ödeme Adı</th>
                                                                    <th>Fiyat</th>
                                                                    <th>Link Durumu</th>
                                                                    <th>Taksitli Satış</th>
                                                                    <th>Alıcı İletişim Bilgileri</th>
                                                                    <th>İşlem</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($liste as $list)
                                                                <tr>
                                                                    <td>{{$list->odemeadi}}</td>
                                                                    <td>{{$list->fiyat}} {{$list->parabirimi}} </td>
                                                                    <td>@if($list->tekkullan==1)Tek kullanımlık @else Çoklu Kullanım @endif</td>
                                                                    <td>@if($list->tasitlisatis==1)Var @else Yok @endif</td>
                                                                    @if($list->aliciiletisim==0)
                                                                        <td>Alıcı ADı:{{$list->icerik->aliciadi}}
                                                                            Alıcı Numarası:{{$list->icerik->alicinumara}}
                                                                        </td>
                                                                    @else
                                                                      <td>Alıcı Tarafından girilecek</td>
                                                                    @endif
                                                                    @if($list->durum==0)
                                                                    <td><label class="badge badge-danger">Ödeme Bekleniyor</label></td>
                                                                    @else
                                                                        <td><label class="badge badge-success">Ödeme Alınmış </label></td>
                                                                    @endif
                                                                </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

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
