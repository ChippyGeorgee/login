<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <style>
    input{
        margin-top:10px;
    }
    .row{
        margin:0;
    }
  </style>
</head>
<body>
<div class="login-page">
  <!-- <div class="form" > -->
<!--   
    <form class="login-form" > -->
        <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
                &nbsp;
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
								<h3 id="login_heading"> <b>Login</b></h3>
                <div class="row">
                <input type="text" class="form-control" placeholder="Email" id="email"/>
                <span style="color:red;visibility:hidden;" id="error_email">Please enter email</span>


                </div>
                <div class="row">
                <input type="password"class="form-control"  placeholder="Password" id="password"/>
                <span style="color:red;visibility:hidden;" id="error_password">Please enter password</span>

                </div>
                <div class="row"><p style="color:red;visibility:hidden;" id="error">Invalid credentials</p></div>

                <div class="row">
                <button class="btn btn-success" style="margin-top:10px;" id="login">Login</button>

                </div>
                <div class="row">
                <h5 id="terms">Don't have an account? <a href="signup.php">SignUp!</a></h5>
                

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                &nbsp;
            </div>
        </div>
    <!-- </form> -->
  </div>
</div>
</body>
</html>
<script>
   $("#email").keyup(function(){
        var email = $("#email").val();
        $("#error_email").css("visibility","hidden");
        var mailformat = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(email.match(mailformat))
        {
        console.log("matched")
        }
        else{
            $("#error_email").css("visibility","visible");
            $("#error_email").html("Please enter a valid email address");
        }
    })
    $('#login').click(function(){
   var email = $("#email").val();
   var password = $("#password").val();
   if(email==""){
    $("#error_email").html("Please enter email")
        $("#error_email").css("visibility","visible")
                
   }
   if(password==""){
    $("#error_password").css("visibility","visible")

   }


   if(email !="" && password!=""){
    $.ajax({
        type: "POST",
        data: {
                // 'action': 'signup',
                'email' : email,
                'password' : password,
                // 'email' : email,
                // 'phone' : phone,
                },
        url: "login1.php",
        success:function(data){
            if(data == 0){
              $("#error").css("visibility","visible")
            }
            else{
                var json_obj= $.parseJSON(data);
                console.log(json_obj);
                var user_id=json_obj[0].id;
                // Cookies.set('id', user_id);
                document.cookie = "id="+user_id;
                // $.cookie("user_id", user_id);
                window.location.href="profile.php";

            }
        }
    });
   }

});
</script>
