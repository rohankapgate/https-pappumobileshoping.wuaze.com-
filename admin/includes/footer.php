<footer class="footer pt-3  ">
<div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="#"  class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link text-muted" target="_blank">Services</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link text-muted" target="_blank">Contact</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link pe-0 text-muted" target="_blank">About</a>
                </li>
              </ul>
            </div>

          </div>
        </div>
      </footer>
      
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/perfect-scrollbar.min.js"></script>
  <script src="assets/js/smooth-scrollbar.min.js"></script>
  <script src="assets/js/chartjs.min.js"></script>


  <!-- ALERTIFY JS -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

  <script>
     <?php
     if(isset($_SESSION['message']))
     {
      ?>
      alertify.set('notifier','position','top-right');
      alertify.success("<?= $_SESSION['message']; ?>");
      <?php
      unset($_SESSION['message']);
     }

     ?>
  </script>




      </body>

</html>