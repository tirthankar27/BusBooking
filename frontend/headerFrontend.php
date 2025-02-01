<nav class="flex flex-col sm:flex-row justify-between items-center p-4 bg-white shadow-sm text-green-700 fixed top-0 left-0 right-0 z-10">
    <div class="flex justify-between w-full sm:w-auto">
        <a href="./main.php">
            <img src="assets/logo/logo3.png" alt="" style="height: 50px; width: 80px">
        </a>
        <button id="menuToggle" onclick="spinner()" class="sm:hidden text-green-800">
            <i class="ri-menu-fill"></i>
        </button>
    </div>
    
    <div id="menuItems" class="hidden sm:flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-8 items-center mt-4 sm:mt-0">
        <?php if (!isset($_SESSION['id'])): ?>
            <a href="" class="text-lg font-semibold text-green-700 hover:text-green-900">Contact Us</a>
            <a href="frontend/loginFrontend.php" class="text-lg font-semibold text-green-700 hover:text-green-900">SignIn</a>
            <a href="frontend/signupFrontend.php" class="text-lg font-semibold text-green-700 hover:text-green-900">SignUp</a>
        <?php else: ?>
            <div class="text-lg font-semibold text-green-700 hover:text-green-900">
                <i class="ri-user-3-fill"></i>
                <a href=""><?php echo $_SESSION['name']; ?></a>
            </div>
            <a href="frontend/bookingsFrontend.php" class="text-lg font-semibold text-green-700 hover:text-green-900">My Bookings</a>
            <a href="backend/logoutBackend.php" class="text-lg font-semibold text-green-700 hover:text-green-900">Logout</a>
        <?php endif; ?>
    </div>
</nav>
<script src="assets/dropdown.js"></script>