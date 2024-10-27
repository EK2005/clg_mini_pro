<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dreamworld Textiles</title>
<style>
h2 {
    display: inline;
    color: white;
    text-shadow: 4px 4px 4px blue;
}

body {
    background-image: url('heading.png');
    background-size: auto 250%;
    height: 300px;
    width: 100%;
    background-repeat: no-repeat;
    background-position: center;
}

.header {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    padding: 20px;
}

.ftp_login{

    font-size: 24px;
}

button
{
    font-size: 24px;
    padding: 5px 10px;
    background-color:chartreuse;
    cursor: pointer;
   
   
}

button:hover
{
    background-color:wheat;
    border-width:10px;
    
}
.title {
    font-size: 24px;
    font-weight: bold;
}

.search-container {
    display: flex;
    align-items: center;
}

.search-input {
    padding: 5px;
    font-size: 16px;
    width: 700px; /* Adjust width as needed */
}
.search-input:hover {
    border-color: lawngreen;
 border-width: 4px;
}


.search-btn {
    padding: 5px 10px;
    font-size: 16px;
    cursor: pointer;
    background-color: lightcoral;
}

.search-btn:hover {
    background-color: lawngreen;
}

.option {
    margin: 0 10px;
    font-size: 10px;
    color: green;
    cursor: pointer;
    text-decoration: none;
    background-color: LightGrey;
    font-size: 20px;
}
.option:hover {
    background-color: aqua;
}


.container {
    width: 100%;
    overflow: hidden;
    white-space: nowrap;
    position: relative;
}

.moving-image {
    width: 45%; /* Adjust the width to a smaller size */
    display: inline-block;
}

.images-wrapper {
    display: flex;
    animation: scroll 20s linear infinite;
}

@keyframes scroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-100%);
    }
}

.collections {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

.collection-item {
    text-align: center;
}

.collection-item img {
    width: 250px; /* Adjust as needed */
    height: auto;
    display: block;
    margin: 0 auto;
}

.collection-item p {
    margin-top: 10px;
}

.menu {
    position: fixed;
    left: 0;
    top: 0;
    width: 200px;
    height: 100%;
    background-color: #333;
    padding-top: 60px;
    transform: translateX(-100%);
    transition: transform 0.3s ease;
    color: white;
    text-align: left;
    padding-left: 80px;
}

.menu p {
    margin: 20px 0;
    cursor: pointer;
}

.menu.active {
    transform: translateX(0);
}

.hamburger {
    font-size: 40px; /* Adjust the size as needed */
    cursor: pointer;
    color: black;
}

.content {
    padding: 50px;
}

.mine {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.a1 {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 35px;
    width: 250px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    text-align: center;
}

.a1 img {
    width: 95%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 30px;
}

.a1 h4 {
    margin: 10px 0;
}

.a1 p {
    margin: 10px 0;
    font-size: 16px;
    color: #333;
}

.a1 button {
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 1px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
}

.a1 button:hover {
    background-color: #0056b3;
}

.a1 a {
    display: block;
    margin-top: 10px;
    color: #007bff;
    text-decoration: none;
    font-size: 14px;
}

.a1 a:hover {
    text-decoration: underline;
}

footer {
    background-color: Lightblue;
    border-top: 1px solid #ddd;
    padding: 20px;
    margin-top: 40px;
}

footer div {
    margin-bottom: 10px;
}

footer h4 {
    margin: 5px 0;
}

footer p {
    margin: 0;
    font-size: 14px;
    color: #333;
}

</style>
</head>

<body>
<div class="header">
    <div class="hamburger" onclick="toggleMenu()">☰</div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

    <div class="title">Dreamworld Textiles</div>
    <div class="search-container">
        <input type="text" class="search-input" placeholder="Search....." id="searchInput">
        <button class="search-btn" onclick="performSearch()">Search</button> 
        <a href="viewcart.php"><img src="images/cart.webp" alt="Cart" style="width: 40px; height: auto; vertical-align: middle;"></a>
    </div>
</div>
<center>



<div class="options-container">
    <u><a href="member.php" class="option">Become a Supplier</a></u> |
    <u><a href="newsroom.php" class="option">Newsroom</a></u> |
    <u><a href="profile.php" class="option">Profile</a></u> |
    <u><a href="aboutus.php" class="option">About Us</a></u>
</div><br><br>

<div class="options-container">
    <u><a href="pattern.php" class="option">customize pattern</a></u> |
    <u><a href="customersupport.php" class="option">customersupport</a></u> |
    <u><a href="recycle.php" class="option">recycle</a></u> |
    <u><a href="tailoring1.php" class="option">Tailoring</a></u>
</div>
<h2></h2><br>

<div class="login">
<a href="login.php" target="left"><button>LOGIN</button></a><a href="signin.php"><button>SIGNIN</button></a></div><br><br>
</center>
<marquee dir="right" style="background-color: yellow;">
Aadi sales available! &nbsp;&nbsp; Get exciting gifts and prices &nbsp;&nbsp; free delivery &nbsp;&nbsp; cash on delivery &nbsp;&nbsp; easy return &nbsp;&nbsp; play games! &nbsp;&nbsp; No delivery charges!
Special Offers Inside! &nbsp;&nbsp; Limited Time Sale! &nbsp;&nbsp; Summer Collection Launch! &nbsp;&nbsp; 50% Off Selected Items! &nbsp;&nbsp; Free Shipping Today! &nbsp;&nbsp; New Arrivals Daily! &nbsp;&nbsp; Shop Now for Best Deals! &nbsp;&nbsp; Clearance Sale - Up to 70% Off! &nbsp;&nbsp; Buy One, Get One Free! &nbsp;&nbsp; Exclusive Online Discounts! &nbsp;&nbsp; Last Chance to Save! &nbsp;&nbsp; Aadi sales available! &nbsp;&nbsp; Get exciting gifts and prices &nbsp;&nbsp; free delivery &nbsp;&nbsp; cash on delivery &nbsp;&nbsp; easy return &nbsp;&nbsp; play games! &nbsp;&nbsp; No delivery charges!
Special Offers Inside! &nbsp;&nbsp; Limited Time Sale! &nbsp;&nbsp; Summer Collection Launch! &nbsp;&nbsp; 50% Off Selected Items! &nbsp;&nbsp; Free Shipping Today! &nbsp;&nbsp; New Arrivals Daily! &nbsp;&nbsp; Shop Now for Best Deals! &nbsp;&nbsp; Clearance Sale - Up to 70% Off! &nbsp;&nbsp; Buy One, Get One Free! &nbsp;&nbsp; Exclusive Online Discounts! &nbsp;&nbsp; Last Chance to Save! &nbsp;&nbsp; 
</marquee><br><br><br>

<div class="container">
    <div class="images-wrapper">
        <img src="images/Screenshot (271).png" alt="Image 1" class="moving-image">
        <img src="images/Screenshot (267).png" alt="Image 2" class="moving-image">
        <img src="images/Screenshot (273).png" alt="Image 3" class="moving-image">
        <img src="images/Screenshot (272).png" alt="Image 4" class="moving-image">
        <img src="images/Screenshot (271).png" alt="Image 1" class="moving-image">
        <img src="images/Screenshot (267).png" alt="Image 2" class="moving-image">
        <img src="images/Screenshot (273).png" alt="Image 3" class="moving-image">
        <img src="images/Screenshot (272).png" alt="Image 4" class="moving-image">
    </div>
</div>
<br>
<br>

<div class="menu" id="menu">
    <a href="saree.php?dress=profession"  style="text-decoration:none;color:inherit;"> <p>*Profession</p></a>
<a href="saree.php?dress=ethnic"  style="text-decoration:none;color:inherit;">  <p>Women Ethnic</p></a>
<a href="saree.php?dress=western" style="text-decoration:none;color:inherit;">   <p>Women Western</p></a>

<a href="saree.php?dress=kurti"  style="text-decoration:none;color:inherit;">  <p>kurti collections</p></a>
<a href="saree.php?dress=saree"   style="text-decoration:none;color:inherit;">  <p>saree collections</p></a>
<a href="saree.php?dress=Tops"  style="text-decoration:none;color:inherit;">  <p>Tshirt collections</p></a>
<a href="saree.php?dress=jeans"   style="text-decoration:none;color:inherit;">  <p>Jeans collections</p></a>

<a href="restocking.php" style="text-decoration:none;color:inherit;">  <p>*restocking notify</p></a>

<a href="saree.php?dress=sports" style="text-decoration:none;color:inherit;">   <p>Sports Wear</p></a>
<a href="pattern.php" style="text-decoration:none;color:inherit;">  <p>*Customize pattern</p></a>
<a href="chatbox.php" style="text-decoration:none;color:inherit;">  <p>*chatbox</p></a>
<a href="customersupport.php"  style="text-decoration:none;color:inherit;">  <p>*Customer support</p></a>

<a href="recycle.php" style="text-decoration:none;color:inherit;">  <p>*Recycle textiles</p></a>
<a href="wedding1.php" style="text-decoration:none;color:inherit;">  <p>*Wedding Special</p></a>
<a href="tailoring1.php" style="text-decoration:none;color:inherit;">  <p>*Custom tailoring</p></a>

</div>






   <center> <h3 style="font-family:verdana;"><u>Our Collections</u></h3></center>
 <div class="collections">
 <div class="collection-item">
                    <a href="saree.php?dress=kurti"><img src="images/kurti.png" alt="Kurti"></a>
                    <p>Kurti</p>
                </div>
            
            <div class="collection-item">
                <a href="saree.php?dress=saree"><img src="images/Screenshot (279).png" alt="Saree"></a>
                <p>Saree</p>
            </div>
        </div>
        <div class="collections">
            <div class="collection-item">
                <a href="saree.php?dress=jeans"><img src="images/OIP.jpeg" alt="Jeans"></a>
                <p>Jeans</p>
            </div>
            <div class="collection-item">
               <a href="saree.php?dress=Tops"> <img src="images/tshirt/tshirt1.jpg" alt="Tops"></a>
                <p>T-shirt</p>
            </div>
        </div>
    </div>











 <footer>
<center>

        <div>
            <h4>Our Office Address</h4>
            <p> No 14,Natesan street,vandalur,600048.</p>
        </div>
        <div>
            <h4>General Enquiries</h4>
            <p>Email: Dreamworldtexile@gmail.com</p>
        </div>
        <div>
            <h4>Call Us</h4>
            <p>Phone: +1 (123) 456-7890</p>
        </div>
        <div>
            <h4>Our Timing</h4>
            <p>Mon - Fri: 9:00 AM - 6:00 PM</p>
            <p>Sat: 10:00 AM - 4:00 PM</p>
            <p>Sun: Closed</p>
            
        </div>
</center>
    </footer>


<script>
function toggleMenu() {
    var menu = document.getElementById("menu");
    menu.classList.toggle("active");
}
</script>

</body>
</html>
