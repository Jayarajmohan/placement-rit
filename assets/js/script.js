const questions = [
    {
        question: "What is 2 + 2?",
        options: ["3", "4", "5", "6"],
        answer: "4"
    },
    {
        question: "What is the capital of France?",
        options: ["London", "Madrid", "Berlin", "Paris"],
        answer: "Paris"
    },
    // Add more questions here
];

let currentQuestion = 0;
let correctAnswers = 0;
let incorrectAnswers = 0;

function displayQuestion() {
    const question = questions[currentQuestion];
    if (question) {
        document.getElementById("question").textContent = question.question;
        for (let i = 0; i < 4; i++) {
            document.getElementById(`label${i + 1}`).textContent = question.options[i];
        }
    } else {
        endTest();
    }
}

function nextQuestion() {
    const selectedAnswer = document.querySelector('input[name="answer"]:checked');
    if (selectedAnswer) {
        const question = questions[currentQuestion];
        if (question.answer === selectedAnswer.value) {
            correctAnswers++;
        } else {
            incorrectAnswers++;
        }
        currentQuestion++;
        selectedAnswer.checked = false;
        displayQuestion();
    }
}

function endTest() {
    document.getElementById("question-container").style.display = "none";
    document.getElementById("result-container").style.display = "block";
    document.getElementById("correct-answers").textContent = correctAnswers;
    document.getElementById("incorrect-answers").textContent = incorrectAnswers;
}

displayQuestion();
