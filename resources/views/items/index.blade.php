<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" >
</head>
<body>

<div class="container md-12">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Leebmann24.de </h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('items.create') }}"> Create Item</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered" id="data-table">
        <thead>
            <tr>
                <th>Partnumber</th>
                <th>Comment</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th width="230"> Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td>{{ $item->partnumber }}</td>
                    <td>{{ $item->comment }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <form action="{{ route('items.destroy',$item->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('items.edit',$item->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    </div>
</body>
</html>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" ></script>
<script>
    $('#data-table').DataTable( {
    responsive: true
} );
</script>
