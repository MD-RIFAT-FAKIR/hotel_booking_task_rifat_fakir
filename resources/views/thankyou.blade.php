<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Booking Confirmation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow-lg border-0">
    <div class="card-header bg-success text-white text-center">
      <h3 class="mb-0">🎉 Booking Confirmed!</h3>
    </div>

    <div class="card-body text-center">
      <h4 class="text-primary">Thank you, {{ $booking->name }}!</h4>
      <p class="text-muted mb-4">Your booking has been successfully confirmed.</p>

      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle w-75 mx-auto">
          <tbody>
            <tr>
              <th width="40%">Room Category</th>
              <td>{{ $booking->roomCategory->name }}</td>
            </tr>
            <tr>
              <th>From Date</th>
              <td>{{ $booking->from_date }}</td>
            </tr>
            <tr>
              <th>To Date</th>
              <td>{{ $booking->to_date }}</td>
            </tr>
            <tr>
              <th>Email</th>
              <td>{{ $booking->email }}</td>
            </tr>
            <tr>
              <th>Phone</th>
              <td>{{ $booking->phone }}</td>
            </tr>
            <tr class="table-info">
              <th>Base Price</th>
              <td>{{ number_format($booking->roomCategory->base_price) }} BDT / per day</td>
            </tr>
            <tr class="table-success">
              <th>Total Price (after discount/surcharge)</th>
              <td><strong>{{ number_format($booking->total_price) }} BDT</strong></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="mt-4">
        <a href="{{ route('dashboard') }}" class="btn btn-primary px-4">Book Another Room</a>
      </div>
    </div>

    <div class="card-footer text-center text-muted small">
      <p class="mb-0">We’ll contact you soon with further details. Have a great stay!</p>
    </div>
  </div>
</div>

</body>
</html>
