@extends('header')

@section('title','Link Listele')

<div class="container-fluid page-body-wrapper">

    @include('eklenti.navbar')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">

                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ödeme Linki Listesi</h4>

                                <form  method="post"  class="forms-sample">
                                    @csrf
                                            <div class="col-lg-12 grid-margin stretch-card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>Ödeme Adı</th>
                                                                    <th>Fiyat</th>
                                                                    <th>Ödeme Zamanı</th>
                                                                    <th>Ödeyen ID</th>
                                                                    <th>Ödeyen Bilgileri</th>
                                                                    <th>Alıcı Adresi</th>

                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach($liste as $list)

                                                                <tr>
                                                                    <td>{{$list->icerik->odemeadi}}</td>

                                                                    <td>{{$list->para}} {{$list->icerik->parabirimi}} </td>
                                                                    <td>{{$list->created_at}}</td>
                                                                    <td>{{$list->alici_id}}</td>


                                                                    <td><b>Alıcı Adı Soyadı:</b>{{$list->aliciadi}} {{$list->alicisoyad}}
                                                                        <br>
                                                                        <b> Alıcı Numarası:</b>{{$list->alicinumara}}
                                                                        <br>
                                                                        <b> Alıcı Email:</b>{{$list->aliciemail}}
                                                                        <br>
                                                                        <b> Alıcı Email:</b>{{$list->alicitc}}
                                                                    </td>
                                                                    <td>
                                                                       {{$list->alicisehir}} <br>
                                                                     {{$list->aliciulke}}<br>
                                                                    {{$list->aliciadres}}
                                                                    </td>

                                                                </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
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
