@extends('layouts.app')

@section('content')
<div class="contact-wrapper">

    <div class="contact-box">

        <h2>Contact Us</h2>

        <p>
            Have a question or need help? Send us a message and we’ll get back to you.
        </p>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="contact-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="#">
            @csrf

            <input
                type="text"
                name="name"
                placeholder="Your Name"
                required
            >
<br><br>
            <input
                type="email"
                name="email"
                placeholder="Your Email"
                required
            >
<br><br>
            <textarea
                name="message"
                rows="4"
                placeholder="Your Message"
                required
            ></textarea>
<br><br>
            <button type="submit">
                Send Message
            </button>

        </form>

    </div>

</div>
@endsection
