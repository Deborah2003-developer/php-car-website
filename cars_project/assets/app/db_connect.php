<?php
    const server = "localhost";
   //  const db_username = 'u710683456_earlycode';
   //  const db_password = 'a5Lv+ax&';
   //  const database = 'u710683456_cars';

   //  Local
    const db_username = 'root';
    const db_password = '';
    const database = 'cars_project';


    $connectDB =  mysqli_connect(server,db_username,db_password,database);

    if (!$connectDB) {
       die("Error: Failed to connect ". mysqli_connect_error());
    }