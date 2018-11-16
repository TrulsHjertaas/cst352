            
            
            // var username= $("#user").val();
            
            var randomNumber = Math.floor(Math.random()* 99) +1;
           //var guesses = document.querySelector("#guesses");
            var guesses = $("#guesses");
            var lastResult = document.querySelector("#lastResult");
            //var lowOrHi = document.querySelector("#lowOrHi");
            var lowOrHi = $("#lowOrHi");
            var wonOrLoss = document.querySelector("#wonOrLoss");
        
            var guessSubmit = document.querySelector(".guessSubmit");
            var guessField = document.querySelector(".guessField");
            
            var won = 0;
            var loss = 0;
            
            var guessCount = 1;
            var resetButton = document.querySelector('#reset');
            resetButton.style.display = 'none';
            
            function checkGuess() {
                
                var userGuess = Number(guessField.value);
                if(guessCount === 1) {
                    //guesses.innerHTML = "Previous guesses: ";
                    guesses.html("Previous guesses: ");
                }
                //guesses.innerHTML += userGuess + ' ';
                guesses.append(userGuess + ' ');
                
                    if(userGuess === randomNumber) {
                        lastResult.innerHTML = 'Congratulation! You got it right!';
                        lastResult.style.backgroundColor = 'green';
                        //lowOrHi.innerHTML = '';
                        lowOrHi.html('');
                        setGameOver();
                        won++;
                    }
                    
                    else if(userGuess < 1 || userGuess > 99 || isNaN(userGuess) ) {
                        alert("Number must be between 1 and 99, try again");
                        guessCount--;
                    }
                    
                    else if(guessCount === 7) {
                        lastResult.innerHTML = 'Sorry, you lost!';
                        loss++;
                        setGameOver();
                    }
                    else {
                        lastResult.innerHTML = 'Wrong!';
                        lastResult.style.backgroundColor = 'red';
                        if(userGuess < randomNumber) {
                            //lowOrHi.innerHTML = 'Last guess was too low!';
                            lowOrHi.html('Last guess was too low!');
                        }
                        else if(userGuess > randomNumber) {
                            //lowOrHi.innerHTML = 'Last guess was too high!';
                            lowOrHi.html('Last guess was too high!');
                        }
                    }
                    
                    guessCount++;
                    guessField.value = '';
                    guessField.focus();
                
            }
            
            wonOrLoss.innerHTML += 'Won: ' + won + ' and loss: ' + loss;
            
            guessSubmit.addEventListener('click', checkGuess);
            
            function setGameOver() {
                guessField.disabled = true;
                guessSubmit.disabled = true;
                resetButton.style.display = 'inline';
                resetButton.addEventListener('click', resetGame);
            }
            
            function resetGame() {
                
                guessCount = 1;
                
                var resetParas = document.querySelectorAll('.resultParas p');
                for(var i = 0; i < resetParas.length; i++) {
                    resetParas[i].textContent = '';
                }
                
                resetButton.style.display = 'none';
                
                guessField.disabled = false;
                guessSubmit.disabled = false;
                guessField.value = '';
                guessField.focus();
                
                lastResult.style.backgroundColor = 'white';
                
                randomNumber = Math.floor(Math.random() * 99) + 1;
                
                wonOrLoss.innerHTML += 'Won: ' + won + ' and loss: ' + loss;
                
            }