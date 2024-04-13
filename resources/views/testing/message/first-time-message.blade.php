<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Page</title>
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <!-- Message icon -->
    <div class="message-icon" onclick="redirectToChatPage()">
        <i class="fas fa-comment"></i>
    </div>

    <script>
        function redirectToChatPage() {
            // Redirect to the chat page
            window.location.href = "{{ url('chatify/2/') }}";
        }
    </script>
</body>

</html>
