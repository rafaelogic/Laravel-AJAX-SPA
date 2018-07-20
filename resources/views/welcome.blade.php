<!doctype html>
<html lang="eng">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AJAX Single Page App - rafaelogic</title>
       
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <style>
            .cpanel {
                height: 210px;
                margin-bottom: 5px !important;
            }

            @media (max-width: 768px) { 
                .container {
                    width: 100% !important;
                    max-width: 100% !important;
                    margin: 0;
                    padding: 0;
                } 

                h3 {
                    font-size: 1.0rem;
                }
            }

        </style>
    </head>
    <body>
        <div class="d-flex flex-row flex-wrap justify-content-center">
            <div class="card bg-dark text-white col-md-12 text-center pt-1">
                <h1>
                    <a href="/" class="btn btn-dark btn-lg">Laravel AJAX Single Page App</a> - 
                    <a href="http://d3vt3c.com" target="_blank" class="btn btn-dark btn-lg">rafaelogic</a>
                </h1>
            </div>
        </div>
        <div id="app" class="container mt-3">
                
            <div class="d-flex flex-row flex-wrap mt-2">
                <div class="col-md-8 col-sm-7 mt-2">
                    <div id="app-container" class="card">
                        <div class="text-center bg-dark text-white pt-2 mt-3 mb-3">
                            <h3 id="header">Recent Jobs</h3>
                        </div>
                        <div id="jobs" class="d-flex flex-row flex-wrap border-round">
                            <div class="col-md-12" style="width:100%;">
                                <img src="/img/ripple.svg" id="loading-indicator" class="mx-auto d-block"  style="display:none !important;" />
                            </div>
                            @include('load.jobs');
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-5">
                       <div class="card mt-2">
                            <div class="bg-dark text-white text-center pt-2 mt-3 mb-3 mr-1 ml-1">
                                    <h3>
                                        Locations
                                    </h3>
                                    <div class="col-md-12 shadow-sm p-2 bg-white rounded text-left border">
                                        @if (count($cities) > 0)
                                        <ul class="list-unstyled ">
                                            @foreach ($cities as $city)
                                            @if ($city->jobs_count > 0)
                                                <li> 
                                                <a class="dropdown-item" href="#" data-token="{{csrf_token()}}" data-id="{{ $city->id }}" data-name="{{ $city->name }}"  id="location-{{ $city->id }}">
                                                    {{ $city->name }} 
                                                    <span class="badge badge-pill badge-light float-right">{{ $city->jobs_count }}</span>
                                                </a> 
                                                </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                        
                                <div class="bg-dark text-white text-center pt-2 mt-3 mb-3 mr-1 ml-1">
                                    <h3>
                                        Categories
                                    </h3>
                                    <div class="col-md-12 shadow-sm p-2 bg-white rounded text-left border">
                                        @if (count($categories) > 0)
                                        <ul class="list-unstyled ">
                                            @foreach ($categories as $category)
                                            @if ($category->jobs_count > 0)
                                                <li> 
                                                <a class="dropdown-item"  href="javascript:void()" data-token="{{csrf_token()}}" data-id="{{ $category->id }}" data-name="{{ $category->name }}" id="category-{{ $category->id }}" >
                                                    {{ $category->name }} 
                                                    <span class="badge badge-pill badge-light float-right">{{ $category->jobs_count }}</span>
                                                </a> 
                                                </li>
                                            @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>
                                </div>
                       </div>
                </div>
            </div>

        </div>

        <div class="container-fluid">
            <div class="d-flex flex-column row">
                <footer class="footer bg-dark mt-2 p-3">
                    <div class="text-center">
                    <span class="text-white">Laravel AJAX Single Page App  - <a class="text-success" href="http://d3vt3c.com">rafaelogic</a></span>
                    </div>
                </footer>
            </div>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.bundle.min.js"></script>
    @if (App::environment('local'))
    <script src="/js/app.js"></script>
    @else
    <script src="https://dl.dropbox.com/s/wpn167wezmyxn0g/app.js"></script>
    @endif

   
    </body>
</html>
