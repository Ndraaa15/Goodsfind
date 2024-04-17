<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Midtrans</title>
</head>

<body>
    @if($redirect_url != null)
    <script>
        function openNewWindow() {

            setTimeout(function() {
                window.location.href = 'http://127.0.0.1:8000'
            }, 1000)
            window.open('{{ $redirect_url }}', '_blank');
        }

        document.addEventListener('DOMContentLoaded', function() {
            openNewWindow();
        });
    </script>
    @else
    <p>Redirect URL is null</p>
    @endif
</body>

</html>
