// Initialize variables
let mode = 'easy'; // Mode permainan awal adalah 'easy'
let maxAttempts; // Variabel untuk menyimpan jumlah maksimum percobaan
let randomNumber; // Variabel untuk menyimpan angka acak yang harus ditebak

const guessInput = document.getElementById('guess'); // Memilih elemen input untuk menebak angka
const checkButton = document.getElementById('checkButton'); // Memilih tombol "Cek"
const resetButton = document.getElementById('resetButton'); // Memilih tombol "Ulangi Permainan"

const message = document.getElementById('message'); // Memilih elemen untuk pesan hasil permainan
const modeButtons = document.querySelectorAll('.mode-button'); // Memilih semua tombol mode

// Event listener untuk tombol mode
for (const button of modeButtons) {
    button.addEventListener('click', function() {
        mode = button.id; // Mengganti mode permainan sesuai tombol yang ditekan
        updateModeButtons(); // Memperbarui tampilan tombol mode yang aktif
        maxAttempts = getMaxAttempts(); // Memperbarui batasan jumlah percobaan sesuai mode
        resetGame(); // Mengatur ulang permainan ketika mode diubah
    });
}

// Event listener untuk tombol "Cek"
checkButton.addEventListener('click', checkGuess);

// Event listener untuk input menggunakan tombol "Enter"
guessInput.addEventListener('keypress', function (e) {
    if (e.key === 'Enter') {
        checkGuess();
    }
});

// Event listener untuk tombol "Ulangi Permainan"
resetButton.addEventListener('click', resetGame);

// Fungsi untuk menghasilkan angka acak antara 1 dan 100
function generateRandomNumber() {
    return Math.floor(Math.random() * 100) + 1;
}

// Fungsi untuk mendapatkan jumlah maksimum percobaan sesuai mode
function getMaxAttempts() {
    switch (mode) {
        case 'beginner':
            return 100;
        case 'easy':
            return 60;
        case 'medium':
            return 36;
        case 'hard':
            return 22;
        case 'extreme':
            return 15;
        case 'impossible':
            return 7;
    }
}

// Fungsi untuk memperbarui tampilan tombol mode yang aktif
function updateModeButtons() {
    for (const button of modeButtons) {
        button.classList.remove('active');
    }
    document.getElementById(mode).classList.add('active');
}

// Fungsi untuk mengatur ulang permainan
function resetGame() {
    randomNumber = generateRandomNumber(); // Menghasilkan angka acak baru
    attempts = 0; // Mengatur ulang jumlah percobaan
    guessInput.value = ''; // Mengosongkan input
    message.textContent = ''; // Mengosongkan pesan hasil permainan
    checkButton.disabled = false; // Mengaktifkan tombol "Cek"
    guessInput.disabled = false; // Mengaktifkan input
    updateModeButtons(); // Memperbarui tampilan tombol mode yang aktif
    maxAttempts = getMaxAttempts(); // Memperbarui batasan jumlah percobaan
}

// Fungsi untuk memeriksa tebakan
function checkGuess() {
    const userGuess = parseInt(guessInput.value);

    if (isNaN(userGuess) || userGuess < 1 || userGuess > 100) {
        message.textContent = 'Masukkan angka antara 1 dan 100!';
        return;
    }

    attempts++;

    if (userGuess === randomNumber) {
        message.textContent = `Selamat! Anda menebak angka ${randomNumber} dengan ${attempts} percobaan!`;
        disableInputAndButton(); // Menonaktifkan input dan tombol "Cek"
    } else if (userGuess < randomNumber) {
        message.textContent = 'Angka terlalu rendah, coba lagi.';
    } else {
        message.textContent = 'Angka terlalu tinggi, coba lagi.';
    }

    guessInput.value = '';

    if (attempts >= maxAttempts) {
        message.textContent = `Anda sudah mencapai batas maksimum percobaan (${maxAttempts}). 
        Game Over! Angka yang benar adalah ${randomNumber}.`;
        disableInputAndButton(); // Menonaktifkan input dan tombol "Cek"
    }
}

// Fungsi untuk menonaktifkan input dan tombol "Cek"
function disableInputAndButton() {
    guessInput.disabled = true;
    checkButton.disabled = true;
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
if (dif_valid) mode = dif;

updateModeButtons();
maxAttempts = getMaxAttempts();
resetGame();