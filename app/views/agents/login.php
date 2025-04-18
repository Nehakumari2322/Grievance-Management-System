<?php require APPROOT . '/views/inc/header.php';?>
    <style>
      body,
      html {
        margin: 0;
        padding: 0;
        height: 100%;
        background: rgb(77, 30, 171);
        background: radial-gradient(
          circle,
          rgba(77, 30, 171, 1) 0%,
          rgba(29, 178, 77, 1) 100%
        );
      }
      .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      .user_card {
        height: 450px;
        width: 350px;
        background: white;
        position: relative;
        display: flex;
        justify-content: center;
        flex-direction: column;
        padding: 8px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
          0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 5px;
      }
      .brand_logo_container {
        position: absolute;
        height: 170px;
        width: 170px;
        top: -75px;
        border-radius: 50%;
        background: #c8c3c3;
       
        text-align: center;
      }
      .brand_logo {
        height: 170px;
        width: 160px;
        border-radius: 50%;
        border: 2px solid white;
      }
      .form_container {
        margin-top: 100px;
      }
      .login_btn {
        width: 80%;
        height: 50px;
        background: green !important;
        color: white !important;
        font-size: large;
      }
      .login_btn:focus {
        box-shadow: none !important;
        outline: 0px !important;
      }
      .login_container {
        padding: 0 2rem;
      }
      .input-group-text {
        background: #4d4d4d !important;
        color: white !important;
        border: 0 !important;
        border-radius: 0.25rem 0 0 0.25rem !important;
      }
      .input_user,
      .input_pass:focus {
        box-shadow: none !important;
        outline: 0px !important;
      }
      .custom-checkbox
        .custom-control-input:checked
        ~ .custom-control-label::before {
        background-color: #4d4d4d !important;
      }
      a {
        color: white;
        text-decoration: none;
        background-color: transparent;
        -webkit-text-decoration-skip: objects;
      }
    </style>
 
    <div class="container">
      <div class="user_card">
        <div class="d-flex justify-content-center">
          <div class="brand_logo_container" style="margin:auto;display:block">
            <img src="<?php echo URLROOT.'/img/logoo.png';?>" class="brand_logo" alt="Logo" />
          </div>
        </div>
        <div class="d-flex justify-content-center form_container">
        <form action="<?php echo URLROOT; ?>agents/agentLogin" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Login Id</label>
            <input type="text" class="form-control" id="userId" name="userid" aria-describedby="emailHelp">
          </div>
          
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Branch Id</label>
            <input type="text" class="form-control" id="branch" name="branch" aria-describedby="emailHelp">
            </div>
            
        
          
        </div>
        <div class="d-flex justify-content-center mt-3 login_container">
            <br>
          <button type="submit" name="submit" id="submit" class="btn login_btn">
            Login
          </button>
        </div>
    </form>
        </div>
      </div>
    </div>
  </body>
</html>