
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Your custom script -->
<script src="assets/js/custom.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="crossorigin="anonymous"></script>

    
  <!-- ALERTIFY JS -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>

  <script>
    alertify.set('notifier','position','top-right');
   <?php
   if(isset($_SESSION['message']))
   {
    
    ?>
    
    alertify.success('<?= $_SESSION['message']; ?>');
    <?php
    unset($_SESSION['message']);
   }

   ?>
  </script>

  </body>
</html>