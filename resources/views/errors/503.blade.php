<!DOCTYPE html>
<html lang="en">
<head>
  <title>Coming Soon!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="{{ url('web/images/favicon.png') }}" type="image/x-icon">
 <style>
    body {
  background: #00091b;
  color: #fff;
}

@keyframes fadeIn {
  from {
    top: 20%;
    opacity: 0;
  }
  to {
    top: 100;
    opacity: 1;
  }
}

@-webkit-keyframes fadeIn {
  from {
    top: 20%;
    opacity: 0;
  }
  to {
    top: 100;
    opacity: 1;
  }
}

.wrapper {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  animation: fadeIn 1000ms ease;
  -webkit-animation: fadeIn 1000ms ease;
}

h1 {
  font-size: 50px;
  font-family: "Poppins", sans-serif;
  margin-bottom: 0;
  line-height: 1;
  font-weight: 700;
}

.dot {
  color: #4febfe;
}

p {
  text-align: center;
  margin: 18px;
  font-family: "Muli", sans-serif;
  font-weight: normal;
}

.icons {
  text-align: center;
}

.icons i {
  color: #00091b;
  background: #fff;
  height: 15px;
  width: 15px;
  padding: 13px;
  margin: 0 10px;
  border-radius: 50px;
  border: 2px solid #fff;
  transition: all 200ms ease;
  text-decoration: none;
  position: relative;
}

.icons i:hover,
.icons i:active {
  color: #fff;
  background: none;
  cursor: pointer !important;
  transform: scale(1.2);
  -webkit-transform: scale(1.2);
  text-decoration: none;
}

 </style>
</head>
<body>

<div class="container">
 <div class="wrapper">
  <h1>Coming soon<span class="dot">.</span></h1>
  <p>This page is Under Contruction!</p>
   <p><a href="{{ url('/') }}">Back to Home</a></p>
  <div class="icons">
    <a href=""><i class="fa fa-twitter"></i></a>
    <a href=""><i class="fa fa-youtube-play"></i></a>
    <a href=""><i class="fa fa-paper-plane"></i></a>
  </div>


  
</div>
</div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>