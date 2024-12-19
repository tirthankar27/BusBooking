<nav class="flex flex-col gap-2 sm:flex-row justify-between items-center p-4 bg-white text-green-700 fixed top-0 left-0 right-0 z-10">
    <a href="./main.php" class="text-xl text-green-800 font-bold ">🚌BookMyTrip</a>
    <div class="space-y-2 sm:space-y-0 sm:space-x-8 flex flex-col sm:flex-row items-center">
        <?php if (!isset($_SESSION['id'])): ?>
            <a href="" class="text-lg font-semibold text-green-700 hover:text-green-900">Contact Us</a>
            <a href="pages/login.php"class="text-lg font-semibold text-green-700 hover:text-green-900">Login</a>
            <a href="pages/signup.php"class="text-lg font-semibold text-green-700 hover:text-green-900">Signup</a>
        <?php else: ?>
            <a href="" class="text-lg font-semibold text-green-700 hover:text-green-900">Contact Us</a>
            <a href="pages/bookings.php"class="text-lg font-semibold text-green-700 hover:text-green-900">My Bookings</a>
            <a href="pages/logout.php"class="text-lg font-semibold text-green-700 hover:text-green-900">Logout</a>
        <?php endif; ?>
    <div>
</nav>