<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chat room Avito</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <div>
    <section class=" relative flex flex-col items-center max-w-lg px-4 sm:pt-24 pt-12 sm:pb-8 mx-auto text-left md:max-w-none md:text-center mt-56">
      <div class="max-w-lg px-4 pb-24 mx-auto text-left md:max-w-none md:text-center">
        <div class='text-center space-x-4'>
            <h1>Bienvenue sur notre Chat Room ! </h1>
          <p class="text-lg text-gray-600 mb-12">
          Connectez-vous ou inscrivez-vous pour accéder au chat room.
                  </p>
          <a href="./views/login_view.php">
            <button  class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Login</button>

          </a>

          <a href="./views/register_view.php">
            <button class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Register</button>

          </a>
        </div>
      </div>
    </section>
  </div>

</body>

</html>