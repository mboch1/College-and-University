package gamePKG;

public class GameOverCommand implements Command 
{
	 private GameRunner gameController;
	 
	 
     public GameOverCommand (GameRunner game) 
     {
             gameController  =  game;
     }
     
     public void execute() 
     {
             gameController.gameOver();
     }
}
