<footer>
    <div class="flex flex-col w-full bg-stone-50 text-green-700 px-6 md:px-14 py-10 rounded-t-lg shadow-inner">
        <div class="flex flex-col md:flex-row justify-center items-start h-full m-1 font space-y-8 md:space-y-0 md:space-x-16">
            <div class="flex flex-col justify-center items-start h-full w-full md:w-1/4">
                <h1 class="text-2xl text-green-800 font-bold mb-2"><img src="assets/logo/logo3.png" alt="" style="height: 100px; width: 160px"></h1>
                <p class="text-xs text-green-800 font-semibold md:text-sm">BookMyTrip is a project I developed to provide users with a seamless platform for signing up, logging in, and booking bus tickets at competitive prices. While the project is still under development and some pages are currently incomplete, I plan to incorporate the remaining features in the near future.</p>
            </div>
            <about class="flex flex-col justify-center items-start font-semibold w-full md:w-1/4 space-y-2">
                <h1 class="font-bold text-lg">About BookMyTrip</h1>
                <div class="flex hover:text-green-900">
                    <a href="" target="_blank">About us</a>
                </div>
                <div class="flex hover:text-green-900">
                    <a href="" target="_blank">Contact Us</a>
                </div>
                <div class="flex hover:text-green-900">
                    <a href="" target="_blank">Offers</a>
                </div>
                <div class="flex hover:text-green-900">
                    <a href="" target="_blank">Mobile app</a>
                </div>
                <div class="flex hover:text-green-900">
                    <a href="" target="_blank">Gift cards</a>
                </div>
            </about>
            <info class="flex flex-col justify-center items-start font-semibold w-full md:w-1/4 space-y-2">
                <h1 class="font-bold text-lg">Info</h1>
                <div class="flex hover:text-green-900">
                    <a href="" target="_blank">TnC</a>
                </div>
                <div class="flex hover:text-green-900">
                    <a href="" target="_blank">Privacy Policy</a>
                </div>
                <div class="flex hover:text-green-900">
                    <a href="" target="_blank">FAQ</a>
                </div>
                <div class="flex hover:text-green-900">
                    <a href="" target="_blank">Bus Timetable</a>
                </div>
                <div class="flex hover:text-green-900">
                    <a href="" target="_blank">Agency registration</a>
                </div>
                <div class="flex hover:text-green-900">
                    <a href="" target="_blank">Customer support</a>
                </div>
            </info>
            <social class="flex flex-col justify-center items-start font-semibold w-full md:w-1/4 space-y-2">
                <h1 class="font-bold text-lg">Connect with us</h1>
                <div class="flex hover:text-green-900">
                    <i class="ri-github-line"></i>
                    <a href="https://github.com/tirthankar27" target="_blank">GitHub</a>
                </div>
                <div class="flex hover:text-green-900">
                    <i class="ri-linkedin-fill"></i>
                    <a href="https://www.linkedin.com/in/tirthkeeppushing0036/" target="_blank">LinkedIn</a>
                </div>
                <div class="flex hover:text-green-900">
                    <i class="ri-twitter-x-line"></i>
                    <a href="" target="_blank">Twitter-X</a>
                </div>
                <div class="flex hover:text-green-900">
                    <i class="ri-instagram-line"></i>
                    <a href="" target="_blank">Instagram</a>
                </div>
                <div class="flex hover:text-green-900">
                    <i class="ri-facebook-fill"></i>
                    <a href="" target="_blank">facebook</a>
                </div>
            </social>
        </div>
    </div>

    <div class="flex justify-center items-center bg-stone-100 text-green-800 font-semibold border-t border-stone-200 py-2">
        <?php 
            $d = date("Y");
            echo "<p>&copy;".$d." BookMyTrip . All Rights Reserved.</p>";
        ?>
    </div>
</footer>