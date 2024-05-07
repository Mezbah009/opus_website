@extends('front.layouts.app')

@section('content')

<style>
    .container {
    display: grid;
    grid-template-columns: auto 1fr; /* Auto for h2 width, 1fr for button width */
    align-items: center; /* Align items vertically */
    gap: 10px; /* Adjust as needed */
}

button {
    justify-self: end; /* Align button to the end (right side) of its grid cell */
}

.bi.bi-phone {
    /* Add any specific styling for the phone icon */
    /* For example, you can change the color, size, or add margins */
    color: #000; /* Example color */
    font-size: 24px; /* Example font size */
    /* Add more styles as needed */
}

</style>
<br>
<br>
<div class="container">
    <h2>{{$job->designation}}</h2>
    <button onclick="window.location.href= '' ">Apply Now</button>

</div>
<p>{!! $job->description !!}</p>


<br>

<div class="col-lg col-md icon-box" style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center;">
    <div class="icon" style="margin-bottom: 10px;"><i class="bi bi-phone"></i></div>
    <div>
        <h4>Contact</h4>
        <h6>+8801715437373 (HR Department)</h6>
        <h6>hr@opus-bd.com</h6>
        <button onclick="window.location.href=''">Apply Now</button>
    </div>
</div>
<br><br>





@endsection
