
  <footer class="main-footer">
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

<script src="{{ asset("js/jquery.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/adminlte.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/main.js") }}" type="text/javascript"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
$( function() {
   $( "#datepicker" ).datepicker();
} );
</script>

@yield('footer-extra-js')
