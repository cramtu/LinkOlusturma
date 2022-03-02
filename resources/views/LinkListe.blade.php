@include('header')
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
