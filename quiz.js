const questions = [
    {
        question: "What is the full name of BVRIT?",
        choices: ["BV Raju Institute of Technology", "BV Reddy Institute of Technology", "BV Raju Institute of Engineering", "BV Raju University"],
        answer: 0
    },
    {
        question: "In which year was BVRIT established?",
        choices: ["1997", "1999", "2001", "2003"],
        answer: 1
    },
    {
        question: "Who is the founder of BVRIT?",
        choices: ["Dr. BV Raju", "Dr. PV Raju", "Dr. KV Raju", "Dr. NV Raju"],
        answer: 0
    },
    {
        question: "What is the motto of BVRIT?",
        choices: ["Excellence in Education", "Learn and Serve", "Knowledge is Power", "Education for All"],
        answer: 1
    },
    {
        question: "Where is BVRIT located?",
        choices: ["Hyderabad", "Vishakhapatnam", "Narsapur", "Both 1&3"],
        answer: 2
    },
    {
        question: "Which department is known for its robotics research in BVRIT?",
        choices: ["Mechanical Engineering", "Electrical Engineering", "Computer Science Engineering", "Electronics and Communication Engineering"],
        answer: 3
    },
    {
        question: "What is the annual tech fest of BVRIT called?",
        choices: ["Techno Fest", "Innovate", "Technotsav", "BVRIT Fest"],
        answer: 2
    },
    {
        question: "Which body accredits BVRIT?",
        choices: ["NBA", "AICTE", "UGC", "NAAC"],
        answer: 1
    },
    {
        question: "What is the name of the BVRIT library?",
        choices: ["Knowledge Hub", "Learning Resource Center", "Digital Library", "Central Library"],
        answer: 3
    },
    {
        question: "Which program is NOT offered by BVRIT?",
        choices: ["B.Tech", "M.Tech", "MBA", "MBBS"],
        answer: 3
    }
];

let currentQuestion = 0;
let score = 0;

function loadQuestion() {
    const question = questions[currentQuestion];
    document.getElementById("question").textContent = question.question;
    for (let i = 0; i < question.choices.length; i++) {
        const choiceLabel = document.getElementById(`choice${i}-label`);
        choiceLabel.textContent = question.choices[i];
        
        // Reset radio button selection
        const choiceInput = document.getElementById(`choice${i}`);
        choiceInput.checked = false;
    }
}

function submitAnswer() {
    const selectedChoice = document.querySelector('input[name="choice"]:checked');
    if (!selectedChoice) {
        alert("Please select an answer.");
        return;
    }

    const selectedIndex = parseInt(selectedChoice.id.slice(-1));
    const question = questions[currentQuestion];

    if (selectedIndex === question.answer) {
        score++;
    }

    currentQuestion++;

    if (currentQuestion < questions.length) {
        loadQuestion();
    } else {
        showScore();
    }
}

function showScore() {
    const scoreContainer = document.getElementById("score-container");
    const quizContent = document.querySelector(".quiz-content");

    quizContent.style.display = "none";
    scoreContainer.style.display = "block";

    const scoreElement = document.getElementById("score");
    const resultElement = document.getElementById("result");

    scoreElement.textContent = `${score} out of ${questions.length}`;

    if (score >= 9) {
        resultElement.textContent = "Excellent! You know your college very well.";
    } else if (score >= 6) {
        resultElement.textContent = "Great job! You have a decent knowledge about your college.";
    } else if (score >= 3) {
        resultElement.textContent = "Not bad! But you need to learn more about your college.";
    } else {
        resultElement.textContent = "You need to learn more about your college. Keep exploring!";
    }
}

document.getElementById("submit-btn").addEventListener("click", submitAnswer);

loadQuestion();
