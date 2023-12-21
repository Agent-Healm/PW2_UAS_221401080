let button_pressed = "";
let number = 0;
let game_window = document.querySelector('.game');
let diff_window = document.querySelector('.container_avoid');
let reset_button = document.querySelector('.reset');
let input_window = document.querySelector('.input');
let sandbox_window = document.querySelector('.sandbox');
const user_input = document.getElementById('guess');
const check_button = document.getElementById('check_button');
var attempts_var = 0;
let attempts = 0;
const inputted = [];

game_window.style.display = 'none';
reset_button.style.display = 'none';
input_window.style.display = 'none';

function reset()
{
    button_pressed = "";
    diff_window.style.display = 'block';
    game_window.style.display = 'none';
    reset_button.style.display = 'none';
    document.getElementById('difficulty').innerHTML = "";
    attempts = 0;
    temp_var = 0;
    user_input.value = '';
    document.getElementById('attempts').textContent = '';
    document.getElementById('message').textContent = '';
    inputted.length = 0;
    console.log('reset');
}

function button_press(difficulty) 
{
    console.log("pressed");
    diff_window.style.display = 'none';
    game_window.style.display = 'block';
    input_window.style.display = 'block';
    diff(difficulty);
    check_guess();
    console.log(difficulty);
}

function diff(button_pressed)
{
    console.log('func diff');
    if (button_pressed == 'beginner')
    {
        console.log("begin ner");
        attempts_var = 999;
        document.getElementById('difficulty').innerHTML = "You have chosen " + button_pressed.bold() + " difficulty";
        rand_generator();
    }
    else if (button_pressed == 'easy')
    {
        console.log("begin easy");
        attempts_var = 5;
        document.getElementById('difficulty').innerHTML = "You have chosen " + button_pressed.bold() + " difficulty";
        rand_generator();
    }
    
    else if (button_pressed == 'medium')
    {
        console.log("begin medium");
        attempts_var = 10;
        document.getElementById('difficulty').innerHTML = "You have chosen " + button_pressed.bold() + " difficulty";
        rand_generator();
    }

    else if (button_pressed == 'hard')
    {
        console.log("begin hard");
        attempts_var = 12;
        document.getElementById('difficulty').innerHTML = "You have chosen " + button_pressed.bold() + " difficulty";
        rand_generator();
    }

    else if (button_pressed == 'extreme')
    {
        console.log("begin emtreme");
        attempts_var = 15;
        document.getElementById('difficulty').innerHTML = "You have chosen " + button_pressed.bold() + " difficulty";
        rand_generator();
    }

    else if (button_pressed == 'impossible')
    {
        console.log("begin impossible");
        attempts_var = 19;
        document.getElementById('difficulty').innerHTML = "You have chosen " + button_pressed.bold() + " difficulty";
        rand_generator();
    }
}

function rand_generator()
{
    random_number = Math.floor(Math.random() * 20) + 1;
    reset_button.style.display = 'block';
    console.log(random_number);
}

check_button.addEventListener('click', check_guess);
user_input.addEventListener('keypress', function (k)
{
    if (k.key === 'Enter')
    {
        check_guess();
    }    
});

function check_guess()
{
    const player_guess = parseInt(user_input.value);
    console.log('check guess');
    document.getElementById('attempts').textContent = "Attempt(s) left to win: " + (attempts_var - attempts);

    if ((isNaN(player_guess)) || player_guess < 1 || player_guess > 20)
    {
        document.getElementById('message').textContent = 'Please input a number between 1 and 20';
    }

    else
    {
        if (player_guess === random_number)
        {
            document.getElementById('message').textContent = 'You lost. You have chosen the wrong number. The number was: ' + random_number;
            input_window.style.display = 'none';
            attempts_counter();
        }

        else
        {
            if (inputted.includes(player_guess) == false)
            {
                document.getElementById('message').textContent = 'You have avoided the wrong number.';
                inputted.push(player_guess);
                attempts_counter();
            }

            else
            {
                document.getElementById('message').textContent = 'You have entered this number. Please input another number.'
            }
        }
    }

    user_input.value = '';

    if (attempts > 0)
    {
        document.getElementById('attempts').textContent = "Attempt(s) left to do: " + (attempts_var - attempts);
    }
}

function attempts_counter()
{
    attempts++;
    console.log('attempts count');

    if (attempts === attempts_var)
    {
        document.getElementById('message').textContent = 'Congratulations! You won. The number was: ' + random_number;
        input_window.style.display = 'none';
    }
}

const searchParams = new URLSearchParams(window.location.search);
let dif = searchParams.get('dif');
let dif_valid = false;
switch (dif) {
    case 'beginner' :
    case 'easy' :
    case 'medium' :
    case 'hard' :
    case 'extreme' :
    case 'impossible' :
    dif_valid = true;
}
if (dif_valid)button_press(dif);