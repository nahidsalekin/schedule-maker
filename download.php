<?php
include('connection.php');
include('header.php');
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Desktop App</title>
    <style media="screen">
      .demo{
        width: 50%;
        margin: 2% auto;
        font-weight: bold;
      }
       .demo iframe{
        border: 2px solid red;
        /* width: 100%; */
        /* height: 315px; */
        margin: 0 auto;
      }
      .desc{
        background: #181831;
        width: 50%;
        margin: 0 auto;
        text-align: center;
        border-radius: 5px;
        padding: 10px;
      }
    .desc  h3{
        margin-top: 5px;
        color: hotpink;
        font-family: cursive;
      }
      .download{
        margin-left: 5%;
        background: lightblue;
        width: 50%;
        border-radius: 5px;

      }
      .download ol{
        list-style-type: decimal;
        margin: 0;
        padding: 5px;
        list-style-position: inside;
      }
      .download ol li{
        list-style-type: decimal;
        padding-left: 5px;
      }
      .download a{
        color: inherit;
      }
      .download a:hover{
        font-size: 20px;
        color: red;
      }
      .instruction{
        font-family: monospace;
        font-size: 20px;
        color:inherit;
        margin-left: 5px;
      }

      @media only screen and (max-width: 760px) {
  .demo{
  width: 80%;
}
.desc{
  width: 70%;
}
.desc h3{
  font-size: 20px;
}
.download{
  width: 80%;
}
      }
    </style>
  </head>
  <body>
    <br>
    <div class="desc">
      <h3>Desktop App is Available for Windows PC. Alternately you can generate routine(s) by using this app.</h3>
    </div>

    <div class="demo">
       <label for=""> Have a Look:</label>
       <br>
       <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/pdo8dKjkDGU" allowfullscreen frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"></iframe>
</div>
    </div>
<label class="instruction">Installation Guide:</label>
<div class="download">
  <ol>
    <li><a target="_blank" href="https://drive.google.com/drive/folders/1MlHSS8WWzwWOpjiNoK5-S378rWSsU9sz?usp=sharing">Click Here</a></li>
    <li>Download the folder as .zip file and extract (or Download all files)</li>
    <li>Install "jre-8u221-windows-x64.exe"</li>
    <li>Double Click on Schedule Maker.exe</li>
    <li>Detail Instructions are available inside the "App" folder</li>
  </ol>

</div>
<br>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </body>
</html>
