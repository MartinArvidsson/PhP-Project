# PhP-Project
My PhP Project repository.
#####Live: http://martin-viktor-arvidsson.se/FinalProject/Project/Index.php
#Vision

My initial thoughts is to create a web based version of Tic-Tac-Toe(Luffarshack),I have yet to decide if i want it to be playable over the internet(share a URL beween 2 persons and they share the same game session)

Or if i just want to host it online and you will play it locally(Take turns playing 1,2,1,2,1,2....)

I plan on being done with the gamelogic at the end of this week(42), this leaves me with around one week to figure out if i want to play it over internet. 
The biggest problem with this is that i have more or less no idea of how to play it over internet with a shared URL.
This will therefore be work in progress that i will look at when all other things work.

#Use cases
##Mandatory
1. Navigate to page
2. Able to start a new game of tic-tac-toe
3. Able to play the version of tic-tac-toe locally between two players.
4. Able to win a series
5. Score is visible on startpage.

##Optional
if i have the time
1. Able to play a version of the game over internet / Shared URL.
2. 

#Testcases

| Testfall      |Krav    | Mål   |Testmetod   | Status |
| ------------- |:------:| -----:| ----------:| ------:|
| Sökfunktion   | Man ska kunna söka efter videos | Kunna söka videos | Få samma videos som resultat som att söka på webbsidan| Klar |

| Sökfunktion   | Man ska kunna söka efter videos med ä ö å | Kunna söka videos | Få samma videos som resultat som att söka på webbsidan| Klar |

| Klicka tumnaglar | Klicka bild -> tas till video| Man ska kunna trycka och få videon uppspelad | Tryck på bilden -> spela videon| Klart |

| Spela musikvideo | Klicka bild -> tas till video| Man ska kunna trycka och få videon uppspelad | Tryck på bilden -> spela videon| Klart |

| Spela "vanlig" video | Klicka bild -> tas till video| Man ska kunna trycka och få videon uppspelad | Tryck på bilden -> spela videon| Klart |

| Videospelare  | Videon ska spelas upp och kontrollrarna ska fungera utan problem|Alla funktioner i videospelaren ska fungera| Testa spela video och alla funktionerna ska fungera| Alla relevanta kontrollrar fungerar, fullskärm disablat |


#How it ended up / Reflection:

The entire application took a lot longer to write than what i had anticipated and accounted for, writing the game and following the MVC structure took a lot more thinking and deciding on how i would write it.

When i got up and running and started programming i realised that i needed a lot of sessions since more or less everything i do caused variables to reset.. I realise in hindsight that i could have structured how i would handle the data a lot better now that i look back.

My schedule wasn't really matching with reality, i planned on working with gamelogic one week and making the game work online the second week. In reality i sat with the gamelogic for 10 days, i did not have time to peform online games as i had wanted , nor did i had any time to implement AI instead. So instead i made only two gamemodes, First to 3 and First to 5 wins.


I also felt that my usecases weren't really where i wanted to have them in quality and quantity, so in hindsight i added a few more.


Other than that i feel like i somewhat made what i had planned, it's a tic-tac-toe game and you can play it locally.


