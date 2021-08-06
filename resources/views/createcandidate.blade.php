
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Fetch Api</title>
  </head>
  <body>
    <h5>Create Candidate profile:</h5>
    <div class="card" style="width: 30rem; aling:center">
  
  <div class="card-body">
  <form>
  
  <div class="mb-9">
    <label for="name" class="form-label">Candidate's Name:</label>
    <input type="text" class="form-control" id="name" aria-describedby="name">
   
  </div>
  <div class="mb-9">
  <label for="pid" class="form-label">Senior Candidate's Name:</label>
  <select class="form-select" aria-label="Senior Candidate's Name" id="pid">
  <option selected value="">Select Senior Candidate,if any</option>
 @foreach($pid as $id)
 <option value="{{$id}}">{{$id}}</option>
 @endforeach
</select>
</div>
  <button type="button" class="btn btn-primary" onclick="submitcandidate()">Submit</button>
</form>
  </div>
</div>
    
<script>

 


const submitcandidate=async ()=>{
const name=$('#name').val();
const pid=$('#pid').val();
const data={"name":name,"pid":pid};
const url="{{route('savedata')}}";
const response = await fetch(url, {
    method: 'POST', // *GET, POST, PUT, DELETE, etc.
    mode: 'cors', // no-cors, *cors, same-origin
    cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
    credentials: 'same-origin', // include, *same-origin, omit
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      // 'Content-Type': 'application/x-www-form-urlencoded',
    },
    redirect: 'follow', // manual, *follow, error
    referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
    body: JSON.stringify(data) // body data type must match "Content-Type" header
  });

}
</script>
  </body>
</html>