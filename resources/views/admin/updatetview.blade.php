<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <h1>Update Task</h1>

    <form action="{{ route('/task/update/{id}') }}" method="post">
        @csrf
        <input type="text" name="task-name" id="" class="form-control" value="{{ $taskdata->task }}" required/>
        <input type="hidden" name="id" value="{{ $taskdata->id }}">
        <input type="submit" value="Update" class="btn btn-warning">
        &nbsp; &nbsp;<input type="button" value="Cancel" class="btn btn-danger" onclick="window.history.back();">
    </form>
</div>
</body>

</html>
