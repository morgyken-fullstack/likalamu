<!-- Theme included stylesheets -->
<!DOCTYPE html>
<html lang="en">


<style media="screen">
.modal-dialog.modal-post {
    width: 800px;
    margin: 30px auto;
}

.btn-file {
    position: relative;
    overflow: hidden;
}

.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    background: red;
    cursor: inherit;
    display: block;
}

input[readonly] {
    background-color: white !important;
    cursor: text !important;
}
</style>

<body>

    <div class="container">
        <h2>Large Modal</h2>
        <!-- Button to Open the Modal
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Open modal
  </button>

  The Modal -->
        <div class="modal fade" id="post-question" style="font-size: 80%">
            <div class="modal-dialog modal-post modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header" style="background:#3498DB">
                        <h4 class="modal-title"> Post Question</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form method="post" action="" accept-charset="utf-8">

                            <!-- Modal body <form method="post" action="{{url ('api/tasks')}}"> -->
                            <div class="form-group">
                                <label for="usr">Title:</label>
                                <input type="text" placeholder="Enter Short title" name="header" class="form-control">
                            </div>
                            <div class="col-md-12 row">
                                <div class="form-group col-md-6">
                                    <label for="usr">Writing Type:</label>
                                    <select id="" class="form-control" id="type" name="paperType">
                                        <option selected="selected" value="class">Class</option>
                                        <option value="thesis">Thesis</option>
                                        <option value="general">General</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="usr">Level:</label>
                                    <select id="" class="form-control" name="level" id="level">
                                        <option selected="selected" value="1">Masters</option>
                                        <option value="phd">PHD</option>
                                        <option value="mast">Masters</option>
                                        <option value="colle">College</option>
                                        <option value="other">Other</option>

                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <input type="hidden" name="questionId" value="{{ rand (9999,99999)}}">

                            <div class="form-group">
                                <label for="body">Body:</label>
                                <textarea id="summernote" name="body"></textarea>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="usr">pages:</label>
                                        <input type="number" name="pages" min="2" id="pages" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="usr">Format:</label>
                                    <select id="" name="format" id="format" class="form-control">
                                        <option selected="selected" value="1">APA</option>
                                        <option value="MLA">MLA</option>
                                        <option value="Turabian">Turabian</option>
                                        <option value="Chicago">Chicago</option>
                                        <option value="Harvard">Harvard</option>
                                        <option value="Oxford">Oxford</option>
                                        <option value="Vancouver">Vancouver</option>
                                        <option value="CBE">CBE</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="usr">deadline:</label>
                                    <input type="text" class="form-control" id="datetimepicker1">
                                </div>
                                <script type="text/javascript">
                                $(function() {
                                    $('#datetimepicker1').datetimepicker();
                                });
                                </script>

                            </div>
                            <div class="form-group col-md-12">
                                <hr>
                                <label for="usr">Include Files:</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" multiple>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <div class="form-group">
                                    <label for="usr">Price:</label>
                                    <input type="number" name="studentprice" id="price" class="form-control">
                                </div>
                            </div>


                            <div class="form-group col-md-12">
                                <hr>
                                <button type="submit" class="btn btn-primary" name="button"> Submit
                                    Question</button>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer" style="background:#ff7878">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </form>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer" style="background:#ff7878">
                        <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
    $(function() {
        console.log("ready!");

        $("#price").val(15);
    });



    $("#pages").change(function() {
        // console.log("changed")
        let price = 15
        price += parseFloat($("#pages").val()) * 12.0
        //console.log(price)
        $("#price").val(price)
    });

    $("#art").on("change", function() {
        var val = this.value;
        $("#price").val(val ? val.split("|")[1] : "");
    }).change();


    // type
    $("#level").on("change", function() {

        if ($("#level option:selected").text() === 'phd') {
            console.log('phd')
            price += parseFloat($("#pages").val()) * 6.0
        }
        if (('#level').val() === 'mast') {
            console.log('masters')
            price += parseFloat($("#pages").val()) * 4.0
        }

        if (('#level').val() === 'colle') {
            price += parseFloat($("#pages").val()) * 3.0
        }

        if (('#level').val() === 'other') {
            price += parseFloat($("#pages").val()) * 2.0
        }
        $("#price").val(price)
    }).change();
    // type
    $("#type").change(function() {
        if (('#type').val() === 'class') {
            $("#price").val() = price * 1.8
        }
        if (('#type').val() === 'thesis') {
            $("#price").val() = price * 1.4
        }

        if (('#type').val() === 'general') {
            $("#price").val() = price * 1.2
        }
    });

    //format, deadline,
    $(".pages").change(function() {
        var hours = Math.abs(date1 - date2) / 36e5;
    });

    $(".pages").change(function() {
        $("price").value = price * 1.5
    });
    </script>
    <script>
    $(function() {

        $('#example').datetimepicker();

    });
    </script>
