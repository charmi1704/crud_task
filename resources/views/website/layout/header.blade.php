<?php
if (session()->has('ses_id')) {
} else {
  echo "<script>window.location='/login';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Exam Laravel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
  @include('sweetalert::alert')
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="add_product">Add</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="manage_product">Manage</a>
          </li>


          <div>
            @if(session()->has('ses_id'))
            <a href="">
              <span>
                Hi .. {{session()->get('ses_name')}}
              </span>
            </a>
            @endif
          </div>

          @if(session()->has('ses_id'))
          <li class="nav-item">
            <a class="btn btn-danger py-2 px-4" href="logout">Logout</a>
          </li>
          @else
          <li class="nav-item">
            <a class="btn btn-success py-2 px-4" href="login">Login</a>
          </li>
          @endif
<!-- 
          <li class="nav-item">
            <a class="nav-link btn btn-danger" href="logout">Logout</a>
            <div class="inner-text">
              
              <br />
              <h1>Hi .. {{session()->get('ses_name')}} </h1>
            </div>
          </li> -->



        </ul>
      </div>
    </div>
  </nav>


</body>

</html>