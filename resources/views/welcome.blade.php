<!DOCTYPE html>
<html><head><title>San Carlos City School</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>body{margin:0;font-family:Arial;background:#f4f6f9}
header{background:#b71c1c;color:white;padding:15px;text-align:center}
nav{background:#d32f2f;padding:10px;text-align:center}
nav a{color:white;margin:0 10px;text-decoration:none;font-weight:bold}
.hero{background:linear-gradient(#c62828,#b71c1c);color:white;padding:50px 20px;text-align:center}
.card{background:white;padding:20px;border-radius:10px;width:320px;box-shadow:0 2px 8px rgba(0,0,0,0.1);margin:10px}
.cards{display:flex;flex-wrap:wrap;justify-content:center;padding:20px}
input,select{width:100%;padding:10px;margin:5px 0;border:1px solid #ccc;border-radius:5px}
.btn{background:#b71c1c;color:white;padding:12px;border:none;border-radius:5px;width:100%;font-weight:bold}
.success{background:#c8e6c9;padding:10px;border-radius:5px;color:#2e7d32;margin:10px}
</style></head>
<body>
<header><h2>SAN CARLOS CITY SCHOOL</h2><p>Excellence and Service</p></header>
<nav><a href="/">Home</a><a href="/about">About</a><a href="/courses">Courses</a><a href="/contact">Contact</a><a href="/students">Students</a></nav>

<div class="hero">
<h1>Welcome to San Carlos City School</h1>
<p>Enrollment SY 2026-2027 is NOW OPEN!</p>
@if(session('success'))<div class="success">{{ session('success') }}</div>@endif
</div>

<div class="cards">
<div class="card">
<h3>Enroll Now - Online</h3>
<form method="POST" action="/enroll">
@csrf
<input name="fullname" placeholder="Full Name" required>
<select name="grade_level" required><option value="">Grade Level</option><option>Grade 7</option><option>Grade 8</option><option>Grade 9</option><option>Grade 10</option><option>Grade 11</option><option>Grade 12</option></select>
<input name="strand" placeholder="Strand: STEM, HUMSS, ABM, TVL (if SHS)">
<input name="contact" placeholder="Contact Number" required>
<button class="btn">Submit Enrollment</button>
</form>
</div>

<div class="card"><h3>Our Courses</h3>
<p>✅ Junior High School</p>
<p>✅ Senior High: STEM, HUMSS, ABM, TVL-ICT</p>
<p>✅ Quality Education from San Carlos City</p>
<a href="/courses">View All Courses</a>
</div>

<div class="card"><h3>Announcements</h3>
<p><b>Enrollment Open!</b><br>Visit Registrar or enroll online now.</p>
<p><b>Brigada Eskwela</b><br>Join us this May!</p>
<p style="color:#b71c1c">Data saved to database ✅</p>
</div>
</div>
<footer style="background:#b71c1c;color:white;text-align:center;padding:15px">&copy; 2026 San Carlos City School | Made by Janrel Canaya - BSIT</footer>
</body></html>
