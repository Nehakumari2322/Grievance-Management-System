<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo SITENAME; ?></title>
    <link rel="icon" type="images/x-icon" href="<?php echo URLROOT.'/img/logo1.png';?>">
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
    
    
        <nav class="navbar navbar-expand-lg" style="padding: 20px;background: #410200;color:white;">
            <a class="navbar-brand" href="#" style="color:white;">Apna Ajsu</a>
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
    <div class="jumbotron text-center " id="home" style="height: 150px; background-color:#E9E4D4;">
        <h1>
            <img src="<?php echo URLROOT.'/img/logo1.png';?>" style="width: 150px; height: 150px;border-radius: 72px;" /> Welcome to
            <u>Apna Ajsu </u> <span class="text-danger">(24x7)</span> आपकी <u class="text-danger">सेवा </u>में 
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
      अपना आजसू है ना !
    </h1>
    </div>
    <div class="col-sm-3">
    </div>
    </div>
    <div class="row">
    <div class="col-sm-3">
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fajsupartyjh&tabs=timeline&width=340&height=650&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="550" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
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

            <!-- ---Services ----
            <div class="container mt-5" id="services" style="width:95%;display:block;margin:auto">
  <h2 class="text-center mb-4" style="color:aliceblue ;">Services</h2>
  <div class="row">
    <div class="col-sm-4 mb-2">
      <div class="card h-100" style="width: 20rem;">
        <img src="<?php echo URLROOT.'/img/police.jpeg'?>"height="270px" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title text-center">Police</h5>
          <p>Police officers are specially trained people who maintain peace and order, enforce laws, and protect public and private properties. They also help with emergencies and solve criminal cases.</p>

        </div>
      </div>
    </div>
    <div class="col-sm-4 mb-2">
      <div class="card h-100" style="width: 20rem;">
        <img src="<?php echo URLROOT.'/img/hospital.jpg'?>" height="270px" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title text-center">Hospital</h5>
          <p>A hospital is a healthcare institution that provides treatment to patients with specialized staff and equipment. Hospitals play a vital role in our lives, saving lives, promoting health, and providing essential medical services.</p>

        </div>
      </div>
    </div>
    <div class="col-sm-4 mb-2">
      <div class="card h-100" style="width: 20rem;">
        <img src="<?php echo URLROOT.'/img/BDO.jpeg'?>" height="270px" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title text-center">BDO/CO Office</h5>
          <p>BDO: Block Development Officer. BDO stands for Block Development Officer. He or she is the office in charge of a block for its development and activities.</p>

        </div>
      </div>
    </div>
  </div>
  -2ND row-->
  <!-- <div class="row">
    <div class="col-sm-4 mb-2">
      <div class="card h-100" style="width: 20rem;">
        <img src="<?php echo URLROOT.'/img/Mukhiya.jpeg'?>"height="270px" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title text-center">Mukhiya</h5>
          <p>Mukhi (mukhia) is the title used for a head of community or village elites and their local government in Western India and Sindh.</p>

        </div>
      </div>
    </div>
    <div class="col-sm-4 mb-2">
      <div class="card h-100" style="width: 20rem;">
        <img src="<?php echo URLROOT.'/img/personal.webp'?>"height="270px" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title text-center">Personal</h5>
          <p>My job-related compensation is crucial for financial stability and personal growth. Despite occasional family conflicts, job benefits like electric wire provisions ensure a safe work environment, promoting job satisfaction and overall well-being.</p>

        </div>
      </div>
    </div>
    <div class="col-sm-4 mb-2">
      <div class="card h-100" style="width: 20rem;">
        <img src="<?php echo URLROOT.'/img/agriculture.jpeg'?>"height="270px" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title text-center">Agriculture</h5>
          <p>Agriculture is the science and practice of growing crops and livestock. It provides the food and many raw materials that humans need to survive.</p>

        </div>
      </div>
    </div>


  </div>
</div> -->

<!---services 2nd-->

<div class="container">
        <h1 class="mb-4" style="color: white;text-align:center;" id="services">Services</h1><br>
            <div class="row"style="margin-left:30px;">
                <div class="col-sm-2">
                    <img src="<?php echo URLROOT.'/img/policeman.png'?>" height="120px">
                    <p style="color:white;margin-left:15px;margin-top:15px;"><strong>Police</strong></p>
                </div>
                <div class="col-sm-2">
                    <img src="<?php echo URLROOT.'/img/hospital.png'?>" height="120px">
                    <p style="color:white;margin-left:15px;margin-top:15px;"><strong>Hospital</strong></p>
                </div>
                <div class="col-sm-2">
                    <img src="<?php echo URLROOT.'/img/BDO.png'?>" height="120px">
                    <p style="color:white;margin-left:15px;margin-top:15px;"><strong>BDO/CO Office</strong></p>
                </div>
                <div class="col-sm-2">
                    <img src="<?php echo URLROOT.'/img/Mukhiya.png'?>" height="120px">
                    <p style="color:white;margin-left:30px;margin-top:15px;"><strong>Mukhiya</strong></p>
                </div>
                <div class="col-sm-2">
                    <img src="<?php echo URLROOT.'/img/personal.webp'?>" height="120px">
                    <p style="color:white;margin-left:15px;margin-top:15px;"><strong>Personal</strong></p>
                </div>
                <div class="col-sm-2">
                    <img src="<?php echo URLROOT.'/img/agriculture.png'?>" height="120px">
                    <p style="color:white;margin-left:8px;margin-top:15px;"><strong>Agriculture</strong></p>
                </div>
            </div>
    </div>
                <!-- <div class="container mt-5" id="services" style="width:95%;display:block;margin:auto">
                  <h2 class="text-center mb-4" style="color:aliceblue ;">Services</h2>
                  <div class="row">
                    <div class="col-sm-4 mb-2">
                      <div class="card h-100" style="width: 20rem;">
                        <img src="<?php echo URLROOT.'/img/van2.jpg'?>" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-center">Funeral</h5>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 mb-2">
                      <div class="card h-100" style="width: 20rem;">
                        <img src="<?php echo URLROOT.'/img/amb4.jpeg'?>" height="270px" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-center">Ambulance</h5>
                          
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 mb-2">
                      <div class="card h-100" style="width: 20rem;">
                        <img src="<?php echo URLROOT.'/img/water3.png'?>"  height="270px"  class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title text-center">Water Tank</h5>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
              
              

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
            <p>&copy; 2024 Apna Ajsu. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>