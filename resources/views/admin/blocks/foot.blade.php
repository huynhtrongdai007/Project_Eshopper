
<!-- jQuery -->
<script src="{{asset('public/backend//plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('public/backend//js/jquery.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/backend//plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/backend//dist/js/adminlte.min.js')}}"></script>

<!-- DataTables -->
<script src="{{asset('public/backend//plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/backend//plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/backend//plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/backend//plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('public/backend//dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<!-- AdminLTE for demo purposes -->

<script src="{{asset('public/backend//dist/js/demo.js')}}"></script>

<!-- page script -->
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script src="{{ asset('public/backend//js/script.js') }}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
       "paging": true,
       "searching": true,
    });
    $('#example2').DataTable({
      "lengthChange": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

{{-- edit status slider --}}
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('change', '.status_off', function(event) {
      event.preventDefault();
      var id = $(this).attr("id");
      var token = $("meta[name='csrf-token']").attr("content");
      $.ajax({
        url:"{{ route('admin.slider.update_status_untive') }}",
        type:"POST",
        data:{id:id,_token:token},
        success:function() {
            alert("Ok");
        }
      });
    });



     $(document).on('change', '.status_on', function(event) {
      event.preventDefault();
      var id = $(this).attr("id");
      var token = $("meta[name='csrf-token']").attr("content");
      $.ajax({
        url:"{{ route('admin.slider.update_status_active') }}",
        type:"POST",
        data:{id:id,_token:token},

        success:function() {
            alert("Ok");
        }
      });
    });
  });
  {{-- end edit status --}}
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('change', '.brand_status_off', function(event) {
      event.preventDefault();
      var id = $(this).attr('id');
       var token = $("meta[name='csrf-token']").attr("content");

       $.ajax({
          url:"{{ route('admin.brand.update_status_untive') }}",
          type:"POST",
          data:{id:id,_token:token},
       });
    });

 $(document).on('change', '.brand_status_on', function(event) {
      event.preventDefault();
      var id = $(this).attr('id');
       var token = $("meta[name='csrf-token']").attr("content");

       $.ajax({
          url:"{{ route('admin.brand.update_status_active') }}",
          type:"POST",
          data:{id:id,_token:token},
       });
    });

  });
</script>






{{-- edit status category --}}
<script type="text/javascript">

  $(document).ready(function(){
    $(document).on('change', '.category_status_off', function(event) {
      event.preventDefault();
      var id = $(this).attr("id");
      var token = $("meta[name='csrf-token']").attr("content");
      $.ajax({
        url:"{{ route('admin.category.update_status_untive') }}",
        type:"POST",
        data:{id:id,_token:token},
      });
    });



     $(document).on('change', '.category_status_on', function(event) {
      event.preventDefault();
      var id = $(this).attr("id");
      var token = $("meta[name='csrf-token']").attr("content");
      $.ajax({
        url:"{{ route('admin.category.update_status_active') }}",
        type:"POST",
        data:{id:id,_token:token},
      });
    });
  });
</script>
{{--end--}}

{{-- edit prouct category --}}
<script type="text/javascript">

  $(document).ready(function(){
    $(document).on('change', '.product_status_off', function(event) {
      event.preventDefault();
      var id = $(this).attr("id");
      var token = $("meta[name='csrf-token']").attr("content");
      $.ajax({
        url:"{{ route('admin.product.update_status_untive') }}",
        type:"POST",
        data:{id:id,_token:token},

        success:function() {
            alert("Ok");
        }
      });
    });



     $(document).on('change', '.product_status_on', function(event) {
      event.preventDefault();
      var id = $(this).attr("id");
      var token = $("meta[name='csrf-token']").attr("content");
      $.ajax({
        url:"{{ route('admin.product.update_status_active') }}",
        type:"POST",
        data:{id:id,_token:token},

        success:function() {
            alert("Ok");
        }
      });
    });
  }); 
</script>

{{-- create  category post --}}
 <script type="text/javascript">
   $(document).ready(function(){
        $("#save").click(function(event) {
          event.preventDefault();
          var name = $("#name").val();
          var slug = $("#slug").val();
          var description = $("#description").val();
          var _token = $("meta[name='csrf-token']").attr("content");
          $.ajax({
            url:"{{ route('admin.category_posts.store') }}",
            type:"POST",
            data:{name:name,slug:slug,description:description,_token:_token},
            success:function() {
              $("#message-success").append("<h3 class='alert alert-success'>Created Category Post SuccessFully</h3>");
               $("#form-category-post").trigger("reset");
            }

          });
        
        });
   });
 </script>

 {{-- edit  status category  post  --}}

  <script type="text/javascript">
   $(document).ready(function(){
         $(document).on('change', '.category_post_status_off', function(event) {
          event.preventDefault();

          var id = $(this).attr("id");
          var token = $("meta[name='csrf-token']").attr("content");
          $.ajax({
            url:"{{ route('admin.category_posts.update_status_untive') }}",
            type:"POST",
            data:{id:id,_token:token},
         });
      });

  $(document).on('change', '.category_post_status_on', function(event) {
          event.preventDefault();
          var id = $(this).attr("id");
          var token = $("meta[name='csrf-token']").attr("content");
          $.ajax({
            url:"{{ route('admin.category_posts.update_status_active') }}",
            type:"POST",
            data:{id:id,_token:token},
         });
      });    
   });

 </script>


  {{-- upadte category  post  --}}

 <script type="text/javascript">
   $(document).ready(function(){
        $("#btn-update").click(function(event) {
          event.preventDefault();
          var id = $("#id_update").val();
          var name = $("#name").val();
          var slug = $("#slug").val();
          var description = $("#description").val();
          var _token = $("meta[name='csrf-token']").attr("content");

          $.ajax({
            url:"{{ route('admin.category_posts.update') }}",
            type:"POST",
            data:{id:id,name:name,slug:slug,description:description,_token:_token},
            success:function() {
              window.location.replace("{{ route('admin.category_posts.index') }}");
            }

          });
        
        });
   });
 </script>
{{-- delete category post --}}

<script type="text/javascript">
  $(document).ready(function(){
      $("#example1").on('click', '.delete-data', function(event) {
        event.preventDefault();
          var id = $(this).attr("id");
          var _token = $("meta[name='csrf-token']").attr("content");
          var row  = this;
          $.ajax({
            url: '{{ route('admin.category_posts.destroy') }}',
            type: 'GET',
            data: {id:id},
            success:function() {
                $(row).closest("tr").hide();
                $("#message-success").append("<h3 class='alert alert-success'>Delete SuccessFully</h3>");

            }
          });
      });
  }); 
</script>

 {{-- edit  status  post  --}}

  <script type="text/javascript">
   $(document).ready(function(){
         $(document).on('change', '.post_status_off', function(event) {
          event.preventDefault();

          var id = $(this).attr("id");
          var token = $("meta[name='csrf-token']").attr("content");
          $.ajax({
            url:"{{ route('admin.post.update_status_untive') }}",
            type:"POST",
            data:{id:id,_token:token},
         });
      });

  $(document).on('change', '.post_status_on', function(event) {
          event.preventDefault();
          var id = $(this).attr("id");
          var token = $("meta[name='csrf-token']").attr("content");
          $.ajax({
            url:"{{ route('admin.post.update_status_active') }}",
            type:"POST",
            data:{id:id,_token:token},
         });
      });    
   });

 </script>
 {{-- show reviews --}}
<script type="text/javascript">
  $(document).ready(function() {
      $("#example1").on('click', '.btn-view', function(event) {
        event.preventDefault();
          var id = $(this).attr('id');
            
          $.ajax({
            url:"{{ route('admin.reviews.show') }}",
            type:"GET",
            data:{id:id},
            success:function(data) {
              $("#show-review-modal").append(data);
            }
          });
  
      });
  });
</script>
