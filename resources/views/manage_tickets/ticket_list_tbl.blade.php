<table class="table">
    <thead class="thead-default">
    <tr>
        <th>#</th>
        <th>Ref. No</th>
        <th>Customer Name</th>
        <th>Problem Description</th>
        <th>Email</th>
        <th>Phone No</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php $n = 0;?>
    @foreach($tickets as $ticket)
        <tr id="ticket_{{ $ticket->id }}" style="{{ ($ticket->status=='PENDING')?'background-color: #b3b3b3':'' }}">
            <th scope="row">{{ ++$n }}</th>
            <td>{{ $ticket->reference_no }}</td>
            <td>{{ $ticket->cust_name }}</td>
            <td>{{ $ticket->problem_desc }}</td>
            <td>{{ $ticket->email }}</td>
            <td>{{ $ticket->phone_no }}</td>
            <td id="status_{{ $ticket->id }}">{{ $ticket->status }}</td>
            <td>
                <button class="btn btn-primary edit-item" data-val="{{ $ticket->id }}" data-toggle="modal"
                        data-target="#reply_ticket_modal">Open Ticket
                </button>
            </td>
        </tr>
    @endforeach()
    </tbody>
</table>
<div class="clearfix margin-top-15">
    {{ $tickets->links() }}
</div>
