<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Available Rooms</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow-lg">
    <div class="card-header text-white text-center" style="background-color: #007bff;">
      <h3>Available Rooms</h3>
    </div>

    <div class="card-body">
      <h5 class="mb-3">
        From: <span class="text-primary">{{ $from_date }}</span> |
        To: <span class="text-primary">{{ $to_date }}</span>
      </h5>

      <table class="table table-bordered text-center">
        <thead class="table-dark">
          <tr>
            <th>Category</th>
            <th>Status</th>
            <th>Base Price</th>
            <th>Final Price</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($availableCategories as $cat)
            <tr>
              <td>{{ $cat['category']->name }}</td>

              <td>
                @if ($cat['available'])
                  <span class="badge bg-success">Available</span>
                @else
                  <span class="badge bg-danger">No Room Available</span>
                @endif
              </td>

              <td>{{ number_format($cat['base_price']) }} BDT</td>
              <td>{{ number_format($cat['final_price']) }} BDT</td>

              <td>
                @if ($cat['available'])
                  <form action="{{ route('booking.confirm') }}" method="POST">
                    @csrf
                    <input type="hidden" name="room_category_id" value="{{ $cat['category']->id }}">
                    <input type="hidden" name="name" value="{{ $name }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <input type="hidden" name="phone" value="{{ $phone }}">
                    <input type="hidden" name="from_date" value="{{ $from_date }}">
                    <input type="hidden" name="to_date" value="{{ $to_date }}">
                    <input type="hidden" name="total_price" value="{{ $cat['final_price'] }}">
                    <button type="submit" class="btn btn-success btn-sm">Book Now</button>
                  </form>
                @else
                  <button class="btn btn-secondary btn-sm" disabled>Unavailable</button>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>

</body>
</html>
