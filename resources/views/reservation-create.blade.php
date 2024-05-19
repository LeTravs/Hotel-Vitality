@extends('layout')

@section('content')
<style> 
#content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    text-align: center; 
    background-image: url('https://i.pinimg.com/736x/9e/ed/2d/9eed2d1815cfd2343c8397d9303d93c7.jpg');
    background-size: cover;
    background-position: center;
}

.submit-btn {
    transition: background-color 0.3s, border-color 0.3s, color 0.3s;
}

.submit-btn:hover {
    background-color: #003366;
    border-color: #003366;
    color: #fff; /* Change text color on hover if needed */
}

/* Hover effect for input fields */
input[type="text"]:hover,
input[type="number"]:hover,
select:hover,
input[type="date"]:hover {
    border-color: #66afe9; /* Change border color on hover */
    box-shadow: 0 0 5px rgba(102, 175, 233, 0.5); /* Add a subtle box shadow on hover */
}


.selectpicker.dropdown-toggle .filter-option {
    color: #000; /* Change the text color to black */
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="background: linear-gradient(to right, #00204a, #00a8e8); border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                <div class="card-body" style="background-color: #f8f9fa; border-radius: 15px;">
                    <h2 class="card-title" style="text-align: center; margin-bottom: 20px; color: #00204a;">Hotel Vitality</h2>
                    
                    @if(session('success'))
                        <p style="color: #28a745; text-align: center;">{{ session('success') }}</p>
                    @endif
                    
                    @if ($errors->any())
                        <div style="color: #dc3545; margin-bottom: 20px;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="reservationForm" action="{{ route('reservation.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="guest_name" style="color: #00204a;">Guest Name:</label>
                            <input type="text" class="form-control" name="guest_name" id="guest_name" value="{{ old('guest_name') }}" style="border-radius: 10px;">
                        </div>
                        
                        <div class="form-group">
                            <label for="room_id" style="color: #00204a;">Room ID:</label>
                            <select class="form-control" name="room_id" id="room_id" style="border-radius: 10px;">
                                @for ($i = 1; $i <= 20; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="check_in_date" style="color: #00204a;">Check In Date:</label>
                            <input type="date" class="form-control" name="check_in_date" id="check_in_date" value="{{ old('check_in_date') }}" style="border-radius: 10px;">
                        </div>

                        <div class="form-group">
                            <label for="check_out_date" style="color: #00204a;">Check Out Date:</label>
                            <input type="date" class="form-control" name="check_out_date" id="check_out_date" value="{{ old('check_out_date') }}" style="border-radius: 10px;">
                        </div>

                        <div class="form-group">
                            <label for="num_of_guests" style="color: #00204a;">Number of Guests:</label>
                            <input type="number" class="form-control" name="num_of_guests" id="num_of_guests" value="{{ old('num_of_guests') }}" min="1" style="border-radius: 10px;">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary submit-btn" style="border-radius: 10px; display: block; margin: 0 auto; background-color: #00204a; border-color: #00204a;">
                            Submit
                        </button>                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
