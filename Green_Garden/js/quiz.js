/**Initialiser le score à zéro
Initialiser un tableau avec toutes les questions et les réponses correctes

Pour chaque question dans le tableau
    Afficher la question en bas de la page
    Attendre que l'utilisateur réponde à la question
    Comparer la réponse de l'utilisateur avec la réponse correcte
    Si la réponse est correcte
        Ajouter un au score
        Afficher un message de succès
    Sinon
        Afficher un message d'échec

Après que l'utilisateur a répondu à toutes les questions
    Afficher le score total de l'utilisateur
 */

// Initialiser le score à zéro

// Initialiser un tableau avec toutes les questions et les réponses correctes
const quiz = [
  {
    question: "Quel est votre niveau de connaissance en jardinage ?",
    answers: ["Débutant", "Intermédiaire", "Expert"],
    correctAnswer: "Débutant"
  },
  {
    question: "Combien de temps pouvez-vous consacrer au jardinage chaque semaine ?",
    answers: ["Moins d'une heure", "Entre 1 et 3 heures", "Plus de 3 heures"],
    correctAnswer: "Entre 1 et 3 heures"
  },
  {
    question: "Quel est votre type de plante préféré ?",
    answers: ["Les plantes d'intérieur", "Les plantes d'extérieur", "Les plantes comestibles"],
    correctAnswer: "Les plantes d'intérieur"
  },
  {
    question: "Quelle est votre principale motivation pour le jardinage ?", answers: ["Décorer mon intérieur", "Manger mes propres légumes", "Me détendre"],
    correctAnswer: "Me détendre"
  },
  {
    question: "Quelle est votre plus grande difficulté en jardinage ?", answers: ["Je n'ai pas la main verte", "Je n'ai pas assez de temps", "Je n'ai pas assez d'espace", "Difficultés à choisir les bonnes plantes"],
    correctAnswer: "Je n'ai pas assez d'espace"
  },
];
//Initialiser du quiz et du score
let score = 0;
let CurrentQuestionIndex = 0;

//Selectionner les éléments HTML
const questionElement = document.getElementById("question");
const answersContainer = document.getElementById("answers");
const submitButton = document.getElementById("submit");

function loadQuestion(questionIndex) {
  //Obtenir la question actuelle
  const currentQuestion = quiz[questionIndex];

  //Effacer les réponses précédentes
  answersContainer.innerHTML = "";

  //Afficher la question et les reponses
  questionElement.textContent = question.question;
  for (let i = 0; i < question.answers.lenth; i++) {
    answersContainer.textContent = question.answers[i];
    answer.value = i
    answersContainer.appendChild(answer);
  }
}
function checkAnswer(answerIndex) {
  // Vérifier si la réponse est correcte
  if (answerIndex === quiz[currentQuestionIndex].correctAnswer) {
    score++;
    alert('Correct!');
  } else {
    alert('Désolé, ce n\' est pas la bonne réponse.');
  }
}

// Charger la première question
loadQuestion(currentQuestionIndex);

// Ajouter un écouteur d'événements au bouton de soumission
submitButton.addEventListener('click', () => {
  const selectedAnswer = document.querySelector('input[type=radio]:checked');
  if (!selectedAnswer) {
    alert('Veuillez sélectionner une réponse.');
    return;
  }

  checkAnswer(Number(selectedAnswer.value));

  // Passer à la question suivante ou terminer le quiz
  currentQuestionIndex++;
  if (currentQuestionIndex < quiz.length) {
    loadQuestion(currentQuestionIndex);
  } else {
    alert(`Le quiz est terminé ! Votre score est de ${score}/${quiz.length}.`);
  }
});


