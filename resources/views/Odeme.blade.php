
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Ödeme </title>
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
        <img class="center" src="/images/logo/{{$ayar->resim}}" alt="logo" />

        <div id="iyzipay-checkout-form" class="responsive">
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
