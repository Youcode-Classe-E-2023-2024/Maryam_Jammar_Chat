const messageBtn = document.getElementById("message-btn");
const message = document.getElementById("message-input");
const roomId = document.getElementById("room-id").value;
const messageSection = document.getElementById("messageSection");

messageBtn.addEventListener("click", (event) => {
    event.preventDefault();
    writeChat(message.value);
    message.value = "";
    getMessage();

})

function writeChat(msg) {
    $.ajax({
      type: "POST",
      url: "index.php?page=chat",
      data: {message: msg},
      success: (data) => {
          console.log(data)
      }
    })
}


function getMessage() {
    messageSection.innerHTML = ``;
    $.ajax({
        type: "POST",
        url: "index.php?page=chat",
        data: {
            getMessage: true,
            room_id: roomId
        },
        success: function (maryam) {
            let messages = JSON.parse(maryam);


            messages.forEach((message) => {
                messageSection.innerHTML += `<div class="border-b border-gray-600 py-3 flex items-start mb-4 text-sm">
                    <img src="https://cdn.discordapp.com/embed/avatars/3.png" class="cursor-pointer w-10 h-10 rounded-3xl mr-3">
                    <div class="flex-1 overflow-hidden">
                        <div>
                            <span class="font-bold text-red-300 cursor-pointer hover:underline">${message.username}</span>
                            <span class="font-bold text-gray-400 text-xs">${message.date}</span>
                        </div>
                        <p class="text-white leading-normal">${message.message}</p>
                    </div>
                </div>`;
            })
        }
    })
}

getMessage();
