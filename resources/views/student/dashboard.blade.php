<x-app-layout>
    <div class="py-12 px-12">
        <div class="row">
            <div class="col-md-10 offset-md-1" >
                <table class="table table-hover" id="student-grade-table">
                    <thead>
                        <tr>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Teacher Name</th>
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
        var table = $('#student-grade-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('student.grade_list') }}",
            columns: [
                { data: 'subjectname',  name: 'subjectname'},
                { data: 'grade',        name: 'grade'},
                { data: 'teachername',  name: 'teachername'},

            ],
        });
    });
</script>
