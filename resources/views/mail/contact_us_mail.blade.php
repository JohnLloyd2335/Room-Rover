<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us Email</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
</head>
<body style="font-family: Arial, sans-serif;">

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-12">

        <p><strong>Name:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Message:</strong> {{ $message_content }}</p>

      </div>
    </div>
  </div>

</body>
</html>
