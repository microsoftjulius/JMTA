{{-- <footer class="sticky-footer bg-white">
<div class="container my-auto">
    <div class="copyright text-center my-auto">
    <span>Copyright &copy; Your Website 2019</span>
    </div>
</div>
</footer> --}}

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('adminNew/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('adminNew/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('adminNew/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('adminNew/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{ asset('adminNew/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('adminNew/js/demo/chart-area-demo.js')}}"></script>
<script src="{{ asset('adminNew/js/demo/chart-pie-demo.js')}}"></script>


  <!-- Page level plugins -->
  <script src="{{ asset('adminNew/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('adminNew/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('adminNew/js/demo/datatables-demo.js')}}"></script>
  
  <script type="text/javascript">
            $(document).ready(function(){
                $('#select_all').on('click',function(){
                    if(this.checked){
                        $('.checkbox').each(function(){
                            this.checked = true;
                        });
                    }else{
                        $('.checkbox').each(function(){
                            this.checked = false;
                        });
                    }
                });
                $('.checkbox').on('click',function(){
                    if($('.checkbox:checked').length == $('.checkbox').length){
                        $('#select_all').prop('checked',true);
                    }else{
                        $('#select_all').prop('checked',false);
                    }
                });
            });
    </script>
