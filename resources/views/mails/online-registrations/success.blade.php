<!-- Online Registration Success Email Template -->
<div style="max-width: 600px; margin: auto; padding: 20px; border: 1px solid rgb(234, 234, 234); border-radius: 8px">
    <h2 style="color: rgb(46, 109, 164)"><img src="https://s.w.org/images/core/emoji/15.1.0/72x72/1f389.png" class="x_1140658622wp-smiley" style="height: 1em; max-height: 1em"> Registration Successfull!</h2>
    <p>Dear {{ $registration->applicant_name }},</p>
    <p>Thank you for registering with <strong>ARPS Jorhat</strong>. We’re excited to have you join our learning community!</p>
    <p>Here’s a quick summary of your registration:</p>
    <ul>
        <li><strong>Student Name:</strong> {{ $registration->applicant_name }}</li>
        <li><strong>Class Applied:</strong> {{ $registration->admission_sought_for_class }}</li>
        <li><strong>Registration ID:</strong> {{ $registration->id }}</li>
    </ul>
    <p>We’ll be in touch shortly with next steps. If you have any questions, feel free to reply to this email or contact us at <a href="mailto:info@arpsjorhat.in" target="_blank">info@arpsjorhat.in</a>.</p>
    <p>Welcome aboard! <img src="https://s.w.org/images/core/emoji/15.1.0/72x72/1f393.png" class="x_1140658622wp-smiley" style="height: 1em; max-height: 1em"></p>
    <p>Warm regards,<br>
        <strong>Assam Rifles Public School, Jorhat</strong>
    </p>
</div>