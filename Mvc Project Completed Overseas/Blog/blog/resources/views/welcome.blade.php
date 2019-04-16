<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
               <Fieldset>
                <legend>Add Blog</legend>
                    <form method="post" action="/devicesaction" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="container ">
                                <div class="row">
                                    <div class="col-md-6">
                                    <span class="form-control">Category</span>
                                    </div>
                                    <div class="col-md-6">
                                    <span class="form-control">Image</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select id="category" name="category" class="form-control">
                                            <option value="social">Social</option>
                                            <option value="sports">Sports</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" name="image" id="image"  class="form-control"/>
                                    </div>
                                </div>                        
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="form-control">Title</span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="form-control">Description</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="title" id="title"/>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea cols="5" rows="5" name="description" id="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <span class="form-control">Author</span>
                                    </div>                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="author" id="author"/>
                                    </div>                                    
                                </div>
                                
                              
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit"  class="btn btn-primary" value="Submit"/>
                                    </div>
                                </div>
                            </div>
                      </form>      
                </Fieldset>
                </div>

                    <div class="links">
                        <a href="https://laravel.com/docs">Documentation</a>
                        <a href="https://laracasts.com">Laracasts</a>
                        <a href="https://laravel-news.com">News</a>
                        <a href="https://forge.laravel.com">Forge</a>
                        <a href="https://github.com/laravel/laravel">GitHub</a>
                    </div>
            </div>
        </div>
    </body>
</html>
