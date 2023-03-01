<script src="<?php echo SITEROOT;?>data/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo SITEROOT;?>data/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo SITEROOT;?>data/assets/js/owl-carousel.js"></script>
<script src="<?php echo SITEROOT;?>data/assets/js/animation.js"></script>
<script src="<?php echo SITEROOT;?>data/assets/js/imagesloaded.js"></script>
<script src="<?php echo SITEROOT;?>data/assets/js/custom.js"></script>
<script src="<?php echo SITEROOT;?>classes/ConfigAction.js"></script>
<script src="<?php echo SITEROOT;?>data/alertifyjs/alertify.js"></script>
<script src="<?php echo SITEROOT;?>app/core/imgShow.js"></script>
<script src="<?php echo SITEROOT;?>data/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.js"></script>
<script src="<?php echo SITEROOT;?>data/backend/plugins/select2/js/select2.full.min.js"></script>
<script src="<?php echo SITEROOT;?>data/js/push_noti.js"></script>

<script src="<?php echo SITEROOT;?>data/backend/photocss/js/glightbox.min.js"></script>
<script src="<?php echo SITEROOT;?>data/backend/photocss/js/main.js"></script>
<script src="<?php echo SITEROOT;?>app/core/connect_websocket.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="<?php echo SITEROOT;?>data/bootstrap-datepicker-thai-thai/getbootstrap/prettify.js"></script>
<script src="<?php echo SITEROOT;?>data/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker.js"></script>
<script src="<?php echo SITEROOT;?>data/bootstrap-datepicker-thai-thai/js/bootstrap-datepicker-thai.js"></script>
<script src="<?php echo SITEROOT;?>data/bootstrap-datepicker-thai-thai/js/locales/bootstrap-datepicker.th.js"></script>
<!-- <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script> -->
<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
<script>
  $("input").val()
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  
  })

  $(function () {
    $('.datepicker').datepicker({
        format: "dd-mm-yyyy",
    });
});

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
  function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
      });
    }

    function fblogout(){
      FB.logout(function (response) {
          console.log('User signed out Facebook.');
      });
    }
</script>

<style>
  .navbar {
    height: 70px;
    padding:5px;
}

</style>

<button onclick="notifyMe()" hidden>Notify me!</button>

<input type="hidden" class="id" value="<?php echo $_SESSION['id']; ?>">

<input type="hidden" class="chat_input">
<div class="chat_output"></div>

<script>
 
    
</script>

</body>


</html>

</footer>

</html>
