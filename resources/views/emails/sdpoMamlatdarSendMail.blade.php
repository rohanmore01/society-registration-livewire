<h4>Dear {{ $name }}</h4>

The Request is arise by <strong>{{ $suprintendentName }}</strong> to upload the Detail Report.<br>
Please click on the below link to upload the detail report :<br>
<a href="{{ route('edit-application', $applicationId) }}">Upload Detail Report</a>

<br><br><br>Thanks & Regards,<br>
<strong>{{ $suprintendentName }}</strong><br>
<strong>{{ $suprintendentEmail }}</strong><br>
