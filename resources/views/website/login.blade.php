<?php
if (session()->has('ses_id')) {
    echo "<script>window.location='/';</script>";
}
?>
<head>
  <title>Exam Laravel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<div class="container mt-3">
  <h2>Login</h2>
  <form action="{{url('/login_auth')}}" method="post">
    @csrf
    <div class="mb-3 mt-3"> 
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>