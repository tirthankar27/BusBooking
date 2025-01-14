# BusBooking
This repo contains my codes for the website to book a bus ticket.

Author - Tirthankar Ghosh
## Description
This is the project where I have tried to create a website to book bus tickets online.<br>
-It has login and signup for user authentication.<br>
-Database to manage the users and bus bookings.<br><br>

## Pages
-main.php -> handles the session start and include guest.php<br><br>
-guest.php -> includes the header.php search.php footer.php<br><br>
-header.php -> creates header/nav bar. Handles different design for login users and visitors<br><br>
-footer.php -> includes details about this project and various pages link (still under development).Also includes linkedIn and github links.<br><br>
-signup.php -> allows users to signup for free providing their name email password which get stored in database.If already have account then can redirect to login.php <br><br>
-users.php -> this connects the database to contain user information and bus bookings.<br><br>
-login.php -> this allows user to login provided they have an account. If don't then have the option to redirect ti signup.php<br><br>
-search.php -> handles the part where user can search for their destination and date and few tabs for offers details. Uppon hitting search redirects to busBook.php<br><br>
-busBook.php -> shows the available buses for required destination wtih details. Till now it contains bus for 2 location but in future will include more. This page redirects to ticketsBook.php<br><br>
-ticketsBook.php -> this page allows the user to input their name and select the seat. Till now it allows one booking at a time but will add the feature to allow multiple bookings at once. this page redirects to payment.php<br><br>
-payment.php -> this page handles the payments allowing debit credit or UPI payments. Till now it's just static as I have not included any payment gateway but if required I'll add in future.<br><br>
-bookings.php -> allows user to fetch their all booking details. Till now they can't download their tickets but will add the feature with tcpdf soon. Also user can delete their bookings by redirecting to deleteBooking.php<br><br>
-deleteBooking.php -> allows users to delete their booking one at a time.<br><br>
-logout.php -> delete all the session details and logs out the user<br><br>