<style type="text/css">
    body{
        background-color: #FA8BFF;
        background-image: linear-gradient(45deg, #FA8BFF 0%, #2BD2FF 52%, #2BFF88 90%);
        height: 800px;
    }

   
    .water{
      width:200px;
      height: 200px;
      background-color: skyblue;
      border-radius: 50%;
      position: relative;
      box-shadow: inset 0 0 30px 0 rgba(0,0,0,.5), 0 4px 10px 0 rgba(0,0,0,.5);
      overflow: hidden;
    }
  .water:before, .water:after{
      content:'';
      position: absolute;
      width:400px;
      height: 400px;
      top:-150px;
      background-color: #fff;
    }
  .water:before{
      border-radius: 45%;
      background:rgba(255,255,255,.7);
      animation:wave 5s linear infinite;
    }
  .water:after{
      border-radius: 35%;
      background:rgba(255,255,255,.3);
      animation:wave 5s linear infinite;
    }
  @keyframes wave{
      0%{
          transform: rotate(0);
        }
      100%{
          transform: rotate(360deg);
        }
    }

  </style>


  <body >
    

    <!-- Admin Panel HTML Codes Will Be Wriiten Here (Start)-->

    <div class="container-fluid">
        <div class="row" style="padding-top: 10%;">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="text-align: center; background-color: #fffff333; border-radius: 20px; padding: 10px;" >
              
                <div class="water" style="margin-left: 100px; margin-bottom: 20px;"></div>
                <span style="font-weight:100; color:black;">Authenticating Your Account...</span>

                    </div>
            </div> 
            <div class="col-md-4"></div>  
                 
        </div>        
    </div>

    <!-- Admin Panel HTML Codes Will Be Wriiten Here (End)-->

    <meta http-equiv="refresh" content="3;url=index.php?page=Dashboard" />

        



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>