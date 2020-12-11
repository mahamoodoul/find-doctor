@extends('admin.layout.app')


@section('title', 'Emergency Message')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <h3>Emergency Message</h3>
            <div class="table-responsive">
                <table id="table_id" class="display">
                    <thead class="">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>

                        </tr>
                    </thead>



                        <tbody>
                            <tr>

                                <td>Completed</td>
                                <td>Completed</td>
                                <td>Completed</td>
                                <td>Completed</td>
                                <td>Completed</td>

                            </tr>

                        </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection




@section('script')
    <script type="text/javascript">

        $(document).ready(function() {
            $('#table_id').DataTable();
        });


    </script>
@endsection
