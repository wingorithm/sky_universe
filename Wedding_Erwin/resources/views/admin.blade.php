<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Admin</title>
    @vite(['resources\js\app.js'])
</head>
<style>
    .container {
  padding: 2rem 0rem;
}

h4 {
  margin: 2rem 0rem 1rem;
}

.table-image {
  td, th {
    vertical-align: middle;
  }
}
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="alert alert-primary">Welcome, ADMIN DASHBOARD.</div>
            </div>
        </div>
        <div class="row">
          <div class="col-12">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Day</th>
                  <th scope="col">Article Name</th>
                  <th scope="col">Author</th>
                  <th scope="col">Shares</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user as $s)
                <tr>
                  <th scope="row">{{$s->id}}</th>
                  <td>{{$s->email}}</td>
                  <td>{{$s->name}}</td>
                  <td>{{$s->phone}}</td>
                  <td>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal">Edit</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#banModal">Ban</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add your form fields or content for editing here -->
                    <!-- For example, you can have input fields for editing user details -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>