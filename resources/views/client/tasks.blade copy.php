<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped col-md-12">
                    <thead>
                        <tr>
                            <th>
                                Image
                            </th>
                            <th>
                                Question ID
                            </th>
                            <th>
                                Summary
                            </th>
                            <th>
                                No. Pages
                            </th>

                            <th>
                                Price
                            </th>
                            <th>
                                format
                            </th>
                            <th>
                                deadline
                            </th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($tasks as $task)
                        <tr>

                            <td class="py-1">
                                <img src="{{asset('/theme/star-admin/images/faces/face1.jpg')}}" alt="image">
                            </td>

                            <td>{{ $task->questionId}} </td>
                            <td>{{ $task->summary}} </td>
                            <td>{{ $task->pages}} </td>
                            <td>{{ $task->studentprice}} </td>
                            <td>{{ $task->format}} </td>
                            <td>{{ $task->deadline}} </td>
                        </tr>



                        @endforeach
                        <tr>
                            <td colspan="7">
                                <div class="col-md-12">
                                    {{ $tasks->links('pagination::bootstrap-4') }}

                                </div>

                            </td>

                        </tr>



                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>


<style>
td {
    white-space: normal !important;
}
</style>