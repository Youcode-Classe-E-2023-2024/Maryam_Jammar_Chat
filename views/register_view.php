<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>
<div class="flex items-center min-h-screen p-4 bg-gray-100 lg:justify-center">
    <div
            class="flex flex-col overflow-hidden bg-white rounded-lg shadow-lg max md:flex-row md:flex-1 lg:max-w-screen-md"
    >

        <div class="p-5 bg-white md:flex-1">
            <h3 class="my-4 text-2xl font-semibold text-gray-700 text-center">Account Register</h3>
            <form action="index.php?page=register" method="post" class="flex flex-col space-y-5">
                <div class="flex flex-col space-y-1">
                    <label for="picture" class="text-sm font-semibold text-gray-500">Picture </label>
                    <input
                            name="picture"
                            type="file"
                            id="picture"
                            autofocus
                            class="px-4 py-2 transition duration-300 rounded"
                    required/>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="username" class="text-sm font-semibold text-gray-500">Username</label>
                    <input
                            name="username"
                            type="text"
                            id="username"
                            autofocus
                            class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200"
                    required/>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="email" class="text-sm font-semibold text-gray-500">Email</label>
                    <input
                            name="email"
                            type="email"
                            id="email"
                            autofocus
                            class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200"
                    required/>
                </div>
                <div class="flex flex-col space-y-1">
                    <div class="flex items-center justify-between">
                        <label for="password" class="text-sm font-semibold text-gray-500">Password</label>
                    </div>
                    <input
                            name="password"
                            type="password"
                            id="password"
                            class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200"
                    required/>
                </div>

                <div class="flex flex-col space-y-1">
                    <div class="flex items-center justify-between">
                        <label for="c_password" class="text-sm font-semibold text-gray-500">Confirm Password</label>
                    </div>
                    <input
                            name="c_password"
                            type="password"
                            id="c_password"
                            class="px-4 py-2 transition duration-300 border border-gray-300 rounded focus:border-transparent focus:outline-none focus:ring-4 focus:ring-blue-200"
                    required/>
                </div>


                <div>
                    <button
                            name = "register"
                            type="submit"
                            class="w-full px-4 py-2 text-lg font-semibold text-white transition-colors duration-300 bg-blue-900 rounded-md shadow hover:bg-blue-600 focus:outline-none focus:ring-blue-200 focus:ring-4"
                    >
                        Sign up
                    </button>
                </div>
            </form>
        </div>
        <div
                class="p-4 py-6 text-white bg-blue-900 md:w-80 md:flex-shrink-0 md:flex md:flex-col md:items-center md:justify-evenly"
        >
            <div class="my-3 text-4xl font-bold tracking-wider text-center">
                <a>Avito</a>
            </div>
            <!--<p class="mt-6 font-normal text-center text-gray-300 md:mt-0">
                With the power of K-WD, you can now focus only on functionaries for your digital products, while leaving the
                UI design on us!

            </p>-->
            <p class="flex flex-col items-center justify-center mt-10 text-center">
                <span>Already have an account?</span>
                <a href="index.php?page=login" class="underline">Login!</a>
            </p>

        </div>
    </div>
</div>
<!-- plugin for scrollbar  -->
</html>
