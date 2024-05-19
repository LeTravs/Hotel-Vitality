@extends('layout')

@section('content')
<div style="display: flex; justify-content: center; align-items: center;;">
    <div class="promo-container">
        <div class="promo-text">
            We have a special promo and you'll love it!
        </div>
        <a href="{{ route('reservation.create') }}" class="btn btn-3d">Book Now</a>
    </div>
</div>

@endsection

<style>
#content {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center; 
    background-image: url('https://i.pinimg.com/736x/9e/ed/2d/9eed2d1815cfd2343c8397d9303d93c7.jpg');
    background-size: cover;
    background-position: center;
}
    .promo-container {
        text-align: center;
    }

    .promo-text {
        font-size: 24px;
        margin-bottom: 20px;
        color: #fff; 
        background: linear-gradient(135deg, #4a69bd, #2a4f92); 
        padding: 20px 40px;
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); 
        transform: perspective(100px) rotateX(5deg); 
    }

    .btn.btn-3d {
    display: inline-block;
    padding: 15px 40px;
    border: none;
    border-radius: 5px;
    color: #fff;
    background-color: #00c9ff; /* Button background color */
    text-decoration: none;
    font-size: 20px;
    cursor: pointer;
    transition: transform 0.3s, box-shadow 0.3s;
    position: relative;
    overflow: hidden;
}

.btn.btn-3d::before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    width: 300%;
    height: 300%;
    background: rgba(255, 255, 255, 0.1);
    transition: all 0.5s;
    border-radius: 50%;
    z-index: 1;
    transform: translate(-50%, -50%);
}

.btn.btn-3d:hover::before {
    width: 0;
    height: 0;
}

.btn.btn-3d {
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

.btn.btn-3d:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

</style>
