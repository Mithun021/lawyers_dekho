

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">

  <style type="text/css">
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
      font-family: 'Source Sans Pro', sans-serif;
    }
    body:before{
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      height: 50%;
      width: 100%;
      background: #0F60B6;
      z-index: 1;
    }
    body:after{
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      height: 50%;
      width: 100%;
      background: #F2F3F4;
      z-index: 1;
    }
    .login-box{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      height: 360px;
      width: 400px;
      border: 1px solid #eee;
      z-index: 2;
      background: #ffff;
      -webkit-box-shadow: 0px 0px 13px -6px rgba(0,0,0,0.65);
      -moz-box-shadow: 0px 0px 13px -6px rgba(0,0,0,0.65);
      box-shadow: 0px 0px 13px -6px rgba(0,0,0,0.65);
      border-radius: 10px;
      padding: 10px 20px;
    }
    @media(max-width: 767px){
      .login-box{
        height: 350px;
        width: 350px;
      }
    }
    .login-box h1{
      position: relative;
      text-align: center;
      margin: 20px 0;
      letter-spacing: 0.5px;
      font-size: 32px;
      font-weight: 800;
    }
    .login-box h1:after{
      content: '';
      position: absolute;
      bottom: -10px;
      width: 80px;
      height: 5px;
      left: 50%;
      transform: translateX(-50%);
      background: #0F60B6;
    }
    .login-box .login-input input[type="text"], 
    .login-box .login-input input[type="password"],
    .login-box .login-input input[type="submit"]{
      width: 100%;
      height: 40px;
      margin-top: 20px;
      padding-left: 10px;
      outline: none;
      background: #F2F3F4;
      border: none;
      border: 1px solid #E2E2E2;
      border-radius: 5px;
      line-height: 40px;
      font-size: 18px;
    }
    .login-box .login-input input::placeholder{
      font-size: 18px;
    }
    .login-box .login-input input[type="submit"]{
      background: #0F60B6;
      font-weight: 600;
      color: #fff;
      text-transform: uppercase;
      cursor: pointer;
    }
    .login-box .login-input span{
      margin-top: 5px;
      color: #566573;
      font-weight: 600;
    }
    .login-box .login-input.password{
      display: flex;
      justify-content: space-between;
      margin-top: 5px;
    }
    .login-box .login-input span a{
      color: #566573;
      text-decoration: none;
      display: flex;
      align-items: flex-end;
      justify-content: flex-end;
      cursor: pointer;
    }
    .login-box .login-input span a:hover{
      color: #0F60B6;
    }
    #error-msg{
      margin-top: 10px;
      padding: 10px;
      box-sizing: border-box;
      background: #F1948A;
      color: #EA3636;
      border-radius: 5px;
      font-weight: 800;
      border: 1px solid #E74C3C;
      text-shadow: 0 0 2px #eee;
      display: none;
    }
  </style>
</head>
<body>
  <div class="login-box">
      <form method="post">
        <h1>ADMIN LOGIN</h1>
        <div class="login-input">
          <input type="text" name="username" placeholder="Email/Phone" id="username">
        </div>
        <div class="login-input">
          <input type="password" name="password" placeholder="Password" id="passInput">
        </div>
        <div class="login-input password">
          <div>
           <input type="checkbox" name="" id="showPass"> <span>Show Password</span> 
          </div>
          <div>
            <span><a href="#">Forgot Password ?</a></span>
          </div>
        </div>
        <div class="login-input">
          <input type="submit" name="loginbtn" value="Login" id="loginbtn">
        </div>
        <div id="error-msg">
          
        </div>
      </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#showPass').on('click', function(){
          var passInput=$("#passInput");
          if(passInput.attr('type')==='password')
            {
              passInput.attr('type','text');
          }else{
             passInput.attr('type','password');
          }
      });


      $('#loginbtn').click(function(e){
        e.preventDefault();
        var username = $('#username').val();
        var password = $('#passInput').val();

        if (username=='' && password=='') {
          $('#loginbtn').removeAttr("disabled");
          $('#loginbtn').val('Login');
          $('#error-msg').text('Required All Fields');
          $('#error-msg').show();
          $('#username').focus();
          return false;
        }
        else{
          $('#loginbtn').attr('disabled','disabled');
          $('#loginbtn').val('Please Wait....');
          $.ajax({
            url:'login',
            method:'post',
            data:{
                userId:username,
                userPassword:password
            },
            dataType:"text",
            success:function(strMessage){
              if (strMessage==='dataMatch') {
                $('#loginbtn').removeAttr("disabled");
                $('#loginbtn').val('Login');
                window.location.href = "<?= base_url() ?>admin/";
                // $('#error-msg').text("Login");
              }
              else{
                $('#loginbtn').removeAttr("disabled");
                $('#loginbtn').val('Login');
                $('#error-msg').show();
                // $('#error-msg').text('Please Enter Valid Details');
                $('#error-msg').text(strMessage);
              }
            },
            error: function(){
                $('#loginbtn').removeAttr("disabled");
                $('#loginbtn').val('Login');
            }

          });
        }
      });
    });
  </script>
</body>
</html>