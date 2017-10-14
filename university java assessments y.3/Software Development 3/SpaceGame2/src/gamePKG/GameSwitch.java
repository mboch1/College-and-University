package gamePKG;

public class GameSwitch 
{
	private Command GameOverCommand;
	
	public GameSwitch (Command gameOver)
	{
		//concrete command registers itself with the invoker
		GameOverCommand = gameOver;
	}
	
	// invoker calls back concrete Command, which executes the Command on the receiver
	public void turnGameOverOn() 
	{
		GameOverCommand.execute();
	}
}
