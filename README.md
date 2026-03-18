<h1>About the Project</h1>
<p>
This is a web-based eCommerce application developed using modern web technologies.
The system supports three types of users: <strong>Admin</strong>, <strong>Normal User</strong>, and <strong>First-Time User</strong>.
Users can register, log in, manage their profiles, browse products, add items to the cart, and purchase products online.
The Admin panel allows complete control over products, users, orders, and website management.
</p>

<h1>User Types</h1>
<ul>
    <li><strong>Admin:</strong> Manages the entire system including products, users, orders, and discounts.</li>
    <li><strong>Normal User:</strong> Registered users who can purchase products, manage carts, and track orders.</li>
    <li><strong>First-Time User:</strong> New visitors who can browse products and register to make purchases.</li>
</ul>

<h1>Project Functionality</h1>

<h2>User Features</h2>
<ul>
    <li>User Registration and Login</li>
    <li>Edit and Manage User Profile</li>
    <li>Search Products</li>
    <li>View Product Details</li>
    <li>Add Products to Cart</li>
    <li>Buy Products (Buy Now Option)</li>
    <li>Apply Discount Coupons</li>
    <li>View Order History</li>
    <li>Add Product Reviews and Ratings</li>
</ul>

<h2>Admin Panel Features</h2>
<ul>
    <li>Admin Login</li>
    <li>Dashboard Overview</li>
    <li>Add, Edit, and Delete Products</li>
    <li>Manage Product Categories</li>
    <li>Manage Users</li>
    <li>View and Manage Orders</li>
    <li>Manage Discount Coupons</li>
    <li>Manage Product Reviews</li>
</ul>

<h1>Technologies Used</h1>
<ul>
    <li><strong>Frontend:</strong> HTML, CSS, JavaScript, Bootstrap</li>
    <li><strong>Backend:</strong> PHP, Laravel Framework</li>
    <li><strong>Database:</strong> MySQL</li>
    <li><strong>Tools:</strong> Composer, XAMPP / Laragon</li>
</ul>

<h1>What Changes Have Been Made</h1>
<ul>
    <li>Added the MySQL database. The database file is provided in the project folder as <strong>localhost.sql</strong>.</li>
    <li>Renamed the <strong>.env.example</strong> file to <strong>.env</strong> and added the email credentials, Razorpay Key, and Secret Key.</li>
    <li>Installed Laravel dependencies using the command <strong>composer install</strong>.</li>
    <li>Generated the application key using <strong>php artisan key:generate</strong>.</li>
</ul>

<h1>How to Run the Project</h1>
<ul>
    <li>Install <strong>XAMPP</strong> or <strong>Laragon</strong>.</li>
    <li>Place the project folder inside:
        <ul>
            <li>XAMPP: <strong>C:\xampp\htdocs\</strong></li>
            <li>Laragon: <strong>C:\Laragon\www\</strong></li>
        </ul>
    </li>
    <li>Start <strong>Apache</strong> and <strong>MySQL</strong>.</li>
    <li>Open browser and visit:
        <strong>http://localhost/project-folder</strong>
    </li>
</ul>

<h1>Database Setup</h1>
<ul>
    <li>Open <strong>phpMyAdmin</strong>.</li>
    <li>Create a new database (example: <strong>Madhav-Website</strong>).</li>
    <li>Import the file <strong>localhost.sql</strong>.</li>
</ul>

<h1>Requirements</h1>
<ul>
    <li>PHP 8.x</li>
    <li>Composer</li>
    <li>MySQL</li>
    <li>XAMPP or Laragon</li>
</ul>
