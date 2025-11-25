<?php
$questions = [
    "What is the capital of France?",
    "Which language is primarily used for server-side web development and shares its name with a popular scripting language?",
    "How many continents are there on Earth?",
    "Which HTTP status code means 'Not Found'?",
    "What does SQL stand for?",
    "Which planet is known as the Red Planet?",
    "What is the chemical symbol for water?",
    "Who wrote 'Romeo and Juliet'?",
    "Which gas do plants absorb from the atmosphere during photosynthesis?",
    "What is 9 x 7?"
];
//5 answers per question
$answers = [
    ["Paris","London","Berlin","Rome","Madrid"],
    ["Python","JavaScript","PHP","Ruby","C#"],
    ["5","6","7","8","9"],
    ["200","301","302","400","404"],
    ["Simple Query Language","Structured Question Language","Structured Query Language","Sequential Query Language","Standard Query Language"],
    ["Mercury","Venus","Earth","Mars","Jupiter"],
    ["O","H2","H2O","CO2","OH"],
    ["Charles Dickens","William Shakespeare","Mark Twain","Jane Austen","Leo Tolstoy"],
    ["Oxygen","Nitrogen","Carbon Dioxide","Hydrogen","Methane"],
    ["54","56","63","72","81"]
];
//index of $answers (0-based)
$correct_answers = [
    0,
    2,
    2,
    4,
    2,
    3,
    2,
    1,
    2,
    2,
];
?>