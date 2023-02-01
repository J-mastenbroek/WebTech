<?php 
    include_once 'header.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    </head>
    <body>
        <div class="policy-container">
            <p class="edit-date">Last updated: January 31, 2023</p>
            <h1>Introduction</h1>
            <p>This Cookie Policy explains what cookies are, how they are used on our website and how you can manage your preferences.</p>
            <h1>What are cookies?</h1>
            <p>Cookies are small text files that are stored on your device when you visit a website. They are widely used to enhance the user experience and to collect information about how the website is used.</p>
            <h1>Types of Cookies</h1>
            <p>There are two main types of cookies: session cookies and persistent cookies. Session cookies are deleted when you close your browser, while persistent cookies remain on your device until they expire or are deleted.</p>
            <h1>How we use cookies</h1>
            <p>We use cookies to improve the user experience on our website, for example, by remembering your preferences and allowing you to log in more easily. We also use cookies to collect information about how our website is used, such as which pages are visited most often. This information is used to help us improve the website and provide a better user experience.</p>
            <h1>Third-party Cookies</h1>
            <p>We use third-party cookies to provide additional functionality and to analyze website usage. For example, we may use Google Analytics to understand how our website is used and to improve the user experience.</p>
            <h1>Managing Cookies</h1>
            <p>You can manage your cookie preferences in your web browser. Most web browsers allow you to control the cookies stored on your device, including the ability to delete cookies and to block cookies from being stored in the future.</p>
            <h1>Consent</h1>
            <p>By using our website, you consent to the use of cookies in accordance with this Cookie Policy. If you do not agree with this policy, you should either not use our website or set your web browser to block cookies.</p>
            <h1>Changes to this Policy</h1>
            <p>We may update this Cookie Policy from time to time. If we make any changes, we will update the date of the policy and post the revised policy</p>
        </div>

        <style>
            /* cookie policy */
            .policy-container{
                position: relative;
                margin: 10%;
            }

            .policy-container h1{
                font-size: 32px;
            }
            
            .edit-date{
                margin-bottom: 5%;
                color: grey;
            }

            @media (max-width: 860px) {
                .policy-container h1{
                    color: black;
                    font-size: 28px;
                }
            }
        </style>
    </body>
</html>
