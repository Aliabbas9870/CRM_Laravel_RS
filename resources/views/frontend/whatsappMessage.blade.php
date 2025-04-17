<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send WhatsApp Message</title>
</head>
<body>
    <h1>Send WhatsApp Message</h1>

    <form action="{{ route('sendMessage') }}" method="POST">
        @csrf

        <input type="hidden" name="to" value="+923251806654"> <!-- Hardcoded recipient number -->

        <label for="message">Message:</label><br>
        <textarea
            id="message"
            name="message"
            required
            placeholder="Type your message here..."
        ></textarea><br><br>

        <button type="submit">Send Message</button>
    </form>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

</body>
</html>
