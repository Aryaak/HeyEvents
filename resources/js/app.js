require('./bootstrap');

var Turbolinks = require("turbolinks")
Turbolinks.start()

const eventEl = document.getElementById('event');
const userEl = document.getElementById('user');
const authEl = document.getElementById('auth');
const messageEl = document.getElementById('message');
const formEl = document.getElementById('form');
const messageBoxEl = document.getElementById('messages_box');

formEl.addEventListener('submit', function (e) {
    e.preventDefault();

    let errors = false;
    if (!messageEl.value) {
    }
    if (messageEl.value) {
        const options = {
            method: 'POST',
            url: 'store',
            data: {
                event_id: eventEl.value,
                user_id: userEl.value,
                message: messageEl.value
            }
        }
        messageEl.value = '';
        axios(options);
    }
})

window.Echo.channel('discussion')
    .listen('.discussion', function (e) {
        console.log(e)
        if (e.user_id == authEl.value) {
            messageBoxEl.innerHTML += ` 
        <div class="mt-10 md:px-8 px-4">
        
        <div class="bg-prime mt-5 p-3 w-max ml-auto">
        <p class="text-white">${e.message}</p>
    </div>
    </div>`
        } else {
            messageBoxEl.innerHTML += ` 
        <div class="mt-10 md:px-8 px-4">
        
        <div class="flex items-start  mb-8 justify-self-start">
        <img src="http://127.0.0.1:8000/storage/${e.photo}" width="53" height="53">
        <div class="ml-5">
            <div class="flex items-center gap-x-2">
                <p class="text-prime font-bold">${e.name}</p>
                    ${e.status_id == 1 ? '<img src="http://127.0.0.1:8000/img/ic_check.svg">' : ''}
            </div>
            <div class="bg-smoke mt-5 p-3 w-max">
                <p class="text-prime">${e.message}</p>
            </div>
        </div>
    </div>   
    </div>`
        }

    })

