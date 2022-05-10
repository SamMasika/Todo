<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body class="bg-success">
    <div class="container w-25 mt-5">
        <div class="card-shadow-sm">
            <div class="card-body">
                <h3>Todo List</h3>
                <form method="POST" action="{{route('store')}}" autocomplete="off">
                    @csrf
                    <div class="input-group">
                <input type="text" name="content" class="form-control" placeholder="Add your new todo">
                    <button type=submit class="btn btn-dark btn-sm px-4"><i class="fa fa-plus"></i></button>
                    </div>
                </form>

                <!--if tasks count-->
                @if(count($todos))
                <ul class="list-group list-group-flush mt-3">
                    @foreach ($todos as $todo)
                    <li class="list-group-item">
                        <form action="{{route('destroy',$todo->id)}}" method="POST">
                            {{$todo->content}}
                                @csrf
                                @method('delete')
                    <button type="submit" class="btn btn-link btn-sm float-end" onclick="return comfirm('Are you sure you want to delete the task?')"><i class="fa fa-trash"></i></button>
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
    
</body>
</html> 