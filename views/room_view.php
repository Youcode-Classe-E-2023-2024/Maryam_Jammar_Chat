<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat room Avito</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
</head>

<body>
<!-- component -->
<!-- Inspired by slack ui clone https://tailwindcomponents.com/component/slack-clone-1 -->

<div class="font-sans antialiased h-screen flex">
    <!-- Sidebar / channel list -->
    <div class="bg-gray-900 text-purple-lighter flex-none w-24 p-6 hidden md:block">
        <div class="cursor-pointer mb-4 border-b border-gray-600 pb-2">
            <div
                class="bg-white h-12 w-12 flex items-center justify-center text-black text-2xl font-semibold rounded-3xl mb-1 overflow-hidden">
                <img src="https://cdn.discordapp.com/embed/avatars/0.png" alt="">
            </div>
        </div>


        <?php
            global $roomO;
            $rooms = $roomO->getRooms();
            foreach ($rooms as $room) :
        ?>
        <div class="room-image cursor-pointer mb-4 rounded-full">
            <div
                class=" bg-white h-12 w-12 flex items-center justify-center text-black text-2xl font-semibold rounded-3xl mb-1">
                <img class=" rounded-full" src="<?php echo $room['room_profile'] ?>"
                >
                <div  class="room-popup bg-white hidden absolute p-2 text-black text-sm font-semibold rounded shadow-md -mt-10 -ml-2" style="left: 20px;">
                    <?php echo $room['room_name'] ?>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
        <div class="cursor-pointer">
            <div id="toggle"
                 class="bg-white opacity-25 h-12 w-12 flex items-center justify-center text-black text-2xl font-semibold rounded-3xl mb-1 overflow-hidden">
                <a >
                    <svg class="fill-current h-10 w-10 block" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 20 20">
                        <path
                                d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z" />
                    </svg>
                </a>

            </div>
        </div>

<!--        add room-->
        <!-- Modal toggle -->
<!--        <button id="toggle" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">-->
<!--            Toggle modal-->
<!--        </button>-->

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Add New Room
                        </h3>
                        <button type="button" id="x" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form class="p-4 md:p-5" action="index.php?page=room" method="post">
                        <div class="grid gap-4 mb-4 grid-cols-1">
                            <div class="flex-col">
                                <div class="">
                                    <label for="room_profile" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room Profile</label>
                                    <input type="file" name="room_profile" id="room_profile" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type room name" required="">
                                </div>

                                <div class="">
                                    <label for="room_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" name="room_name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type room name" required="">
                                </div>
                            </div>


                            <div class="md:col-span-5 py-4">
                                <label for="creator">Members</label>
                                <select name="creator[]" id="creator" multiple required>
                                    <?php global $userO1;
                                     $users = $userO1->getUsers();
                                     foreach ($users as $user) :?>
                                        <option value="<?= $user["user_id"] ?>"><?= $user["username"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                        </div>
                        <button name="submit" type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                            Add new product
                        </button>
                    </form>
                </div>
            </div>
        </div>




    </div>
    <div class="bg-gray-800 text-purple-lighter flex-none w-64 pb-6 hidden md:block">
        <div
            class="text-white mb-2 mt-3 px-4 flex justify-between border-b border-gray-600 py-1 shadow-xl">
            <div class="flex-auto">
                <h1 class="font-semibold text-xl leading-tight mb-1 truncate">My Server</h1>
            </div>
            <div>
                <svg class="arrow-gKvcEx icon-2yIBmh opacity-50 cursor-pointer" width="24"
                     height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"
                          d="M16.59 8.59004L12 13.17L7.41 8.59004L6 10L12 16L18 10L16.59 8.59004Z">
                    </path>
                </svg>
            </div>
        </div>
        <div class="mb-8">
            <div class="px-4 mb-2 text-white flex justify-between items-center">
                <div class="opacity-75 cursor-pointer">GENERAL</div>
                <div>
                    <svg class="fill-current h-5 w-5 opacity-50 cursor-pointer"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z" />
                    </svg>
                </div>
            </div>
            <div class="bg-teal-dark cursor-pointer font-semibold py-1 px-4 text-gray-300">#
                general</div>
        </div>
        <div class="mb-8">
            <div class="px-4 mb-2 text-white flex justify-between items-center">
                <div class="opacity-75 cursor-pointer">VOICE</div>
                <div>
                    <svg class="fill-current h-5 w-5 opacity-50 cursor-pointer"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z" />
                    </svg>
                </div>
            </div>
            <div
                class="bg-teal-dark hover:bg-gray-800 cursor-pointer font-semibold py-1 px-4 text-gray-300">
                ? General</div>
        </div>
    </div>
    <!-- Chat content -->
    <div class="flex-1 flex flex-col bg-gray-700 overflow-hidden">
        <!-- Top bar -->
        <div class="border-b border-gray-600 flex px-6 py-2 items-center flex-none shadow-xl">
            <div class="flex flex-col">
                <h3 class="text-white mb-1 font-bold text-xl text-gray-100">
                    <span class="text-gray-400">#</span> general</h3>
            </div>
        </div>
        <!-- Chat messages -->
        <div class="px-6 py-4 flex-1 overflow-y-scroll">

            <!-- A message -->
            <div class="border-b border-gray-600 py-3 flex items-start mb-4 text-sm">
                <img src="https://cdn.discordapp.com/embed/avatars/3.png" class="cursor-pointer w-10 h-10 rounded-3xl mr-3">
                <div class="flex-1 overflow-hidden">
                    <div>
                        <span class="font-bold text-red-300 cursor-pointer hover:underline">User</span>
                        <span class="font-bold text-gray-400 text-xs">10:20</span>
                    </div>
                    <p class="text-white leading-normal">Discord is awesome!</p>
                </div>
            </div>
            <!-- A message -->
            <!-- A message -->
            <div class="border-b border-gray-600 py-3 flex items-start mb-4 text-sm">
                <img src="https://cdn.discordapp.com/embed/avatars/4.png" class="cursor-pointer w-10 h-10 rounded-3xl mr-3">
                <div class="flex-1 overflow-hidden">
                    <div>
                        <span class="font-bold text-red-300 cursor-pointer hover:underline">User</span>
                        <span class="font-bold text-gray-400 text-xs">10:23</span>
                    </div>
                    <p class="text-white leading-normal">Discord is awesome!</p>
                </div>
            </div>
            <!-- A message -->
            <!-- A message -->
            <div class="border-b border-gray-600 py-3 flex items-start mb-4 text-sm">
                <img src="https://cdn.discordapp.com/embed/avatars/0.png" class="cursor-pointer w-10 h-10 rounded-3xl mr-3">
                <div class="flex-1 overflow-hidden">
                    <div>
                        <span class="font-bold text-red-300 cursor-pointer hover:underline">User</span>
                        <span class="font-bold text-gray-400 text-xs">10:30</span>
                    </div>
                    <p class="text-white leading-normal">Discord is awesome!</p>
                </div>
            </div>
            <!-- A message -->
            <!-- A message -->
            <div class="border-b border-gray-600 py-3 flex items-start mb-4 text-sm">
                <img src="https://cdn.discordapp.com/embed/avatars/1.png" class="cursor-pointer w-10 h-10 rounded-3xl mr-3">
                <div class="flex-1 overflow-hidden">
                    <div>
                        <span class="font-bold text-red-300 cursor-pointer hover:underline">User</span>
                        <span class="font-bold text-gray-400 text-xs">10:50</span>
                    </div>
                    <p class="text-white leading-normal">Discord is awesome!</p>
                </div>
            </div>
            <!-- A message -->
            <!-- A message -->
            <div class="border-b border-gray-600 py-3 flex items-start mb-4 text-sm">
                <img src="https://cdn.discordapp.com/embed/avatars/2.png" class="cursor-pointer w-10 h-10 rounded-3xl mr-3">
                <div class="flex-1 overflow-hidden">
                    <div>
                        <span class="font-bold text-red-300 cursor-pointer hover:underline">User</span>
                        <span class="font-bold text-gray-400 text-xs">11:30</span>
                    </div>
                    <p class="text-white leading-normal">Discord is awesome!</p>
                </div>
            </div>
            <!-- A message -->
            <!-- A message -->
            <div class="border-b border-gray-600 py-3 flex items-start mb-4 text-sm">
                <img src="https://cdn.discordapp.com/embed/avatars/3.png" class="cursor-pointer w-10 h-10 rounded-3xl mr-3">
                <div class="flex-1 overflow-hidden">
                    <div>
                        <span class="font-bold text-red-300 cursor-pointer hover:underline">User</span>
                        <span class="font-bold text-gray-400 text-xs">11:37</span>
                    </div>
                    <p class="text-white leading-normal">Discord is awesome!</p>
                </div>
            </div>
            <!-- A message -->

            <!-- A message -->
            <div class="border-b border-gray-600 py-3 flex items-start mb-4 text-sm">
                <img src="https://cdn.discordapp.com/embed/avatars/2.png" class="cursor-pointer w-10 h-10 rounded-3xl mr-3">
                <div class="flex-1 overflow-hidden">
                    <div>
                        <span class="font-bold text-red-300 cursor-pointer hover:underline">User</span>
                        <span class="font-bold text-gray-400 text-xs">11:55</span>
                    </div>
                    <p class="text-white leading-normal">Discord is awesome!</p>
                </div>
            </div>
            <!-- A message -->
            <!-- A message -->
            <div class="border-b border-gray-600 py-3 flex items-start mb-4 text-sm">
                <img src="https://cdn.discordapp.com/embed/avatars/3.png" class="cursor-pointer w-10 h-10 rounded-3xl mr-3">
                <div class="flex-1 overflow-hidden">
                    <div>
                        <span class="font-bold text-red-300 cursor-pointer hover:underline">User</span>
                        <span class="font-bold text-gray-400 text-xs">11:59</span>
                    </div>
                    <p class="text-white leading-normal">Discord is awesome!</p>
                </div>
            </div>
            <!-- A message -->
            <!-- A message -->
            <div class="border-b border-gray-600 py-3 flex items-start mb-4 text-sm">
                <img src="https://cdn.discordapp.com/embed/avatars/4.png" class="cursor-pointer w-10 h-10 rounded-3xl mr-3">
                <div class="flex-1 overflow-hidden">
                    <div>
                        <span class="font-bold text-red-300 cursor-pointer hover:underline">User</span>
                        <span class="font-bold text-gray-400 text-xs">12:00</span>
                    </div>
                    <p class="text-white leading-normal">Discord is awesome!</p>
                </div>
            </div>
            <!-- A message -->
        </div>
        <div class="pb-6 px-4 flex-none">
            <div class="flex rounded-lg overflow-hidden">
										<span class="text-3xl text-grey border-r-4 border-gray-600 bg-gray-600 p-2">
                    <svg class="h-6 w-6 block bg-gray-500 hover:bg-gray-400 cursor-pointer rounded-xl" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M16 10c0 .553-.048 1-.601 1H11v4.399c0 .552-.447.601-1 .601-.553 0-1-.049-1-.601V11H4.601C4.049 11 4 10.553 4 10c0-.553.049-1 .601-1H9V4.601C9 4.048 9.447 4 10 4c.553 0 1 .048 1 .601V9h4.399c.553 0 .601.447.601 1z" fill="#FFFFFF"/></svg>
                  </span>
                <input type="text" class="w-full px-4 bg-gray-600" placeholder="Message #general" />
            </div>
        </div>
    </div>
</div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<!-- multi select js -->
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>

<script>
    const toggleBtn = document.getElementById('toggle');
    const crudModel = document.getElementById('crud-modal');
    const x = document.getElementById('x');

    function show() {
        crudModel.classList.remove('hidden');
    }
    function hide() {
        crudModel.classList.add('hidden');
    }

    toggleBtn.addEventListener('click', show);
    x.addEventListener('click', hide);
</script>
<script>

    new MultiSelectTag('creator', {
        rounded: true, // default true
        shadow: true, // default false
        placeholder: 'Search', // default Search...
        tagColor: {
            textColor: '#327b2c',
            borderColor: '#92e681',
            bgColor: '#eaffe6',
        },
        onChange: function(values) {
            tags = values;
        }
    }) // id

    document.querySelectorAll('.room-image').forEach((room) => {
        const roomPopup = room.querySelector('.room-popup');

        if (roomPopup) {
            room.addEventListener('mouseenter', () => {
                roomPopup.classList.remove('hidden');
            });

            room.addEventListener('mouseleave', () => {
                roomPopup.classList.add('hidden');
            });
        }
    });
</script>
</html>