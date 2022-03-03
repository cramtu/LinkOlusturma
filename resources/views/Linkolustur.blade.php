@include('header')
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
                                                              <div class="col-md-6">
                                                                  <div class="form-group ">
                                                                      <label for="exampleInputName1">Alıcı Adı</label>
                                                                      <input type="text" class="form-control say" id="aliciadi" name="aliciadi">
                                                                  </div>
                                                                  <div class="form-group ">
                                                                      <label for="exampleInputName1">Alıcı email</label>
                                                                      <input type="email" class="form-control say" id="aliciemail" name="aliciemail">
                                                                  </div>
                                                                  <div class="form-group ">
                                                                      <label for="exampleInputName1">Alıcı TC</label>
                                                                      <input type="number" class="form-control say" id="alicitc" name="alicitc">
                                                                  </div>
                                                                  <div class="form-group ">
                                                                      <label for="exampleInputName1">Alıcı Şehir</label>
                                                                      <input type="text" class="form-control say" id="alicisehir" name="alicisehir">
                                                                  </div>

                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group ">
                                                                      <label for="exampleInputName1">Alıcı Soyadı</label>
                                                                      <input type="text" class="form-control say" id="alicisoyad" name="alicisoyad">
                                                                  </div>
                                                                  <div class="form-group ">
                                                                      <label for="exampleInputName1">Alıcı numarası</label>
                                                                      <input type="number" class="form-control say" id="alicinumara" name="alicinumara">
                                                                  </div>
                                                                  <div class="form-group ">
                                                                      <label for="exampleInputName1">Alıcı Ülke</label>
                                                                      <input type="text" class="form-control say" id="aliciulke" name="aliciulke">
                                                                  </div>
                                                              </div>
                                                          </div>
                                                          <div class="form-group">
                                                              <label for="exampleTextarea1">Alıcı Adresi</label>
                                                              <textarea style="height: 50px!important;" class="form-control say" name="aliciadres" id="aliciadres" rows="4"></textarea>
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
           var sayi=document.getElementsByClassName('say');

           for (let i = 0; i < sayi.length; i++) {
               document.getElementsByClassName('say')[i].value=""
           }
           document.getElementById('alicibilgileri').style.display="none";

       }else{
           document.getElementById('alicibilgileri').style.display="block";

       }
    }
</script>

</html>
