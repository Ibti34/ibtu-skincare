<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IBTU Skin Care</title>

    {{-- PUBLIC CSS ONLY (Railway-safe) --}}
    <style>
       /* ============================================================
   IBTU SKINCARE - PRODUCTION STYLE (Matches your existing HTML)
   ============================================================ */

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #fdfdfd;
    color: #1f2937;
    line-height: 1.6;
}

/* --- NAVBAR (Matches <nav class="site-navbar">) --- */
header {
    background: #ffffff;
    border-bottom: 1px solid #eee;
    position: sticky;
    top: 0;
    z-index: 1000;
}

.site-navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 5%;
    max-width: 1300px;
    margin: 0 auto;
}

/* Matches the purple link in your screenshots */
.site-navbar a {
    text-decoration: none;
    font-weight: 500;
    color: #2d5a27; /* Dark green */
    margin-left: 20px;
    transition: color 0.3s;
}

.site-navbar a:hover {
    color: #4fa33f;
}

/* --- HERO SECTION (Matches <section class="hero">) --- */
.hero {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    padding: 80px 10%;
    background: linear-gradient(to right, #f4f9f4, #ffffff);
    min-height: 80vh;
}

.hero-content {
    flex: 1;
    min-width: 300px;
}

.hero-content h1 {
    font-size: clamp(2.5rem, 5vw, 4rem);
    color: #1a3a1a;
    margin-bottom: 20px;
    font-weight: 700;
}

.hero-content p {
    font-size: 1.1rem;
    color: #4b5563;
    margin-bottom: 30px;
    max-width: 500px;
}

/* --- BUTTONS (Matches class="hero-btn") --- */
.hero-btn, .btn, button {
    display: inline-block;
    background: #2d5a27; /* Your original green */
    color: #ffffff !important;
    padding: 12px 32px;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.hero-btn:hover, button:hover {
    background: #3e7a36;
    transform: translateY(-2px);
    box-shadow: 0 10px 15px rgba(0,0,0,0.1);
}

/* --- IMAGES (Matches <div class="hero-image">) --- */
.hero-image {
    flex: 1;
    min-width: 300px;
    display: flex;
    justify-content: center;
}

.hero-image img {
    max-width: 100%;
    height: auto;
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

/* --- PRODUCT GRID (Matches your Cards) --- */
.card {
    background: white;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    border: 1px solid #f0f0f0;
    margin: 10px;
    transition: transform 0.3s;
}

.card:hover {
    transform: scale(1.02);
}

.card img {
    border-radius: 10px;
    margin-bottom: 15px;
}

/* --- FOOTER --- */
footer {
    text-align: center;
    padding: 40px;
    background: #f9fafb;
    border-top: 1px solid #eee;
    color: #6b7280;
}

/* --- RESPONSIVE --- */
@media (max-width: 768px) {
    .hero {
        flex-direction: column;
        text-align: center;
        padding: 40px 5%;
    }
    .hero-content {
        margin-bottom: 40px;
    }
    .site-navbar {
        flex-direction: column;
    }
}

/* --- Products Section Styling --- */
.products {
    max-width: 1200px;
    margin: 60px auto;
    padding: 0 20px;
    text-align: center;
}

.products h2 {
    font-size: 2.5rem;
    color: #2d5a27;
    margin-bottom: 40px;
    font-weight: 700;
}

/* The Grid Container */
.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 30px;
    justify-content: center;
}

/* Individual Product Cards */
.product-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    border: 1px solid #f0f4f0;
    transition: transform 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 45px rgba(0,0,0,0.1);
}

.product-card img {
    width: 100%;
    height: 250px;
    object-fit: cover; /* Prevents stretching */
    border-radius: 15px;
    margin-bottom: 15px;
}

.product-card h3 {
    font-size: 1.25rem;
    color: #1f2937;
    margin-bottom: 10px;
}

.product-card p {
    font-weight: 700;
    color: #2d5a27;
    font-size: 1.1rem;
    margin-bottom: 20px;
}

/* Add to Cart Button */
.btn {
    width: 100%;
    background: #2d5a27;
    color: white !important;
    border: none;
    padding: 12px 20px;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s;
}

.btn:hover {
    background: #3e7a36;
}

/* Success Alert */
.alert-success {
    background-color: #d1e7dd;
    color: #0f5132;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 30px;
    display: inline-block;
}
    </style>
</head>
<body>

    @include('partials.site-navbar')

    <main>
        @yield('content')
    </main>

</body>
</html>
