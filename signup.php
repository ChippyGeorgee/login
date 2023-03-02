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
  <!-- <div class="form" method="POST" action="signUp1.php"> -->
      <!-- <form class="register-form"> -->
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                &nbsp;
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="row">
                <input type="text" placeholder="Name" name="name" id="name" class="form-control input-sm"/>
                <span style="color:red;visibility:hidden;" id="error_name">Please enter name</span>
                </div>

                <div class="row">
                        <input type="text"   name="email" placeholder="Email" id="email" class="form-control"/>
                     <span style="color:red;visibility:hidden;" id="error_email">Please enter email</span>

                    </div>
                <div class="row">
                        <input type="password" placeholder="Password"  name="password" id="password"class="form-control"/>
                        <span style="color:red;visibility:hidden;" id="error_password">Please enter password</span>

                    </div>
                    <!-- <div class="row">
                        <input type="text" placeholder="Name" class="form-control"/>
                    </div> -->
                    <div class="row">
                        <input type="text" placeholder="Phone" name="phone" id="phone" class="form-control"/>
                        <span style="color:red;visibility:hidden;" id="error_phone">Please enter phone</span>

                    </div>
                   <span id="already" style="color:red;visibility:hidden;">Account already exists</span>
                    <div class="row">
                        <button class="btn btn-success" style="margin-top:10px;" name="signup" id="signup">Sign Up</button>
                    </div>
                    <div class="row">
                        <p class="message">Already registered? <a href="login_form.php">Log In</a></p>
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
    $("#name").keyup(function(){
        $("#error_name").css("visibility","hidden")
    })
    $("#phone").keyup(function(){
        $("#error_phone").css("visibility","hidden");
        var phone = $("#phone").val();
        var phoneno = /^\d{10}$/;
        if(phone.match(phoneno)){

        }
        else{
            $("#error_phone").css("visibility","visible");
            $("#error_phone").html("Please enter a valid phone number");
        }
        })
    $("#password").keyup(function(){
        $("#error_password").css("visibility","hidden")
    })
$("#signup").click(function(){
    var email = $("#email").val();
    var password = $("#password").val();
    var name = $("#name").val();
    var phone = $("#phone").val();
    if(email==""){
        $("#error_email").css("visibility","visible")
    }
    if(password==""){
        $("#error_password").css("visibility","visible")
    }
    if(name==""){
        $("#error_name").css("visibility","visible")
    }
    if(phone==""){
        $("#error_phone").css("visibility","visible")
    }
    if(name !="" && email !="" && password!="" && phone !=""){
        $.ajax({
        type: "POST",
        data: {
                // 'action': 'signup',
                'name' : name,
                'password' : password,
                'email' : email,
                'phone' : phone,
                },
        url: "signUp1.php",
        success:function(data){
            if(data == 1){
                alert("Account created successfully, Please login to proceed");
                window.location.href="login_form.php";
            }
            else if(data==0){
                alert("error")
            }
            else if(data==3){
                $("#already").css("visibility","visible")
            }
        }
    });
    }
    
})
</script>