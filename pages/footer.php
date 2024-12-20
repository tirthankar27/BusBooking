<head>

</head>
<footer>
    <div class="flex flex-col w-full h-fit bg-green-100 text-green-700 px-6 md:px-14 py-10 rounded-xl">
        <div class="flex flex-row justify-center items-start h-full md:flex-row m-1 font space-x-16">
            <div class="flex flex-col justify-center items-center h-full w-1/5">
                <h1 class="text-2xl text-green-800 font-bold ">🚌BookMyTrip</h1>
                <p class=" text-xs text-green-800 font-semibold">BookMyTrip is my project where I developed a system where users can signup and login and book bus tickets at reasonable price. This project still at development phase so some pages are still missing. But will add those pages in near future</p>
            </div>
            <span class="flex  justify-center items-center text-3xl w-1/5 font-semibold">
                <?php
                    date_default_timezone_set('Asia/Kolkata');
                    $t=date("h:i A");
                    echo "$t";
                ?>
            </span>
            <about class="flex flex-col justify-center items-start font-semibold w-1/5">
                <h1 class="font-bold">About BookMyTrip</h1>
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
            <info class="flex flex-col justify-center items-start font-semibold w-1/5">
                <h1 class="font-bold">Info</h1>
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
            <social class="flex flex-col justify-center items-start font-semibold w-1/5">
                <h1 class="font-bold">Connect with us</h1>
                <div class="flex hover:text-green-900">
                    <i class="ri-github-line"></i>
                    <a href="https://github.com/tirthankar27" target="_blank">GitHub</a>
                </div>
                <div class="flex hover:text-green-900">
                    <i class="ri-linkedin-fill"></i>
                    <a href="https://www.linkedin.com/in/tirthkeeppushing0036/" target="_blank">LinkedIn</a>
                </div>
            </social>
        </div>
    </div>
    <div class="flex justify-center items-center bg-green-400 text-green-800 font-semibold border-t-2 border-green-600">
        <?php 
            $d=date("Y");
            echo "<p>&copy;".$d." BookMyTrip . All Rights Reserved.</p>";
        ?>
    </div>
</footer>