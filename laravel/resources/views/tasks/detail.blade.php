<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <title>Tasks</title>
</head>
<body>
<div class="container">
    <h2>Tasks Detail</h2>
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            {{ html()->form('PUT', route('task.put', $task->id))->open()}}
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <td>タイトル</td>
                        <td>実行済み</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            {{ html()->text('title', $task->title)
                                ->id('title')
                                ->class('form-control')
                            }}
                        </td>
                        <td>
                            {{ html()->checkbox('executed', $task->executed) }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            {{ html()->submit('更新')->class('btn btn-primary') }}
            {{ html()->form()->close() }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            {{ html()->form('DELETE', route('tasks.delete', $task->id))->open()}}
            {{ html()->submit('削除')->class('btn btn-danger') }}
            {{ html()->form()->close() }}
        </div>
    </div>
</div>
</body>
</html>
