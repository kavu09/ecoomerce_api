<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Style the header */
        header {
            background-color: #666;
            padding: 30px;
            text-align: center;
            font-size: 35px;
            color: white;
        }

        /* Container for flexboxes */
        section {
            display: -webkit-flex;
            display: flex;
        }

        /* Style the navigation menu */
        nav {
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            background: #ccc;
            padding: 20px;
        }

        /* Style the list inside the menu */
        nav ul {
            list-style-type: none;
            padding: 0;
        }

        /* Style the content */
        article {
            -webkit-flex: 3;
            -ms-flex: 3;
            flex: 3;
            background-color: #f1f1f1;
            padding: 10px;
        }

        /* Style the footer */
        footer {
            background-color: #777;
            padding: 10px;
            text-align: center;
            color: white;
        }

        /* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
        @media (max-width: 600px) {
            section {
                -webkit-flex-direction: column;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

   <form calss="center"action="api/auth/login" method="POST">
    @csrf
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br>
    <label for="Password">Password:</label><br>
    <input type="text" id="password" name="password">  <br> <br> 
     <button type="submit" class="btn">Login</button>
   </form>

</body>

</html>
