
</<!DOCTYPE html>
<html>
<head>
 
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
<body>
    <header>  
     
        <nav class="navbar navbar-expand-sm bg-dark ">
        <a class="navbar-brand text-light" href="#"><img src="../images/blog.jfif"  style="width: 78px;border-radius: 77px;height: 50px;"/><span style="height:20px;width:50px;">Blogs</span></a>
        <ul class="navbar-nav ml-auto ">
            <li class="nav-item">
            <a class="nav-link text-light" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="#">Contact Us</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" href="#">Feedback</a>
            </li>
        </ul>
        </nav>
    </header>


    <div class="container ">
    <h1> All Blogs</h1>
    @foreach ($devices as $device)
        <div class="row pt-3 bg-secondary" style="border-radius: 68px;" >
                <div class="col-md-4 pb-3" style="border-radius: 68px;">
              <span class="text-light"> {{ $device->title }}</span>
                </div>
                <div class="col-md-8">
              <span style="" class="text-light">Description</span>
                </div>
        </div>
        <div class="row pt-3 pb-1">
            <div class="col-md-4  ">
           <img src="../images/{{ $device->image }}"  style="width: 283px;height: 158px;" > 
            </div>
            <div class="col-md-8">
            <span class="text-muted font-weight-bold">        
                {{ $device->blogdescription }}</span>
            <div class="row pt-3 pb-1">
                <div class="col-md-8 ">
                   <span class="bg-primary text-light" style="border-radius: 16px;padding: 7px;"> Published by: {{ $device->author }}</span>
                </div>
            </div>
            </div>
        </div>
    @endforeach

    </div>
 

<!--  
@foreach ($devices as $device)
<li> {{ $device}}  </li>
@endforeach
 
<h1>Only Names Of Devices</h1>
 
@foreach ($devices as $device)
 
<li> {{ $device->name}}  </li>
 
@endforeach
 
<h1>Only Description Of Devices</h1>
 
@foreach ($devices as $device)
 
<li> {{ $device->description}}  </li>
 
@endforeach
  -->
</body>
</html>