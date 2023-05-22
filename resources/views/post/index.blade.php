<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">
            <h5>Post List</h5>
            <a href="{{url('/posts/create')}}">
                <button class="btn btn-primary btm-sm mb-2" style="float:right;">Add New</button>
            </a>
            @if(Session('successAlert'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{Session('successAlert')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <table class="table table-border table-hover">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->content}}</td>
                    <td>
                        <form action="{{url('posts/'.$post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{url('posts/'.$post->id.'/edit')}}"><button type="button" class="btn btn-success">Edit</button></a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure,you want to delete!')">Delete</button>
                        </form>

                    </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            {{$posts->links()}}
        </div>
        <div class="col-md-2"></div>
    </div>
</div>







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

