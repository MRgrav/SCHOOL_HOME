<!-- PDF Header -->
<div style="width: 100%; font-size: 14px; display:flex; justify-content: center; background-color: #f00; gap:20px; text-align: center; padding-block: 10px;">
    <div>
        <!-- To use image we need to base64_encode image -->
        <img style="width: 100px; height: 100px;" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('storage/logos/site-logo.png'))) }}" alt="Site Logo">
    </div>
    <div>
        <h2 style="margin: 0;">ASSAM RIFLES PUBLIC SCHOOL</h2>
        <h3 style="margin: 0;">NEFABARI, ROWRIAH, JORHAT-785621 (ASSAM)</h3>
        <div>CBSE Affiliation No: 280010</div>
        <div>Email: arpsjorhat@ymail.com</div>
        <div>Phone No: +91 93956 42231 (O)</div>
    </div>
</div>