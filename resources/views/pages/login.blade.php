<!DOCTYPE html>
<html lang="en">
<head>
   @include('pages.blocks.head')
</head><!--/head-->

<body>
<!--header-->
<header id="header">
    @include('pages.blocks.header')
</header>
    
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="#">
                            <input type="text" required placeholder="Name" />
                            <input type="email" required placeholder="Email Address" />
                            <span>
                                <input type="checkbox" class="checkbox"> 
                                Keep me signed in
                            </span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form id="form-register" action="{{ route('create_account') }}" method="POST">
                            @csrf
                            <input type="text" id="name" name="name" value="{{old('name')}}" required placeholder="Name"/>
                            <input type="email" id="email" name="email" value="{{old('email')}}" required placeholder="Email Address"/>
                            @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            <input type="password" id="password" name="password" value="{{old('password')}}" required placeholder="Password"/>
                            <input type="text" id="phone" name="phone" value="{{old('phone')}}" required placeholder="Phone"/>
                            <button type="submit" required class="btn btn-default signup">Signup</button>
                        </form>
                    
                           <?php
                              $message = Session::get('message');
                                if($message)
                                 {
                                   echo"<div class='alert alert-success'>$message</div>";
                                   Session::put('message',null);
                                 }
                            ?>
                        
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
    
   <!-- footer -->
    @include('pages.blocks.footer')
   
    <!-- end footer -->
    <!--foot-->
    @include('pages.blocks.foot')
    <!--end foor-->
</body>
</html>
{{-- 
<script type="text/javascript">
    $(document).ready(function(){
        $('.signup').click(function(event) {
            event.preventDefault();
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var phone = $('#phone').val();
            var _token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url:"{{ route('create_account') }}",
                type:"POST",
                data:{name:name,email:email,password:password,phone:phone,_token:_token},
                success:function() {
                           alert("Dang Ky thanh cong");  
                }
            });
        });
    });
</script> --}}