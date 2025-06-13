<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kesehatan Mental</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800 min-h-screen flex flex-col">
  <!-- Navbar (ASLI, tidak diubah) -->
  <nav class="bg-emerald-100 shadow-md">
    <div class="max-w-screen-xl mx-auto px-4 py-3 flex justify-between items-center">
      <div class="flex items-center space-x-2">
        <span class="text-2xl">🧠</span>
        <span class="text-2xl font-bold text-blue-600">InnerBloom</span>
      </div>
      <div class="space-x-6 text-gray-700 text-base font-medium">
        <a href="index.php" class="hover:text-blue-600 transition">Home</a>
        <a href="artikel.php" class="hover:text-blue-600 transition">Artikel</a>
        <a href="testimoni.php" class="hover:text-blue-600 transition">Testimoni</a>
        <a href="jadwal.php" class="hover:text-blue-600 transition">Jadwal</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="max-w-screen-xl mx-auto px-4 py-16 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
    <!-- Text -->
    <div>
      <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
        Yuk, Mulai Perjalanan Kesehatan Mental Kamu Bersama <span class="text-blue-500">InnerBloom!</span>
      </h1>
      <p class="text-lg text-gray-600 mb-6">
        Kamu tidak harus menghadapi semuanya sendiri. Kami hadir untuk memberikan layanan konseling online dengan psikolog profesional dan berlisensi.
      </p>
      <div class="space-x-4">
        <a href="jadwal.php" class="bg-lime-500 hover:bg-lime-600 text-white font-semibold px-6 py-3 rounded-full shadow">
          Konsultasi Sekarang
        </a>
      </div>
    </div>

    <!-- Ilustrasi -->
    <div class="flex justify-center">
      <img src="gambar1.png" alt="Ilustrasi Konseling" class="w-full max-w-md">
    </div>
  </section>

  <!-- Footer -->
<footer class="bg-white border-t mt-auto">
  <div class="bg-emerald-100 text-center text-xs text-gray-500 py-3">
    &copy; <?= date('Y') ?> InnerBloom. All rights reserved.
  </div>
</footer>

</body>
</html>
