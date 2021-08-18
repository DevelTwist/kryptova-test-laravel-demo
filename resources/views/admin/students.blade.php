
@extends('layouts.main')


@section('content')


<div class="container">

    <div class="table-wrapper card">
      <div class="table-title">
        <div class="row">
          <div class="col-sm-12">
            <h2>Manage <b>Students</b></h2>
          </div>
          <div class="col-sm-12">
            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><span>Add New Student</span></a>
          </div>
        </div>
      </div>
      <table class="table table-striped table-hover">
        <thead>
          <tr >
            <th>
              <span class="custom-checkbox">
                <input type="hidden" id="selectAll">
                <label for="selectAll"></label>
              </span>
            </th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($list as $user)

          <tr>
            <td>
              <span class="custom-checkbox">
              <input type="hidden" data-id={{ $user->id }} name="options[]" value="{{ $user->id }}">
            </span>
            </td>
              <td data-field="first_name">{{ $user->first_name }}</td>
              <td data-field="last_name">{{ $user->last_name }}</td>
              <td data-field="address">{{ $user->address }}</td>
            <td>
              <a href="#editEmployeeModal" class="edit" data-toggle="modal"> <span> Edit </span>  </a>
              <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"> <span style="color:red;">  Delete </span> </a>
            </td>
          </tr>

          @endforeach


        </tbody>
      </table>
      <div class="clearfix">

        <div class="justify-content-center">
          {{ $list->links() }}
        </div>
    
      </div>
    </div>


    <div>
        <a href="{{ url('/') }}" class="text-sm text-gray-700 underline">Home</a>
        <br>
        <a href="{{ route('auth.logout') }}" class="text-sm text-gray-700 underline">Log out</a>
        <br>
    </div>

  </div>
  <!-- Edit Modal HTML -->
  <div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="{{ route('create.student') }}">
          {{ csrf_field() }}
          <div class="modal-header">
            <h4 class="modal-title">Add Student</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="first_name">First Name</label>
              <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="last_name">Last Name</label>
              <input type="text" name="last_name" class="form-control">
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea name="address" class="form-control" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-success" value="Add">
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Edit Modal HTML -->
  <div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" id="editform" action="{{ route('update.student', ['id' => '0']) }}">
          {{ csrf_field() }}
          @method('patch')
          <div class="modal-header">
            <h4 class="modal-title">Edit Student</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="first_name">First Name</label>
              <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="last_name">Last Name</label>
              <input type="text" name="last_name" class="form-control">
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea name="address" class="form-control" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-success" value="Add">
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Delete Modal HTML -->
  <div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" id="deleteform" action="{{ route('delete.student', ['id' => '0']) }}">
          {{ csrf_field() }}
          @method('delete')
          <div class="modal-header">
            <h4 class="modal-title">Delete Student</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete these Records?</p>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <input type="submit" class="btn btn-danger" value="Delete">
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

<script>

  document.addEventListener("DOMContentLoaded", function(event) { 
    const edits = document.querySelectorAll('.edit');

    edits.forEach(e => {
        e.addEventListener('click', element => {
        const target = element.target.parentNode.parentNode.parentNode;
        
        const first_name = target.querySelector('td[data-field="first_name"]');
        const last_name = target.querySelector('td[data-field="last_name"]');
        const address = target.querySelector('td[data-field="address"]');
        const id = target.querySelector('[data-id]');

        document.querySelector('#editform input[name="first_name"]').value = first_name.textContent;
        document.querySelector('#editform input[name="last_name"]').value = last_name.textContent;
        document.querySelector('#editform textarea[name="address"]').value = address.textContent;

        let form = document.querySelector('#editform').action = "/students/" + id.value;

      });
    });


    const deletes = document.querySelectorAll('.delete');

    deletes.forEach(e => {
        e.addEventListener('click', element => {
        const target = element.target.parentNode.parentNode.parentNode;
        
        const id = target.querySelector('[data-id]');
        let form = document.querySelector('#deleteform').action = "/students/" + id.value;

      });
    });
  });

</script>