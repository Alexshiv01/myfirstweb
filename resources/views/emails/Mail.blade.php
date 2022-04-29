@foreach ($details as $detail)
    

<p>
    Hi,<br>
    You have a new contact email from your website.<br> <br>
    <strong>Details:</strong><br>
    <strong>Name:</strong>{{ $detail['name'] }}<br>
    <strong>Email:</strong>{{ $detail['email'] }}<br>
    <strong>Subject:</strong>{{ $detail['subject'] }}<br>
    <strong>Message:</strong>{{ $detail['msg'] }}<br>
</p>
@endforeach
