<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    @include('sweetalert::alert')
    <div class="container">
        <div class="card-shadow-sm">
            <div class="card-body">
                <h3>Todo List</h3>
                <form method="POST" action="{{route('store')}}" autocomplete="off">
                    @csrf
                    <div class="input-group">
                <input type="text" name="content" class="form-control" placeholder="Add your new todo">
                    <button type=submit class="btn btn-dark btn-sm px-4"><i class="fa fa-plus"></i></button>
                </div>
                @if ($errors->has('content'))
                <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif   
                </form>

                <!--if tasks count-->
                @if(count($todos))
                <ul class="list-group list-group-flush mt-3">
                    @foreach ($todos as $todo)
                    <li class="list-group-item">
                        <form action="{{route('destroy',$todo->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete?')">
                            {{$todo->content}}
                                @csrf
                                @method('delete')
                    <button type="submit" class="btn btn-link btn-sm float-end"><i class="fa fa-trash"></i></button>
                        </form>
                    </li>
                    @endforeach
                </ul>  
               @else
               <p class="text-center mt-3">No Tasks!</p>
               @endif
            </div>
            @if(count($todos))
            <div class="card-footer">
                You have{{count($todos)}} pending tasks
            </div>
            @else
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    </body>
</html> 
