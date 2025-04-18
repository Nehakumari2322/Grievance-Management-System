<nav class="navbar navbar-expand-lg navbar-light " style="background-color: green;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav me-auto  mb-lg-0">
          <li>
            <form method="post" action="<?php echo URLROOT;?>agents/navbar" style="margin:0">
            <img src="<?php echo URLROOT.'/img/logoo.png';?>" alt="se" height="55px">
              <button class="btn text-white" type="submit" style="border:none;background:none;padding:0" id="dashboardbtn" name="dashboardbtn">
              Home
              </button>
            </form>
          </li>

      </ul>
      <form class="d-flex d-print-none" action="<?php echo URLROOT; ?>agents/logmein" method="post">
      <span class="navbar-brand form-control border-0 small text-muted m-0 p-0 " style="background-color:green;">

        <input type="submit" value="Log Out" class="btn btn-block text-white" name="logout">
      </span>
    </form>
    </div>
  </div>
</nav>
