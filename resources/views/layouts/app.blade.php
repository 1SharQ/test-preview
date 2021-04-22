<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Simple Social Website</title>
  </head>
  <body>
      
    <nav class="nav nav_div navbar navbar-dark bg-dark sticky-top row">


            <div class="col ">
                <ul class="nav" style="padding-left: 2em">
                    <li class="nav-item">
                        <a class="navbar-brand nav-link" aria-current="page" href="{{  route('home')   }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand nav-link" href="{{ route('posts') }}">Posts</a>
                    </li>
                </ul>
            </div>

            <div class="col">
                <ul class="nav justify-content-end">

                    @auth
                    <li class="nav-item">
                        <a href="{{ route('user.posts',auth()->user()) }}" class="navbar-brand nav-link">{{ auth()->user()->name }}</a>  
                    </li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <li class="nav-item">
                            <button type="submit" class="navbar-brand btn btn-dark nav-link">logout</button> 
                        </li>
                    </form>
                   
                    @endauth  


                    @guest
                    <li class="nav-item">
                    <a class="navbar-brand nav-link" href="{{  route('register')}}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand nav-link" href="{{ route('login') }}">login</a>    
                    </li>
                    @endguest 

                </ul>
            </div>


    

        
        

        

    </nav>
          
    <div class="container">
            <div class="forms">
            @yield('content')
            </div>
        </div>
    </body>
</html>