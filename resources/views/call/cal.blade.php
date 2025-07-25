<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  Call 
@foreach ($enquiry as $enquirys)
<tr>
    <td>{{ $enquirys->name }}</td>
    <td>{{ $enquirys->phone }}</td>
    <td>
        <form method="POST" action="{{ route('call.enquiry', $enquirys->id) }}">
            @csrf
            <button type="submit" class="btn btn-primary">📞 Call</button>
        </form>
    </td>
</tr>
@endforeach

</body>
</html>