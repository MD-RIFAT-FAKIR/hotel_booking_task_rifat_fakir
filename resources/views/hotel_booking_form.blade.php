<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Hotel Booking Form</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="bg-light">
    <div class="container mt-5">
      <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
          <h3>Hotel Booking Form</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('check.availability') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" />
                @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Email</label>
                <input
                  type="email"
                  name="email"
                  class="form-control"                  
                />
                @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label class="form-label">Phone</label>
                <input
                  type="text"
                  name="phone"
                  class="form-control"
                  placeholder="01XXXXXXXXX"                  
                />
                @error('phone')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3 mb-3">
                <label class="form-label">From Date</label>
                <input
                  type="date"
                  name="from_date"
                  class="form-control" 
                />
                @error('from_date')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-3 mb-3">
                <label class="form-label">To Date</label>
                <input
                  type="date"
                  name="to_date"
                  class="form-control"                 
                />
                @error('to_date')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <button type="submit" class="btn btn-primary">
              Check Availability
            </button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
