<x-app-layout>
    
    <div class="py-12 px-12">

        <div class="row">
            <div class="col-md-4 offset-md-2">
                {{-- update student grade --}}
                @if($errors->any())
                <h4 class="text-danger">{{$errors->first()}}</h4>
                @endif
            </div>
            <div class="col-md-4 offset-md-4" >
                <form method="post" action="/upsert_grade" class="py-3">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            Update Student Grade
                        </div>
                        <div class="card-body form-group">
                            Student:
                            <select name="cmbStudentid" class="form-control mb-3" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" >{{ $user->name }}</option>
                                @endforeach
                            </select>
                            Subject
                            <select name="cmbSubjectid" class="form-control mb-3" required>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->subject_id }}">{{ $subject->subject }}</option>
                                @endforeach
                            </select>
                            Grade
                            <input type="text" name="txtGrade" class="form-control mb-3" placeholder="Enter a grade from 60 to 100" required>

                            <button class="btn btn-primary w-40">Submit</button>
                            <button class="btn btn-danger w-40 float-right">Clear</button>

                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="col-md-10 offset-md-1">
                <table class="table table-hover" id="grade-table">
                    <thead>
                        <tr>
                            <th scope="col">Student Name</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Teacher</th>
                            <th scope="col">Grade</th>
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
        var table = $('#grade-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('grade.list') }}",
            columns: [
                { data: 'studentname',  name: 'studentname'},            
                { data: 'subjectname',  name: 'subjectname'},
                { data: 'teachername',  name: 'teachername'},
                { data: 'grade',        name: 'grade'},

            ],
        });
    });
</script>
