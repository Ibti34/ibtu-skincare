@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-4">

    <h2 class="text-2xl font-semibold mb-6">Contact Us</h2>

    <p class="text-blue-600 mb-8">
        Have a question or need help? Send us a message and we’ll get back to you.
    </p>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <form method="POST" action="#" class="space-y-6 max-w-sm">
        @csrf

        <input
            type="text"
            name="name"
            placeholder="Your Name"
            required
            class="w-full border-b border-gray-300 py-2 focus:outline-none focus:border-black"
        >

        <input
            type="email"
            name="email"
            placeholder="Your Email"
            required
            class="w-full border-b border-gray-300 py-2 focus:outline-none focus:border-black"
        >

        <textarea
            name="message"
            rows="4"
            placeholder="Your Message"
            required
            class="w-full border-b border-gray-300 py-2 focus:outline-none focus:border-black resize-none"
        ></textarea>

        <button
            type="submit"
            class="bg-white text-black px-6 py-2 rounded hover:bg-blue-600 transition"
        >
            Send Message
        </button>
    </form>

</div>
@endsection
