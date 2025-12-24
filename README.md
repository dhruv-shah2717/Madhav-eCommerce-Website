<h1>What Changes Have Been Made</h1>
<ul>
    <li>Added the MySQL database. The database file is provided in the project folder as <strong>localhost.sql</strong>.</li>
    <li>Renamed the <strong>.env.example</strong> file to <strong>.env</strong> and added the email credentials, Razorpay Key, and Secret Key.</li>
    <li>Installed Laravel dependencies using the following command:
        <strong>composer install</strong>
    </li>
    <li>Generated the application key using:
        <strong>php artisan key:generate</strong>
    </li>
</ul>

<h1>How to Run the Project</h1>
<ul>
    <li>Install <strong>XAMPP</strong> or <strong>Laragon</strong> on your system.</li>
    <li>Paste the project folder in:
        <ul>
            <li>XAMPP: <strong>C:\xampp\htdocs\</strong></li>
            <li>Laragon: <strong>C:\Laragon\www\</strong></li>
        </ul>
    </li>
    <li>Start <strong>Apache</strong> and <strong>MySQL</strong> from the control panel.</li>
    <li>Open your browser and go to:
        <strong>http://localhost/project-folder</strong>
    </li>
</ul>

<h1>Database Setup</h1>
<ul>
    <li>Open <strong>phpMyAdmin</strong>.</li>
    <li>Create a new database (example: <strong>localhost</strong>).</li>
    <li>Import the database file:
        <strong>localhost.sql</strong>
    </li>
</ul>

<h1>Requirements</h1>
<ul>
    <li>PHP 8.x</li>
    <li>Composer</li>
    <li>MySQL</li>
    <li>XAMPP or Laragon</li>
</ul>
