<footer id="footer-ktv">
  <div class="container">
    <div class="copyright">© 2017 Club S</div>
  </div>
</footer><!--/footer-->
<!--end footer-->
</div><!--main-content-->
<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- start block call script -->
@yield('scripts')
<!--end block call script-->
<script type="text/javascript">
$(document).ready(function(){
  var head_col_count =  $('.main-content #col-responsive.table-responsive .table>thead>tr>th').size();
  for ( var j=0; j <= head_col_count; j++ )  {
    var head_col_label = $('.main-content #col-responsive.table-responsive .table>thead>tr>th:nth-child('+ j +')').text();
      $('.main-content #col-responsive.table-responsive .table tbody tr td:nth-child('+ j +')').replaceWith(
      function(){
        return $('<td data-title="'+ head_col_label +'">').append($(this).contents());
      }
   );
  }
});
</script>
