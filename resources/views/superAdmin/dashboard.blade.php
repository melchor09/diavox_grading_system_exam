<x-app-layout>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <div class="py-12 px-12">

        <div class="row">
            <div class="col-md-4 offset-md-2">
                {{-- add subject --}}
                @if($errors->any())
                    <h4 class="text-danger">{{$errors->first()}}</h4>
                @endif
            </div>
            <div class="col-md-10 offset-md-1" >
                <form method="post" action="/create_subject" class="py-3">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" class="form-control" id="txtSubject" name="txtSubject" placeholder="Subject Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="txtDescription" placeholder="Description" required>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-danger w-100" type="submit" >Add Subject</button>
                        </div> 
                    </div>
                </form>
                

                <table class="table table-hover" id="subject-table">
                    <thead>
                        <tr>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            {{-- Student and Teacher --}}
            <div class="col-md-4 offset-md-2 pt-5">
                {{-- add subject --}}
                @if($errors->any())
                    <h4 class="text-danger">{{$errors->first()}}</h4>
                @endif
            </div>
            <div class="col-md-10 offset-md-1" >
                <form method="post" action="/create_user" class="py-3">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <input type="email" class="form-control" name="txtUsername" placeholder="Username"required>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="txtPassword" placeholder="Password"required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="txtName" placeholder="Name" required>
                        </div> 
                        <div class="col-md-2">
                            <select class="form-control" name="cmbRole" required>
                                <option value="3">Student</option>
                                <option value="2">Teacher</option>
                            </select>
                        </div> 
                        <div class="col-md-2">
                            <button class="btn btn-danger w-100" type="submit" >Add User</button>
                        </div> 

                    </div>
                </form>
                

                <table class="table table-hover" id="user-table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

        

    </div>

</x-app-layout>
<script type="text/javascript">
     $(function () {
        var table = $('#subject-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('subject.list') }}",
            columns: [
                { data: 'subject',      name: 'subject'},
                { data: 'description',  name: 'description'},
            ],
        });

        var table = $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.list') }}",
            columns: [
                { data: 'name',         name: 'name'},
                { data: 'email',        name: 'email'},
                { 
                    data: 'role',    
                    render: function(item, type){
                        return item==2?"Teacher":"Student"
                    }
                },
            ],
        });
    });
</script>
