@extends('template.main_template')

@section('content')

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard </h4>
                <ol class="breadcrumb p-0">
                    <li>
                        <a href="#">Smart Support</a>
                    </li>
                    <li class="active">
                        Dashboard
                    </li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="cust_name">Reference No</label>
                <input type="text" class="form-control" id="reference_no" name="reference_no" required>
            </div>
        </div>
        <div class="col-md-3">
            <label></label>
            <button class="btn btn-primary" style="margin-top: 25px" onclick="search_ticket()">Search Ticket</button>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary pull-right" data-toggle="modal"
                    data-target="#add_ticket_modal">Open New Ticket
            </button>
        </div>
    </div>

    <div id="search_results_content">

    </div>


    <div class="modal fade" id="add_ticket_modal" tabindex="-1" role="dialog" aria-labelledby="open ticket modal"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form id="add_ticket_form" name="add_ticket_form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Ticket Details</h4>
                    </div>

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group {{ ($errors->has('createddate')) ? ' has-error' : '' }}">
                                    <label for="cust_name">Customer Name</label> <span style="color:red">*</span>
                                    <input type="text" class="form-control" id="cust_name" name="cust_name" required>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">Problem Description </label><span style="color:red">*</span>
                                    <textarea class="form-control" id="desc" name="desc" required></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label><span style="color:red">*</span>
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="phone_no">Phone No</label>
                                    <input type="text" class="form-control" id="phone_no" name="phone_no">
                                </div>
                            </div>
                            <br>
                            <div id="messages" class="col-md-12" styte="color:red">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Top Bar End -->

    <script type="text/javascript">

        $(document).ready(function () {

            $('#add_ticket_form').on('submit', function (event) {
                event.preventDefault();

                var add_ticket_form = new FormData(this);
                $('.form-group').removeClass('has-error');

                $.ajax({
                    headers: {'X-CSRF-Token': $(this).find('input[name="_token"]').val()},
                    url: '{{ route('save_ticket') }}',
                    data: add_ticket_form,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (data) {
                        if (data.code !== 200) {
                            var htmldata = '';
                            $.each(data.error, function (index, val) {
                                htmldata += '<span class="error-item" style="color:red">' + val[0] + '</span><br/>';
                            });
                            $('#messages').html(htmldata);
                        } else {
                            $('#add_ticket_modal').modal('hide');
                            $('#search_results_content').html('<h2>Your reference number is ' + data.reference_no + '</h2>');
                        }
                    },
                    error: function (error) {
                        alert('error');
                    }
                });

                return false;
            });

        });

        function search_ticket() {

            $('#search_results_content').html("");
            var reference_no = $('#reference_no').val();

            $.ajax({
                url: '{{ route('customer_search_ticket') }}',
                data: 'reference_no=' + reference_no + "&request_type=CUSTOMER",
                dataType: 'json',
                processData: false,
                contentType: false,
                type: 'GET',
                success: function (data) {
                    $('#search_results_content').html(data.content);
                },
                error: function (error) {
                    alert(error);
                }
            });

            return false;
        };

    </script>
@stop


