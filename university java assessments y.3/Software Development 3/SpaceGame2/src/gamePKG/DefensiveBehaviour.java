package gamePKG;

import java.util.ArrayList;

public class DefensiveBehaviour implements ShipBattleBehaviour {

	@Override
	public void resolveBattle(ArrayList<Ships> shipsList, GameRunner game) 
	{
		//create game over control command:
		GameOverCommand gameOver = new GameOverCommand(game);
		GameSwitch sw = new GameSwitch(gameOver);
		
		int x, y, x1, y1;
		//create an array of potentially destroyed ships:
		ArrayList<Ships> enemies = new ArrayList<>();
		
		if(shipsList.get(0).type().equalsIgnoreCase("player"))
		{
			x = shipsList.get(0).getX();
			y = shipsList.get(0).getY();
		}
		else
		{
			System.out.println("CRITICAL ERROR");
			return;
		}
		
		//search through the remaining ship list:
		for(int i = 1; i<shipsList.size(); i++)
		{
			x1 = shipsList.get(i).getX();
			y1 = shipsList.get(i).getY();
			//if the ships is at the same coordinates as player ship do:
			if(x1==x && y1==y)
			{
				//build up the list of enemies to fight with:
				enemies.add(shipsList.remove(i));
				System.out.println("Alien craft at ["+x1+","+y1+"] engaging...");
			}
			
		}

		//if there are any listed enemies:
		if(enemies.size()>0)
		{
			//check for number of enemies and resolve battle:
			if(enemies.size()==1)
			{
				System.out.println("There was a fight! We destroyed this many aliens: "+enemies.size());
			}
			else
			{
				sw.turnGameOverOn();	
			}	
		}	
		


	}

}
