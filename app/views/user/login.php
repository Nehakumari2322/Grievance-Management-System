<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo SITENAME; ?></title>
    <link rel="icon" type="images/x-icon" href="<?php echo URLROOT.'/img/logoo.png';?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .blink{
        animation: blink 1s steps(1,end) infinite;
      }
      @keyframes blink {
       0%{
        opacity: 1;
       }
       50%{
        opacity: 0;
       } 
       100%{
        opacity: 1;
       } 
      }
    </style>
</head>

<body style="
      background: rgb(77, 30, 171);
      background: radial-gradient(
        circle,
        rgba(77, 30, 171, 1) 0%,
        rgba(29, 178, 77, 1) 100%
      );
      overflow-x: hidden;
    ">
    <!-- Header Section -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    
        <nav class="navbar navbar-expand-lg" style="padding: 0px;background: #410200;color:white;">
            <a class="navbar-brand" href="#" style="color:white;"><img src="<?php echo URLROOT.'/img/logoo.png';?>" height="80px" alt="Logo" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#home" style="color:white;">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about" style="color:white;">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services" style="color:white;">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#news" style="color:white;">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact" style="color:white;">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>
    

    <!-- Hero Section -->
    <div class="jumbotron text-center" id="home" style="height: 150px; background-color:#E9E4D4;">
        <h1>
            <img src="<?php echo URLROOT.'/img/logoo.png';?>" style="width: 150px; height: 150px;border-radius: 72px;" /> Welcome to
            <u>Neha Services</u> <span class="text-danger">(24x7)</span> आपकी <u class="text-danger">सेवा </u>में 
        </h1>
        <!-- <p class="lead">Discover the Beauty of Ajsu</p> -->
      </div>

    <!-- About Ajasu Section -->
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6">
        <br>
        <h1 class="text-center mb-4" style="color:aliceblue ;">
        नेहा  है ना !
    </h1>
    </div>
    <div class="col-sm-3">
    </div>
    </div>
    <div class="row">
    <div class="col-sm-3">
   <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fprofile.php%3Fid%3D100079627873912&tabs=timeline&width=0&height=0&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="0" height="0" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
        </div>
        <div class="col-sm-6">
            <div class="container mt-3" id="about">
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="<?php echo URLROOT.'/img/img1.jpg'?>"  height="550" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="<?php echo URLROOT.'/img/img2.jpg'?>" height="550" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="<?php echo URLROOT.'/img/img3.jpg'?>" height="550" class="d-block w-100" alt="...">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
            </div>
            <!-- facebook section -->
        </div>

        <div class="col-sm-3">
          <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FSudeshMahtoAJSU%2F&tabs=timeline&width=340&height=650&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="550" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
      </div>
    </div>
    <!---contact us---->
    <div class="container mt-5"id="Contact Us">
    <h2 class="text-center mb-4" style="color:aliceblue ;"><img src="<?php echo URLROOT.'/img/calling.png'?> "class="blink"  height="50px" width="50px" alt="...">  <span style="color:red;">TOLL-FREE NUMBER</span>: 82506XXXXX</h2><hr style="border: 1px  solid black;">
    </div>

        

<div class="container">
        <h1 class="mb-4" style="color: white;text-align:center;" id="services">जन कल्‍याण सेवाएं</h1><br>
            <div class="row">
                <div class="col-sm-2 text-center">
                    <img src="<?php echo URLROOT.'/img/policeman.png'?>" height="120px">
                    <p style="color:white;margin-top:15px;text-align:center;"><strong>पुलिस/कानूनी सहायता<hr style="color:white;"><span style="color:white;">Police</span></strong><br>
                  </p>
                </div>
                <div class="col-sm-2 text-center">
                    <img src="<?php echo URLROOT.'/img/hospital.png'?>" height="120px">
                    <p style="color:white;margin-top:15px;text-align:center;"><strong>चिकित्सीय<hr style="color:white;"><span style="color:white;">Hospital</span></strong></p>
                </div>
                <div class="col-sm-2 text-center">
                    <img src="<?php echo URLROOT.'/img/BDO.png'?>" height="120px">
                    <p style="color:white;margin-top:15px;text-align:center;"><strong>प्रखंड/अंचल स्तरीय<hr style="color:white;"><span style="color:white;">BDO/CO Office</span></strong></p>
                </div>
                <div class="col-sm-2 text-center">
                    <img src="<?php echo URLROOT.'/img/Mukhiya.png'?>" height="120px">
                    <p style="color:white;margin-top:15px;text-align:center;"><strong>पंचायत स्तरीय <hr style="color:white;"><span style="color:white;">Mukhiya</span></strong></p>
                </div>
                <div class="col-sm-2 text-center">
                    <img src="<?php echo URLROOT.'/img/family-icon-2.jpg'?>" height="120px">
                    <p style="color:white;margin-top:15px;text-align:center;"><strong>व्यतिगत संबंधी<hr style="color:white;"><span style="color:white;">Personal</span></strong></p>
                </div>
                <div class="col-sm-2 text-center">
                    <img src="<?php echo URLROOT.'/img/agriculture.png'?>" height="120px">
                    <p style="color:white;margin-top:15px;text-align:center;"><strong>कृषि संबंधी<hr style="color:white;"><span style="color:white;">Agriculture</span></strong></p>
                </div>
            </div>
    </div>
               
              
              
              

            <!-- News and Updates Section -->
            <div class="container-fluide mt-5" id="news"  style="width:95%;display:block;margin:auto">
                <div class="row">
                  <div class="col-sm-4">
                    <div class="card ">
                      <video src="https://codingyaar.com/wp-content/uploads/video-in-bootstrap-card.mp4" class="card-img-top" controls></video>
              
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card">
                      <video src="https://codingyaar.com/wp-content/uploads/video-in-bootstrap-card.mp4" class="card-img-top" muted autoplay loop></video>
              
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
              
                  <div class="col-sm-4">
                    <div class="card h-100">
                      
                      <iframe src="https://www.youtube.com/embed/KOBhk4PPSgA?si=sc2uSpOfrDUA8xR3" title="YouTube video player" height= "260px" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" ></iframe>
                      
                      <div class="card-body ">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
        

    <!-- Footer Section -->
    <footer class="text-white text-center py-3 mt-5" id="contact" style="background :#410200;">
        <div class="container">
            <!-- <p>Contact information</p>
            <p>Social media links</p> -->
            <p>&copy; 2024 Neha Kumari. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>